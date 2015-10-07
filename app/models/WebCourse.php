<?php
class WebCourse extends Eloquent {

	protected $table = 'web_course';
	protected $guarded = array('creator_id', 'cate_id', 'subject');
	
	protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
