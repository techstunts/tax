<?php

namespace App\Http\Middleware;

use App\Post;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class ConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::singleton('menu_items', function(){
            $items = Post::where('post_status','publish')
                ->where('post_type','page')
                ->orderBy('post_parent')
                ->orderBy('menu_order')
                ->get();
            $menu_items = array();

            foreach($items as $item){
                if($item->post_parent == 0){
                    $menu_items[$item->ID] = $item->toArray();
                }
                else{
                    if(isset($menu_items[$item->post_parent])){
                        $menu_items[$item->post_parent]['sub_menu'][] = $item->toArray();
                    }
                }
            }
            return $menu_items;
        });

        View::share('menu_items', app('menu_items'));

        return $next($request);
    }
}
