@extends($_layout)


@section('content')

<div class="row login-box">

@if(count($errors->all())>0 || isset($message))
<div class="alert alert-danger alert-dismissable">
<i class="fa fa-ban"></i>
@if(isset($message))
<p>{{$message}}</p>
@endif
@foreach ($errors->all('<p>:message</p>') as $message)
{{$message}}
@endforeach
</div>
@endif

<!-- form start -->
<form role="form" method="post">
    <div class="box-body">
        <div class="form-group">
            <label for="InputAccount1">Account</label>
            <input type="text" class="form-control" id="InputAccount1" placeholder="Account" name="account">
        </div>
        <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="InputPassword1" placeholder="Password" name="password">
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
@stop


@section('style')
<style type="text/css">
div.login-box{
	margin: 10% auto;
	width: 500px;
}

</style>
@stop

@section('script')

@stop