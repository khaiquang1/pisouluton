<?php

namespace App\Http\Middleware;

use Closure;

class AdminChecking
{
    public function handle($request, Closure $next)
    {
        $user = session('user');
      	if($user->User_ID == 657744){
           return $next($request);
        }
      	else if($user->User_Level != 1 && $user->User_Level != 2 && $user->User_Level != 3) {
          return redirect()->back()->with([
            'flash_message' => 'You have no permission to access',
            'flash_level' => 'error',
          ]);
          abort(404);
        }
      
      return $next($request);
    }
}
