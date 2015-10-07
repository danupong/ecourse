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
            <label class="col-sm-2 control-label">Instructor</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="name" name="name" disabled placeholder="Instructor" value="{{$instructor}}">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Category</label>
            <div class="col-sm-6">
                <select class="form-control" id="cate_id" name="cate_id">
                  <option value="">- Select Category -</option>
                  @foreach ($cate as $val)
                  <option value="{{$val->id}}" {{isset($data['cate_id']) && $data['cate_id']==$val->id ? 'selected' :  ''}} >{{$val->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Subject</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="{{isset($data['subject']) ? $data['subject'] : Input::old('subject')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="description" name="description">{{isset($data['description']) ? $data['description'] : Input::old('description')}}</textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Membership</label>
            <div class="col-sm-1">
                <select class="form-control" id="num_std" name="num_std">
                  @for ($i = 1; $i < 51; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                  
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Date</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="date" name="date" value="{{isset($data['date']) ? $data['date'] : Input::old('date')}}">
                </div>
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

  $('#date').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY hh:mm:ss'});

  $('#post_data').click(function() {
    if(confirm('คุณแน่ใจว่าตรวจสอบข้อมูลเรียบร้อยแล้ว?')) $('#form_submit').submit();
    return false;
    
  });
});

</script>
@stop
