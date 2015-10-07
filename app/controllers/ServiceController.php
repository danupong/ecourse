<?php

class ServiceController extends WebController {

	private $userType = false;

	public function __construct(){
		parent::__construct();
		$this->block();

		$user = Session::get('ss_account_info');
		$this->userType = $user['type'];
	}

	public function courselist()
	{
		$output = array('status'=>false);
		if (Request::ajax()) {
			$data = false;

			switch ($this->userType) {
				case 'student':

						$start_time = date('Y-m-d H:i:s');
						if(Input::has('search_date') && !empty(Input::get('search_date'))){
							$start_time = date('Y-m-d H:i:s', strtotime(Input::get('search_date')));
						}

						$data = WebCourse::where('start_time','<=',$start_time)->where('end_time','>=',date('Y-m-d H:i:s'));
						if(Input::has('instructor') && !empty(Input::get('instructor'))){
							$data = $data->where('name','like','%'.Input::get('instructor').'%');
						}

						if(Input::has('subject') && !empty(Input::get('subject'))){
							$data = $data->where('subject','like','%'.Input::get('subject').'%');
						}
						$data = $data->orderBy('end_time', 'desc')->paginate(50);
					break;

				case 'instructor':
						$data = WebCourse::where('id', '>', 0);
						if(Input::has('search_date') && !empty(Input::get('search_date'))){
							$date_time = date('Y-m-d H:i:s', strtotime(Input::get('search_date')));
							$data = $data->where('start_time','<=',$date_time)->where('end_time','>=',$date_time);
						}

						if(Input::has('instructor') && !empty(Input::get('instructor'))){
							$data = $data->where('name','like','%'.Input::get('instructor').'%');
						}

						if(Input::has('subject') && !empty(Input::get('subject'))){
							$data = $data->where('subject','like','%'.Input::get('subject').'%');
						}

						$data = $data->orderBy('end_time', 'desc')->paginate(50);
					break;
				
			}

			if($data){

				if (count($data)){ 
				    foreach ($data as $key => $value){
						$cate = WebCategory::select('name')->remember(10)->find($value->cate_id);
						if($cate){
							$data[$key]->cate_name = $cate->name;
						}

						$data[$key]->date = date('d M Y H:i:s', strtotime($value->start_time)).' - '.date('d M Y H:i:s', strtotime($value->end_time));

						$html = '';
			        	$user = Session::get('ss_account_info');
			        	if($value->creator_id == Session::get('ss_account_id') && $this->userType=='instructor'){
			        		$html = '<a class="btn btn-warning btn-sm get_info" href="/course/edit/'.$value->id.'"><i class="fa fa-edit"></i> Edit</a>';
			        	}
			        	$data[$key]->etc = $html;
				    }
				}

				$output = array('status'=>'ok', 'data'=>$data->toArray());
			}
		}

		return Response::json($output);
	}
}
