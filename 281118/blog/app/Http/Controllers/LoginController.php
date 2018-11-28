<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
  
	public function getLogin(){
		return view('login');
	}
	public function postLogin(Request $request){
		$rules = [
			'email' => 'required|email',
			'password'=> 'required|min:8'
		];
		$messages = [
			'email.required'=> 'Email bắt buộc',
			'email.email'=> 'Sai định dạng ',
			'password.required'=> 'Nhập pass',
			'password.min'=> 'Độ dài mật khẩu'
		];
		$validator = Validator::make($request->all(), $rules, $messages);
		if ($validator -> fails()){
			return redirect() -> back() -> withErrors($validator) -> withInput();
		}else{
			$email = $request -> input('email');
			$password = $request -> input('password');
			if( Auth::attempt(['email' => $email, 'password' =>$password])) {
    			return redirect()->intended('/');
    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
		}
	}
  }
