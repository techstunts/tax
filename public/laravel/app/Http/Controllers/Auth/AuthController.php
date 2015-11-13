<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserOuthProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\AbstractUser;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\SocialiteServiceProvider;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/efiling/individual/personal';
    protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Calls AuthenticatesAndRegistersUsers methods like getLogin, postLogin, getRegister, postRegister
     *
     */
    public function index(Request $request, $action)
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']) . strtoupper(substr($action,0,1)) . substr($action,1);
        return $this->$method($_SERVER['REQUEST_METHOD'] == 'POST' ? $request : null);
    }

    /**

     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     *
     *
     */
    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();

        if($social_user->getId())
        {
            $provider_info = \App\UserOuthProvider::where('provider', $provider)
                ->where('provider_user_id', $social_user->getId())
                ->first();
            if(!$provider_info)
            {
                $user = $this->addNewOauthUser($social_user, $provider);
            }
            else{
                $user = \App\User::find($provider_info->user_id);
            }
            Auth::login($user);
            return redirect('/');
        }
        //var_dump($user);
    }

    public function addNewOauthUser(AbstractUser $social_user, $provider)
    {
        $oauth_email = ($social_user->getEmail() == null || $social_user->getEmail()=='')
            ? 'unavailable' . '_' . $social_user->getId()
            : $social_user->getEmail();

        $user = User::create([
            'name' => $social_user->getName(),
            'email' => $oauth_email,
            'password' => rand(10000000,10000000000),
        ]);

        $user_oauth_provider = UserOuthProvider::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_user_id' => $social_user->getId(),
            'username' => $social_user->getNickname(),
            'name' => $social_user->getName(),
            'email' => $oauth_email,
            'avatar' => $social_user->getAvatar(),
            'provider_response_json' => json_encode($social_user)
        ]);

        return $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new auth instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
