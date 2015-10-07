 <!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8"/>
<title>{{$_head_title}}</title>
<meta name="title" content="{{$_head_title}}">
<meta name="description" content="{{$_head_desc}}">
<meta name="keywords" content="{{$_head_keywords}}"/>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"/>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

@if (isset($_css) && count($_css)>0) @foreach ($_css as $key=>$value)
<link href="/asset/css/{{$value}}.css?t={{$_time}}" rel="stylesheet" type="text/css" />
@endforeach @endif
@if (isset($_js) && count($_js)>0) @foreach ($_js as $key=>$value)
<script src="/asset/js/{{$value}}.js?t={{$_time}}" type="text/javascript"></script>
@endforeach @endif

@yield('style')
@yield('script')
</head>
<body class="skin-blue">
	@yield('body')
</body>
</html>