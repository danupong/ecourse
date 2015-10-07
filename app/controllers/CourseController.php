<?php

class CourseController extends WebController {

	public function __construct(){
		parent::__construct();
		$this->block();

		$this->setLayout('layout.01');

		$this->_assign['_layout_title'] = 'Course';
		$this->_assign['_layout_desc'] = 'หลักสูตร';
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/course/';
	}

	public function index()
	{

		$this->_assign['_js'][] = 'plugins/datetimepicker/moment-with-locales.min';
		$this->_assign['_js'][] = 'plugins/datetimepicker/bootstrap-datetimepicker';
		$this->_assign['_css'][] = 'datetimepicker/bootstrap-datetimepicker.min';

		$this->_assign['_head_title'] = 'Course List : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/course/index';
		return View::make('course.index', $this->_assign);
	}

	public function add()
	{
		$user = Session::get('ss_account_info');
		if($user['type']!='instructor') return Redirect::to('/course');

		if(Request::method()=='POST'){
    		$validator = Validator::make(Input::all(), array(
    				'cate_id'=>	'required',
					'subject'=> 'required|min:3',
				));
    		if ($validator->fails())
		    {
		        return Redirect::back()->withInput()->withErrors($validator);
		    }

		    $model = new WebCourse;
		    $model->creator_id = Session::get('ss_account_id');
		    $model->cate_id = Input::get('cate_id');
		    $model->name = $user['firstname'].' '.$user['lastname'];
		    $model->subject = Input::get('subject');
		    $model->description = Input::get('description');
		    $model->num_std = Input::get('num_std');

		    list($start_date, $end_date) = explode(' - ', Input::get('date'));
		    if($start_date && $end_date){
		    	$model->start_time = $this->dateFormat($start_date);
		    	$model->end_time = $this->dateFormat($end_date);
		    }

		    $model->save();

		    return Redirect::back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
		}

		
		$this->_assign['data'] = WebMember::find(Session::get('ss_account_id'))->toArray();
		$this->_assign['instructor'] = $user['firstname'].' '.$user['lastname'];
		$this->_assign['cate'] = WebCategory::orderBy('name', 'asc')->get();

		$this->_assign['_js'][] = 'plugins/daterangepicker/daterangepicker';
		$this->_assign['_css'][] = 'daterangepicker/daterangepicker-bs3';
		$this->_assign['_layout_desc'] = 'เพิ่มข้อมูลหลักสูตร';
		$this->_assign['_head_title'] = 'Course Add : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/course/index';
		return View::make('course.add', $this->_assign);
	}

	private function dateFormat($date){
		list($day, $hh) = explode(' ', $date);
		list($dd, $mm, $yy) = explode('/', $day);
		return $yy.'-'.$mm.'-'.$dd.' '.$hh;
	}


	public function edit($id)
	{
		$user = Session::get('ss_account_info');
		if($user['type']!='instructor') return Redirect::to('/course');
		if(Request::method()=='POST'){
    		$validator = Validator::make(Input::all(), array(
    				'id'=> 'required',
    				'cate_id'=>	'required',
			        'subject'=> 'required|min:3',
				));
    		if ($validator->fails())
		    {
		        return Redirect::back()->withInput()->withErrors($validator);
		    }

		    $mem = WebMember::find(Session::get('ss_account_id'));

		    if(!empty(Input::get('pass'))){
		    	$mem->pass = md5(Input::get('pass'));
		    }
			
			$model = WebCourse::find(Input::get('id'));
			if(!$model) return Redirect::back()->with('message', 'ไม่พบข้อมูลที่แก้ไข');

		    $model->creator_id = Session::get('ss_account_id');
		    $model->cate_id = Input::get('cate_id');
		    $model->name = $user['firstname'].' '.$user['lastname'];
		    $model->subject = Input::get('subject');
		    $model->description = Input::get('description');
		    $model->num_std = Input::get('num_std');

		    list($start_date, $end_date) = explode(' - ', Input::get('date'));
		    if($start_date && $end_date){
		    	$model->start_time = $this->dateFormat($start_date);
		    	$model->end_time = $this->dateFormat($end_date);
		    }

		    $model->save();
		    return Redirect::back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
		}

		$data = WebCourse::find($id);
		if(!$data || $data->creator_id!=Session::get('ss_account_id')) return Redirect::to('/course');
		$data = $data->toArray();
		$data['date'] = date('d/m/Y H:i:s', strtotime($data['start_time'])).' - '.date('d/m/Y H:i:s', strtotime($data['end_time']));

		$this->_assign['instructor'] = $user['firstname'].' '.$user['lastname'];
		$this->_assign['cate'] = WebCategory::orderBy('name', 'asc')->get();

		$this->_assign['data'] = $data;
		
		$this->_assign['_js'][] = 'plugins/daterangepicker/daterangepicker';
		$this->_assign['_css'][] = 'daterangepicker/daterangepicker-bs3';
		$this->_assign['_layout_desc'] = 'แก้ไขข้อมูลหลักสูตร';
		$this->_assign['_head_title'] = 'Course Edit : '.$this->_assign['_head_title'];
		$this->_assign['_breadcrumb'][$this->_assign['_layout_title']] = '/course/index';
		return View::make('course.add', $this->_assign);
	}

}
