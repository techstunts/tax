<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EFile;

class EFilingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    private $efiling_groups = [];
    private $groups_template = [];
    private $steps = [];
    private $steps_ordered = [];
    private $current_step;
    private $next_step;
    private $previous_step;


    public function __construct()
    {

        $this->efiling_groups["personal"]["name"] = array("display_name" => "Full name", "type" => "string", "order" => 1, "size" => array("min" => 5, "max" => 50));
        $this->efiling_groups["personal"]["pan"] = array("display_name" => "PAN card", "type" => "string", "order" => 2, "size" => array("min" => 10, "max" => 10));
        $this->efiling_groups["personal"]["dob"] = array("display_name" => "Date of birth (dd/mm/yyyy)", "type" => "date", "order" => 3);
        $this->efiling_groups["personal"]["address"] = array("display_name" => "Permanent Address", "type" => "string", "order" => 4, "size" => array("min" => 5, "max" => 50));

        $this->efiling_groups["employer"]["salary"] = array("display_name" => "Income from salary", "type" => "float", "order" => 1, "size" => array("min" => 5, "max" => 10));
        $this->efiling_groups["employer"]["tan"] = array("display_name" => "TAN no. of employer", "type" => "string", "order" => 2, "size" => array("min" => 10, "max" => 10));
        $this->efiling_groups["employer"]["tds"] = array("display_name" => "Tax deducted at source", "type" => "float", "order" => 3, "size" => array("min" => 0, "max" => 10));
        $this->efiling_groups["employer"]["address"] = array("display_name" => "Address of employer", "type" => "string", "order" => 4, "size" => array("min" => 5, "max" => 50));

        $this->efiling_groups["property"]["rent"] = array("display_name" => "Income from rent", "type" => "float", "order" => 1, "size" => array("min" => 5, "max" => 10));
        $this->efiling_groups["property"]["sale"] = array("display_name" => "Income from sale of property", "type" => "float", "order" => 1, "size" => array("min" => 5, "max" => 10));

        $this->efiling_groups["capitalgains"]["sharesale"] = array("display_name" => "Income from sale of shares", "type" => "float", "order" => 1, "size" => array("min" => 5, "max" => 10));
        $this->efiling_groups["capitalgains"]["bondsale"] = array("display_name" => "Income from sale of bonds", "type" => "float", "order" => 1, "size" => array("min" => 5, "max" => 10));

        $this->efiling_groups["bankaccount"]["accountnumber"] = array("display_name" => "Bank account no.", "type" => "int", "order" => 1, "size" => array("min" => 10, "max" => 20));
        $this->efiling_groups["bankaccount"]["ifsccode"] = array("display_name" => "IFSC Code", "type" => "string", "order" => 2, "size" => array("min" => 10, "max" => 10));


        $this->groups_template = $this->array_keys_recursive($this->efiling_groups,1);

        $this->steps['individual']['personal'] = ['name' => 'Personal details', 'groups' => array("personal", "employer"), 'order' => 1];
        $this->steps['individual']['income'] = ['name' => 'Income sources', 'groups' => array("property", "capitalgains"), 'order' => 2];
        $this->steps['individual']['bank'] = ['name' => 'Bank account', 'groups' => array("bankaccount"), 'order' => 3];
        $this->steps['individual']['other'] = ['name' => 'Other details', 'groups' => array("bankaccount"), 'order' => 4];

    }
    
    public function index()
    {
        //
    }

    function array_keys_recursive($myArray, $depth = 0, $arrayKeys = array()){
        $MAXDEPTH = 3;
        if($depth < $MAXDEPTH){
            $depth++;
            $keys = array_keys($myArray);
            foreach($keys as $key){
                if(is_array($myArray[$key])){
                    $arrayKeys[$key] = $this->array_keys_recursive($myArray[$key], $depth);
                }
            }
        }

        return $arrayKeys;
    }

    public function init_steps($tax_payer_type, $step){
        $current_step_order = -1;
        foreach($this->steps[$tax_payer_type] as $step_key => $step_details){
            $this->steps_ordered[$step_details['order']] = $step_key;
            if($step_key == $step){
                $current_step_order = $step_details['order'];
            }
        }

        $this->previous_step = isset($this->steps_ordered[$current_step_order - 1]) ? $this->steps_ordered[$current_step_order - 1] : "";
        $this->next_step = isset($this->steps_ordered[$current_step_order + 1]) ? $this->steps_ordered[$current_step_order + 1] : "";
    }

    public function update(Request $request, $tax_payer_type, $step){

        if($request->user() == null){
            return redirect('auth/login');
        }

        $this->init_steps($tax_payer_type, $step);

        $groups_template = $this->groups_template;

        $efile = EFile::where('user_id',$request->user()->id)->first();
        if(!$efile){
            $efile = new EFile();
            $efile->created_at = time();
        }
        else{
            $groups_template = json_decode($efile->data_json, true);
        }

        $efile_values = array_replace_recursive($groups_template, $request->request->all());

        $efile->user_id = $request->user()->id;
        $efile->data_json = json_encode($efile_values);
        $efile->tax_payer_type = 1;
        $efile->last_step = 1;;

        $efile->save();

        $redirect_to = $request->input('submit') == 'Next' ? $this->next_step :
            ($request->input('submit') == 'Back' ? $this->previous_step : $step);

        return redirect("efiling/$tax_payer_type/$redirect_to");
    }

    /**
     * Steps to efile the return.
     *
     * @return IlluminateHttpResponse
     */
    public function step(Request $request, $tax_payer_type, $step)
    {
        if($request->user() == null){
            return redirect('auth/login');
        }

        $this->init_steps($tax_payer_type, $step);

        $efile_details = EFile::where('user_id',$request->user()->id)->first();
        $efile_data = [];
        if($efile_details){
            $efile_data = json_decode($efile_details->data_json, true);
        }

        if(!isset($efile_data['personal']['name']) || strlen(trim($efile_data['personal']['name'])) == 0){
            $efile_data['personal']['name'] = $request->user()->name;
        }

        $groups = [];

        if(isset($this->steps[$tax_payer_type][$step])) {
            foreach ($this->steps[$tax_payer_type][$step]['groups'] as $v) {
                if(isset($this->efiling_groups[$v])){
                    $groups[$v] = $this->efiling_groups[$v];
                }
            }
            return view('efiling.edit', [
                'step' => $step,
                'step_name' => $this->steps[$tax_payer_type][$step]['name'],
                'tax_payer_type' => $tax_payer_type,
                'groups' => $groups,
                'steps' => $this->steps[$tax_payer_type],
                'steps_ordered' => $this->steps_ordered,
                'previous_step' => $this->previous_step,
                'next_step' => $this->next_step,
                'efile_data' => $efile_data
            ]);
        }
    }

}
