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
            <label class="col-sm-2 control-label">หมวดหมู่</label>
            <div class="col-sm-10">
                 <select name="cate_id" class="form-control">
                 @if(isset($cate)) @foreach($cate as $key=>$value)
                 <option value="{{$value['id']}}" @if( isset($data['cate_id']) && $value['id']==$data['cate_id']) selected="selected" @endif>{{$value['topic']}}</option>
                 @endforeach @endif
                </select> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="topic" name="topic" placeholder="Title" value="{{isset($data['topic']) ? $data['topic'] : Input::old('topic')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content_desc" name="content_desc" placeholder="Description" value="{{ isset($data['content_desc']) ? $data['content_desc'] : Input::old('content_desc')}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">วันที่แสดง</label>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="show_date" class="form-control pull-right datepicker" id="show_date" value="{{isset($data['show_date']) ? $data['show_date'] : Input::old('show_date')}}" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Icon {{$_icon_w}}px * {{$_icon_h}}px</label>
            <div class="col-sm-7">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: {{$_icon_w}}px; height: {{$_icon_h}}px;">
                    <img src="{{isset($data['icon']) ? $data['icon'] : $_icon_img}}" style="width: {{$_icon_w}}px; height: {{$_icon_h}}px;" />
                  </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="width: {{$_icon_w}}px; height: {{$_icon_h}}px;"> </div>
                <div>
                    <span class="btn btn-primary btn-file btn-sm" style="height: 30px;"><span class="fileupload-new"><i class="glyphicon glyphicon-search"></i> Select image</span><span class="fileupload-exists"><i class="glyphicon glyphicon-refresh"></i> Change</span><input type="file" name="icon" id="icon" style="top: 0;"/></span>
                    <a href="#" class="btn btn-danger fileupload-exists btn-sm" data-dismiss="fileupload"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                </div>
              </div>
            </div>
          </div>
    <br clear="all">

          <div class="form-group">
            <label class="col-sm-2 control-label">ซ่อน</label>
            <div class="col-sm-10">
              <label>
                <input type="checkbox" name="status" class="flat-red" value="ClOSED" @if(Input::old('status')=='ClOSED' || (isset($data['status']) && $data['status']=='ClOSED')) checked="checked" @endif />
                <!-- checked -->
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
              <a href="#pic_list" role="button" id="open_filelist" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-search"></i> List รูปภาพ</a>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <textarea id="detail" name="detail" class="edit content" rows="20" cols="80" style="width: 100%">
                  {{isset($data['detail']) ? $data['detail'] : Input::old('detail')}}
                </textarea>
            </div>
          </div>
        <!-- Upload File-->
          <div class="form-group">
            <label class="col-sm-2 control-label">อัพโหลดภาพ</label>
            <div class="col-sm-10">
              <input id="file_upload" name="file_upload" type="file" multiple="true" >
              <div id="queue"></div>                    
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



<!-- Modal -->
<div class="modal fade" id="pic_list" tabindex="-1" role="dialog" aria-labelledby="pic_listLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">List image</h4>
      </div>
      <div class="modal-body" style="padding-bottom: 0px;">
        <div id="form_file_upload_list"></div>
      </div>
      <div class="modal-footer" style="margin-top: 0px;">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-refresh"></i> ยกเลิก</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop


@section('script')
<script type="text/javascript">


function InsertImg(value) {
  var editor = CKEDITOR.instances.detail;
  if ( editor.mode == 'wysiwyg' )
  {
    editor.insertHtml('<br /><img class="user_up_img" src="'+value+'"/>');
  }else{
    console.log('Error');
  }
}

$(document).ready(function(){
  $('#file_upload').uploadifive({
        'auto'         : true,
        'multi'        : true,
        'fileSizeLimit' : '2048',
        'queueID'      : 'queue',
        'queueSizeLimit' : 10,
        'dnd' : true,
        'uploadScript' : '/sysAttachment/ajaxuploadimg',
        'onUploadComplete' : function(file, data) {
          var obj = jQuery.parseJSON( data );
          InsertImg(obj['path']);
          $( ".uploadifive-queue-item" ).fadeOut(2500);
        }
      });
  CKEDITOR.replace('detail', {
                    height: '350px',
    });

  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_flat-red'
  });

  $('.datepicker').datepicker({language:'th', format: 'yyyy-mm-dd',autoclose: true,});

  $('#post_data').click(function() {
    var topic = $('#topic').val();
    var desc  = $('#content_desc').val();
    if(topic == ''){alert('โปรดระบุหัวเรื่อง ด้วย ค่ะ');}
    else if(desc == ''){alert('โปรดระบุคำอธิบายย่อ ด้วย ค่ะ');}
    else{
      if(confirm('คุณแน่ใจว่าตรวจสอบข้อมูลเรียบร้อยแล้ว?'))
        $('#form_submit').submit();
    }
    return false;
    
  });

  $('#open_filelist').click(function(){
    $.post('/sysAttachment/ajaxgetimg', function(d) {
      $('#form_file_upload_list').html(d);
    }, 'json');
  });

  $(document).on("click","ul.pagination a:not(.active)", function(){
    $.post($(this).attr('href'), function(d) {
      $('#form_file_upload_list').html(d);
    }, 'json');
    return false;
  });

  $(document).on("click","ul.attachment_img_list img", function(){
    InsertImg($(this).data('path'));
    return false;
  });

  

});

</script>
@stop
