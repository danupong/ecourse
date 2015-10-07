<?php

class ProfileController extends WebController {

	public function __construct(){
		parent::__construct();
		$this->block();

		$this->setLayout('layout.01');

		$this->_assign['_layout_title'] = 'Profile';
		$this->_assign['_layout_desc'] = 'สมาชิก';
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/profile/';
	}

	public function index()
	{
		$this->_assign['_head_title'] = 'Profile List : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/profile/index';
		return View::make('profile.index', $this->_assign);
	}

	public function ajaxindexlist()
	{

		if (Request::ajax()) {
			$col = array('id', 'user','firstname', 'lastname', 'nickname', 'type');
			
			return Datatable::collection(WebMember::select($col)->orderBy('id', 'desc')->get())
				->showColumns($col)
		        ->searchColumns('user','firstname', 'lastname', 'nickname')
				->orderColumns($col)->make();

		}

	}

	public function add()
	{

		if(Request::method()=='POST'){
    		$validator = Validator::make(Input::all(), array(
					'user'=> 'required|between:6,16|alpha_num|regex:/(^[A-Za-z0-9 ]+$)+/|unique:web_member,user',
			        'pass' => 'required|between:6,16|alpha_num|regex:/(^[A-Za-z0-9 ]+$)+/',
			        'cpass' => 'required|between:6,16|same:pass',
				));
    		if ($validator->fails())
		    {
		        return Redirect::back()->withInput()->withErrors($validator);
		    }
		    $user = Session::get('ss_account_info');
		    $mem = new WebMember;
			$mem->user = Input::get('user');
			$mem->pass = md5(Input::get('pass'));
			$mem->firstname = Input::get('firstname');
			$mem->lastname = Input::get('lastname');
			$mem->nickname = Input::get('nickname');
			$mem->type = $user['type'];
			$mem->save();

		    return Redirect::back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
		}

		$this->_assign['_layout_desc'] = 'เพิ่มข้อมูลสมาชิก';
		$this->_assign['_head_title'] = 'Profile Add : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/profile/index';
		return View::make('profile.add', $this->_assign);
	}


	public function edit()
	{

		if(Request::method()=='POST'){
    		$validator = Validator::make(Input::all(), array(
			        'pass' => 'between:6,16|alpha_num|regex:/(^[A-Za-z0-9 ]+$)+/',
			        'cpass' => 'between:6,16|same:pass',
				));
    		if ($validator->fails())
		    {
		        return Redirect::back()->withInput()->withErrors($validator);
		    }

		    $mem = WebMember::find(Session::get('ss_account_id'));

		    if(!empty(Input::get('pass'))){
		    	$mem->pass = md5(Input::get('pass'));
		    }
			
			$mem->firstname = Input::get('firstname');
			$mem->lastname = Input::get('lastname');
			$mem->nickname = Input::get('nickname');
			$mem->save();

		    return Redirect::back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
		}

		$this->_assign['data'] = WebMember::find(Session::get('ss_account_id'))->toArray();

		$this->_assign['_layout_desc'] = 'แก้ไขข้อมูลสมาชิก';
		$this->_assign['_head_title'] = 'Profile Edit : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/profile/index';
		return View::make('profile.edit', $this->_assign);
	}

}
