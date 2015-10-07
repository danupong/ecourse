@extends($_layout)


@section('content')

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{$top_regis}}
                </h3>
                <p>
                    สมัครไอดีใหม่วันนี้
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">
                ดูทั้งหมด <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    {{$top_online}}
                </h3>
                <p>
                    ออนไลน์สูงสุดวันนี้
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-line-chart"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    {{$sum_oneday}}
                </h3>
                <p>
                    ยอดบริจาควันนี้
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
            <a href="/payment/truemoney" class="small-box-footer">
                ดูทั้งหมด <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<div class="content">
    <div class="row">
        <!-- LINE CHART -->
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">CCU Online Chart</h3>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.row -->
</div>
@stop

@section('script')
<script language="JavaScript" type="text/javascript" charset="utf-8">
$(document).ready(function(){

    // LINE CHART
    var line = new Morris.Line({
        element: 'line-chart',
        resize: false,
        data: [
        <?php
        if (count($get_ccu)){ 
            foreach ($get_ccu as $key => $value){
                echo "{y: '".date('Y-m-d H:i',strtotime($value->record_time))."', item1: ".$value->auth_user."},";
            }
        }
        ?>
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Online'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
    });
});
</script>
@stop
