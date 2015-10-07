@extends($_layout)


@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">รายการ{{$_layout_desc}}</h3>
        <div class="pull-right box-tools">
            <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body table-responsive">
        @if(isset($success))
        <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i> <p>{{$success}}</p>
        </div>
        @endif
        <table id="content_list" class="table table-bordered table-striped">
            <thead>
                <th width="5%">id</th>
                <th width="10%">หมวดหมู่</th>
				<th>รายการ</th>
                <th width="10%">สถานะ</th>
				<th width="10%">โดย</th>
				<th width="20%">เมื่อ</th>
				<th width="6%"></th>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@stop


@section('script')
<script type="text/javascript">

$(document).ready(function(){
    $('#content_list').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "iDisplayLength": 25,
        "bRetrieve":true,
        "aaSorting": [[0,'desc']],
        "oLanguage": {
          "sProcessing": "<div style=\"text-align:center;\"><img src=\"/asset/images/ajax/loading-5.gif\" /></div>"
        },
        "sAjaxSource": "/{{$_module}}/ajaxlist"
    });

    $(document).on("click",".btn-remove", function(){
        var get_id = $(this).attr('rel');
        if(confirm('คุณแน่ใจที่จะลบหัวข้อข่าว')){
        $.post('/{{$_module}}/del', { 'id':get_id}, function(d) {
            if (d.status == 'ok') {
                $('#content_list').dataTable()._fnAjaxUpdate();
            }
        }, 'json');
        }
        return false;
    });
});



</script>
@stop
