<?php namespace  App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Auth;
use Request;
use Hash;
use Redirect;
use App\User;
class LoginController extends Controller{
    
	//下面是对用户进行验证
    public function loginAuth(){
    	$name = Request::input('username');
    	$password = Request::input('password');
        //下面是自己来名字的校验
        $user = User::where('username','=',$name)->get();
        if(count($user)==0){
            return Redirect::to('/login')->with('message', '用户名不存在！');
        }
        else{
            //现在验证密码是否正确
            $passCorrect = $user[0]->password;
            if($password==$passCorrect){
                return Redirect::to('/login_suc')->with('username',$user[0]->username);
            }
            else{
                return Redirect::to('/login')->with('message', '密码错误！');
            }

        }
    	
    }

}