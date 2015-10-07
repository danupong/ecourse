@extends($_layout)


@section('content')


<div class="box box-warning">
    <div class="box-header">
        <h3 class="box-title">{{$_layout_title}}</h3>
        <div class="pull-right box-tools">
            <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

        @if(isset($success))
        <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i> <p>{{$success}}</p>
        </div>
        @endif
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


        <form name="data" method="post" action=""  id="form_submit" enctype="multipart/form-data" class="form-horizontal">
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="user" name="user" placeholder="Username" value="{{isset($data['user']) ? $data['user'] : Input::old('user')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Fullname</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" value="{{isset($data['firstname']) ? $data['firstname'] : Input::old('firstname')}}">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" value="{{isset($data['lastname']) ? $data['lastname'] : Input::old('lastname')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nickname</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" value="{{isset($data['nickname']) ? $data['nickname'] : Input::old('nickname')}}">
            </div>
          </div>

         <br clear="all"/>
         <div style="text-align: right;" class="box-footer">
          @if(isset($data['id']) && $data['id']>0)
            <input type="hidden" name="id" id="id" value="{{$data['id']}}">
          @endif
            <button type="button" id="post_data" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> บันทึก</button> 
            <button type="reset" class="btn btn-danger" ><i class="glyphicon glyphicon-refresh"></i> ยกเลิก</button>
        </div>
        </form>
    <br clear="all">
</div>
</div>

@stop


@section('script')
<script type="text/javascript">

$(document).ready(function(){

  $('#post_data').click(function() {
    if(confirm('คุณแน่ใจว่าตรวจสอบข้อมูลเรียบร้อยแล้ว?')) $('#form_submit').submit();
    return false;
    
  });
});

</script>
@stop
