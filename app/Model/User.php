<?php

namespace App\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Model\Money;
use App\Model\BalanceMain;
use App\Model\UserLog;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    
    use HasApiTokens, Notifiable;
 
    protected $fillable = [
         'User_Email','User_Password',
    ];
  
    protected $hidden = [
        'User_Password',
    ];

    public $timestamps = false;
  	protected $table = 'users';
  
  	protected $primaryKey = 'User_ID';
  
  	public function getAuthPassword()
	{
		return $this->User_Password;
	}
  
  	public function candidate()
    {
        return $this->hasOne('App\Model\Candidate', 'candidate_user_id', 'User_ID')->where('candidate_status', '!=', -1);
    }
  
  	public function education()
    {
        return $this->hasMany('App\Model\CandidateEducation', 'education_user_id', 'User_ID')->where('education_status', '!=', -1)->orderByDesc('education_id');
    }
  
  	public function experience()
    {
        return $this->hasMany('App\Model\CandidateExper', 'experience_user_id', 'User_ID')->where('experience_status', '!=', -1)->orderByDesc('experience_id');
    }
  
  	public function skill()
    {
        return $this->hasMany('App\Model\CandidateSkill', 'skill_user_id', 'User_ID')->where('skill_status', '!=', -1)->orderByDesc('skill_id');
    }
  
  	public function avatar()
    {
        return $this->hasOne('App\Model\CandidateAvatar', 'avatar_user_id', 'User_ID')->where('avatar_status', '!=', -1);
    }
  
  	public function references()
    {
        return $this->hasMany('App\Model\CandidateReference', 'references_user_id', 'User_ID')->where('references_status', '!=', -1)->orderByDesc('references_id');
    }
  
  	public function desired()
    {
        return $this->hasOne('App\Model\CandidateDesired', 'desired_job_user_id', 'User_ID')->where('desired_job_status', '!=', -1);
    }
  
  	
  
  	public function employer()
    {
        return $this->hasOne('App\Model\Employer', 'employer_user_id', 'User_ID');
    }
    //get balance
    static function getBalanceUser($user, $currency = 1){
        $money = Money::where('Money_User', $user)->whereIn('Money_MoneyStatus', [0,1])->where('Money_Currency', $currency);
        $money = $money->selectRaw('COALESCE(SUM(`Money_USDT`+`Money_USDTFee`), 0) as total')->value('total');
        if($money < 0){
            User::where('User_ID', $user)->update(['User_Block'=>1]);
            UserLog::SetUserLog('Block Minus Main Balance', date('Y-m-d H:i:s'), $user, $request->ip(), $request->header('User-Agent'));
            $message = "<b> BLOCK USER MINUS MAIN BALANCE </b>\n"
                . "PROJECT: <b>EMATO</b>\n"
                . "User ID: <b>$user</b>\n"
                . "BALANCE: <b>$money</b>\n"
                . "<b>Submit Withdraw Time: </b>\n"
                . date('d-m-Y H:i:s',time());
            dispatch(new SendTelegramJobs($message, -398297366));
            return $money;
        }
        $MainBalance = BalanceMain::where(array('user_id' => $user, 'currency_id'=>$currency))->first();
        if(!$MainBalance){
            $MainBalance = new BalanceMain;
            $MainBalance->user_id = $user;
            $MainBalance->currency_id = $currency;
        }
        $MainBalance->balance = $money;
        $MainBalance->save();
        return $MainBalance->balance;
    }
  
}