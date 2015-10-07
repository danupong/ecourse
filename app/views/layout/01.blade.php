@extends('layout.inc.master')
@section('body')

@include('layout.inc.top')

<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="left-side sidebar-offcanvas">
        @include('layout.inc.left')
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
                <li><a href="{{$value}}">@if($key=='Login')<i class="fa fa-key"></i>@endif {{$key}}</a></li>
                @endforeach @endif
                <!--<li class="active">Dashboard</li>-->
            </ol>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </aside>

</div>
@stop

