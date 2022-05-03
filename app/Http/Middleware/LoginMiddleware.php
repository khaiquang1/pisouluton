<?php

namespace App\Http\Middleware;
use Session;
use Closure;

use App\Model\User;

use Illuminate\Support\Facades\URL;
use Redirect;


class LoginMiddleware
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
        if(Session::get('user')){
          //dd(Session::get('user')->User_ID);
          $user = User::find(Session::get('user')->User_ID);
          //dd($user,$user->User_Block,Session('userTemp'));
          	if($user->User_Block == 1 && !Session('userTemp')){
                return redirect()->route('admin.auth.logout');
            }
          	if(Session::getId() != $user->user_SessionID  && !Session('userTemp')){
                return redirect()->route('admin.auth.logout');
            }
            return $next($request);
        }
        return redirect()->route('admin.auth.login',['redirect'=>encrypt(\Request::fullUrl())])->with(['flash_level'=>'error', 'flash_message'=>'Please Login!']);
    }
}
