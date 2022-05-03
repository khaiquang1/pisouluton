<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Crypt;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\User;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
  public function login()
  {
    return view('admin.auth.login');
  }
  public function postLogin(Request $request){
    $request->validate([
      'user_email' => 'required|email|nullable',
      'user_password' => 'required|nullable',
    ],[
        'user_email.required' => 'Tên tài khoản không để trống!' ,
        'user_password.required' => 'Mật khẩu không để trống!' ,
    ]);
    $active_account = User::where('User_Email', $request->user_email)->first();
    if(!$active_account){
      return redirect()->back()->with('error', 'Tài khoản không tồn tại!');
    }
    if (!Hash::check($request->user_password, $active_account->User_Password)) {
      return redirect()->back()->with('error', 'Sai mật khẩu!');
    }
    Session::put('user',  $active_account);
    User::where('User_ID', $active_account->User_ID)->update(['user_SessionID'=>Session::getId()]);
    return redirect()->route('admin.account_user')->with('message', 'Đăng nhập thành công');
  }

  public function getActiveEmail(Request $request){
    $user = User::where('User_Token', $request->token)->first();
    if ($user) {
      if($user->User_Employer == 0){
        if ($user->User_Email_Active == 1) {
          return redirect()->to('https://picareers.net/login?e=Tài khoản của bạn đã được kích hoạt!');
        } else {
          $token = Crypt::decryptString($request->token);
          $data = explode(':', $token);
          $user->User_Email_Active = 1;
          $user->save();

          return redirect()->to('https://picareers.net/login?s=Tài khoản của bạn đã được kích hoạt!');
        }
        return redirect()->to('https://picareers.net/login?e=Tài khoản của bạn không tồn tại!');
      }
      else{
        if($user->User_Employer == 1){
          if ($user->User_Email_Active == 1) {
            return redirect()->to('https://recruitment.picareers.net/login?e=Tài khoản của bạn đã được kích hoạt!');
          } else {
            $token = Crypt::decryptString($request->token);
            $data = explode(':', $token);
            $user->User_Email_Active = 1;
            $user->save();

            return redirect()->to('https://recruitment.picareers.net/login?s=Tài khoản của bạn đã được kích hoạt!');
          }
        }
        return redirect()->to('https://recruitment.picareers.net/login?e=Tài khoản của bạn không tồn tại!');
      }
    }
  }

  public function activeForgotPassword(Request $request){
    $user = User::where('User_Token', $request->token)->first();
    if ($user) {
      if($user->User_Employer == 0){
        if ($user->User_Email_Active == 0) {
          $user->User_Email_Active = 1;
        }
        $user->User_Password = Hash::make($request->pass);

        $user->save();
        return redirect()->to('https://picareers.net/login?s=Mật khẩu đã được kích hoạt!');
      }
      if($user->User_Employer == 1){
        if ($user->User_Email_Active == 0) {
          $user->User_Email_Active = 1;
        }
        $user->User_Password = Hash::make($request->pass);

        $user->save();
        return redirect()->to('https://recruitment.picareers.net/login?s=Mật khẩu đã được kích hoạt!');
      }
    }
  }

  public function logout()
  {
    if(session('userTemp')){
      $sessionOld = session('userTemp');
      // bỏ session củ
      Session::forget('user');
      Session::forget('userTemp');

      // tạo session mới
      Session::put('user', $sessionOld);
      return redirect()->route('admin.dashboard')->with(['flash_level'=>'success', 'flash_message'=>'Logout Success']);
    }

    Session::forget('user');
    return redirect()->route('admin.auth.login');
  }
}