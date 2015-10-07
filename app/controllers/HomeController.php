<?php

class HomeController extends WebController {

	public function __construct(){
		parent::__construct();
		$this->setLayout('layout.full');
		$this->_assign['_css'][] = 'main';
	}

	public function index()
	{
		$this->forgetAccount();
		if(Request::method()=='POST' && Input::get('account')!=''){
    		$validator = Validator::make(Input::all(), array(
					'account'=> 'required|between:6,16|alpha_num|regex:/(^[A-Za-z0-9 ]+$)+/|exists:web_member,user',
			        'password' => 'required|between:6,16',
				));
    		if ($validator->fails())
		    {
		        return Redirect::back()->withInput()->withErrors($validator);
		    }

		    $member = WebMember::select('id','user', 'firstname', 'lastname', 'nickname', 'type')
			    ->where('user',Input::get('account'))
			    ->where('pass',md5(Input::get('password')))
			    ->first();
		    if(isset($member->id) && $member->id>0){
		    	Session::put('ss_account_id', $member->id);
		    	Session::put('ss_account_info', $member->toArray());
		    	return Redirect::to('/profile');
		    }

		    return Redirect::back()->with('message', 'รหัสผ่านไม่ถูกต้อง');
		}

		$this->_assign['_head_title'] = 'Login Page : '.$this->_assign['_head_title'];
		$this->setLayout('layout.full');
		return View::make('home.login', $this->_assign);
	}

	public function logout()
	{
		$this->forgetAccount();
		return Redirect::to('home');
	}

}
