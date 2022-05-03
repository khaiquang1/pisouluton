<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Excel;
use Illuminate\Http\Request;
use Hash;
use DB;
use Session;
use App\Model\Notifycation;

class NewsController extends Controller
{
  public function listNews(Request $req)
  {
    //dd(strtotime('2022-04-17 00:00:00'));
    // $level = array(1 => 'Admin', 0 => 'Member', 2 => 'Finance', 3 => 'Support', 4 => 'Customer', 5 => 'Bot');
    // $user = Session::get('user');
    // $getAccount = User::select('User_ID','User_Email','User_Password','User_Token','User_Block','User_Token_Expires',	'User_Level','user_SessionID','User_Created_At','User_Updated_At','User_Active');

    // if($req->UserID){
    //   $getAccount = $getAccount->where('User_ID', $req->UserID);
    // }
    // if($req->Email){
    //   $getAccount = $getAccount->where('User_Email', 'LIKE', '%'. $req->Email .'%');
    // }
    // if($req->datetime){
    //   $last_day = strtotime ('+1 day', strtotime($req->datetime));
    //   $getAccount = $getAccount->where('User_Created_At', '>=', $req->datetime)
    //     ->where('User_Created_At', '<', date('Y-m-d', $last_day));
    // }
    // $getAccount = $getAccount->orderByDesc('User_ID')->paginate(30);
    //return view('admin.news.ListNews', compact('user', 'getAccount'));
    return view('admin.news.ListNews');
  }
  public function showAddNews(Request $req)
  {
    
    return view('admin.news.AddNews');
  }
}