<?php

abstract class WebController extends Controller {

	protected $_assign = array();
	private $_setting = false;

	public function __construct(){
		$this->init();
		$this->setLayoutData();
	}

	private function init(){
		$this->_assign = array(
				'_head_title' => 'E-Course ระบบการเรียนการสอน',
				'_head_desc' => 'E-Course ระบบการเรียนการสอน',
				'_head_keywords' => 'E-Course ระบบการเรียนการสอน',
				'_head_url' => 'http://ecourse.test',
				'_time' => time(),
				'_js'=>array(
						'jquery.2.0.2.min',
						'bootstrap.min',
						'plugins/datatables/jquery.dataTables',
						'plugins/datatables/dataTables.bootstrap',
						'plugins/ckeditor/ckeditor',
						'plugins/input-mask/jquery.inputmask',
						'/AdminLTE/app'
					),
				'_css'=>array(
						'bootstrap.min',
						'font-awesome',
						'ionicons.min',
						'datatables/dataTables.bootstrap',
						'iCheck/all',
						'datepicker/datepicker3',
						'AdminLTE',
						'bof'
					),
				'_menu'=> array(
						array('fa-user', 'profile', 'Profile', '#', array(
								'รายชื่อสมาชิก' => '/profile',
								'แก้ไขข้อมูล' => '/profile/edit',
								'เพิ่มสมาชิก' => '/profile/add'
							)),
						array('fa-book', 'course' ,'Course', '#', array(
								'รายการหลักสูตร' => '/course'
							)),
						array('fa-sign-out', 'logout', 'Log Out', '/home/logout')
					),
				'_breadcrumb' => array(
						'Login' => '/home'
					),
				'_icon_img' => '/asset/images/no_image.gif',
				'_icon_w' => 200,
				'_icon_h' => 150
			);

		if(Session::get('message', false)){
			$this->_assign['message'] = Session::get('message');
		}

		if(Session::get('success', false)){
			$this->_assign['success'] = Session::get('success');
		}

	}

	protected function setLayout($layout){
		$this->_assign['_layout'] = $layout;
	}

	protected function setLayoutData(){
		global $_url;
		//Session::put('ss_account_info', array('user'=>'test', 'firstname'=>'xxx', 'lastname'=>'xxx', 'nickname'=>'xxx', 'type'=>'xxx'));
		if(Session::has('ss_account_info')){
			$this->_assign['_account_info'] = Session::get('ss_account_info');

			if($this->_assign['_account_info']['type']=='instructor'){
				$this->_assign['_menu'][1][4]['เพิ่มหลักสูตร'] = '/course/add';
			}
		}


		

		if (isset($this->_assign['_menu']) && $this->_assign['_menu']>0){ 
		    foreach ($this->_assign['_menu'] as $key => $value){
				if($value[1] == $_url['class']){
					$this->_assign['_menu'][$key]['active'] = true;
				}
		    }
		}
		 
	}

	protected function forgetAccount(){
		if(Session::has('ss_account_id')) Session::forget('ss_account_id');
		if(Session::has('ss_account_info')) Session::forget('ss_account_info');
	}

	protected function block(){
		if(!Session::has('ss_account_id')){
			header("Location: /home");
			die();
			
		}
	}

}
