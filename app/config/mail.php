<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "log"
	|
	*/
	/*
	'driver' => 'smtp',
	'host' => 'smtp.devrising.me',
	'port' => 25,
	'from' => array('address' => 'no-reply@l2memory.com', 'name' => 'L2Memory'),
	'encryption' => null,
	'username' => null,
	'password' => null,
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
	*/


	//gmail
	'driver' => 'smtp',
	'host' => 'smtp.gmail.com',
	'port' => 465,
	'from' => array('address' => 'no-reply@l2memory.com', 'name' => 'L2Memory'),
	'encryption' => 'ssl',
	'username' => 'noreply.l2memory@gmail.com',
	'password' => 'w,jvpkd0t[vd',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
);
