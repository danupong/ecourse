<?php
class WebMember extends Eloquent {

	protected $table = 'web_member';
	protected $guarded = array('user', 'pass');
	
	protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
