@extends($_subdomain.'.layout.inc.master')
@section('body')

@include($_subdomain.'.layout.inc.top')

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        @include($_subdomain.'.layout.inc.left')
    </aside>
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$_layout_title}}
                <small>{{$_layout_desc}}</small>
            </h1>
            <ol class="breadcrumb">
                @if($_breadcrumb) @foreach($_breadcrumb as $key=>$value)
                <li><a href="{{$value}}">@if($key=='Dashboard')<i class="fa fa-dashboard"></i>@endif {{$key}}</a></li>
                @endforeach @endif
                <!--<li class="active">Dashboard</li>-->
            </ol>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </aside>

</div>


<div id="bottom_online" style="display: inline;">
  <p></p>
</div>
<script language="JavaScript" type="text/javascript" charset="utf-8">
var set_Timeout;
function reload_online(){
    $.get('/SysGeneral/ajaxPlayerOnline', function(d) {
        if(d.auth_user!=''){
            $('#bottom_online > p').html('<span class="glyphicon glyphicon-refresh"></span> Online <font color="#ffcc00">'+d.auth_user+'</font>');
        }
        set_Timeout =  setTimeout(function() {       
            reload_online();
        }, 50000); 
    }, 'json');                 
}
$(document).ready(function(){
    reload_online();
});
</script>
@stop

