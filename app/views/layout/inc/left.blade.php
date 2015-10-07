<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/asset/images/frame_user.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{$_account_info['nickname']}} - {{$_account_info['type']}}</p>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        @if($_menu) @foreach($_menu as $mm)
        <li class="@if($mm[3]=='#') treeview @endif @if(isset($mm['active'])) active @endif">
            <a href="{{$mm[3]}}">
                <i class="fa {{$mm[0]}}"></i> <span>{{$mm[2]}}</span> @if(isset($mm[4]) && is_array($mm[4]))<i class="fa fa-angle-left pull-right"></i>  @endif
            </a>
            @if(isset($mm[4]) && is_array($mm[4]))
            <ul class="treeview-menu">
                @foreach($mm[4] as $name=>$link)
                <li><a href="{{$link}}"><i class="fa fa-angle-double-right"></i> {{$name}}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach @endif
    </ul>
</section>