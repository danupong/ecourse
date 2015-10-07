<?php
class WebCategory extends Eloquent {

	protected $table = 'web_category';
	protected $guarded = array('name');
	
	protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
