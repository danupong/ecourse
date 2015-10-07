## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

### วิธีการรันโปรแกรม

**ตัวอย่างการตั้งค่าบน apache บน Windows

เพิ่ม code ด้านล่างนี้ลงไปในไฟล์ C:\xampp\apache\conf\extra\httpd-vhosts.conf
```
<VirtualHost *:80>
    DocumentRoot C:\xampp\htdocs\ecourse\public
    ServerName ecourse.club
    ServerAlias *.ecourse.club
</VirtualHost>
```

ตรวจดูที่ไฟล์ C:\xampp\apache\conf\httpd.conf ว่ามีการเรียกใช้ conf/extra/httpd-vhosts.conf หรือไม่
```
# Virtual hosts
Include conf/extra/httpd-vhosts.conf
```

Restart Apache

เพิ่ม ( 127.0.0.1 ecourse.club ) ลงไปในไฟล์ C:\Windows\System32\drivers\etc\hosts

เปิดเว็บเบราเซอร์ ใส่โดเมน ecourse.club

**ตั้งค่า Database
Excute file \ecourse\ecourse.sql ลงฐานข้อมูล

ตั้งค่าไฟล์ Config \ecourse\app\config\database.php
```
'mysql' => array(
			'driver'    => 'mysql',
			'host'      => '127.0.0.1',
			'database'  => 'ecourse',
			'username'  => 'root',
			'password'  => '1234',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
```