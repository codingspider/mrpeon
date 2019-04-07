@extends('crudbooster::admin_template') 
@section('content')

<?php
use Carbon\Carbon;


$users['data'] = DB::table("request_forms")
                   ->select('id')
                   ->whereDate('created_at', '>', Carbon::now()->subDays(30))
                   ->get();

?>


@if( CRUDBooster::isSuperadmin()) 

<div class="container">
  <canvas id="myChart"></canvas>
</div>

@php
    $data = DB::table('request_forms')->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(receive_amount) as views'))
      ->groupBy('date')->get();
    

@endphp

<div id="myfirstchart" style="height: 250px;"></div>
<script>
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
          <?php foreach ($data as $value){
            echo "{year : '{$value->date}', value:{$value->views}},";
          }
          ?>
  ],
  xkey: 'year',
  ykeys: ['value'],
  labels: ['Amount']
});
</script>

@endif

<br><br>
  
@if( !CRUDBooster::isSuperadmin()) 

@php


$start = $_GET['start'];
$end = $_GET['end'];
 $id=CRUDBooster::myId();

$query=DB::table('request_forms')->where('merchant_id',$id);

if($_GET['start'] and $_GET['end']!=""){
  $query=$query->whereBetween('created_at',[$start,$end]);
}
$data=$query->get();
$tid=$data->count();
$t_amount=$data->sum('receive_amount');


@endphp
 



<div class="card text-white bg-primary text-center " style="width: 200px; padding:40px 40px ;  float:left">
    <div class="card-header " >{{$tid}}</div>
    <div class="card-body">
    <h5 class="card-title">
    </h5>
      <p class="card-text"></p>
    </div>
  </div>

  <div class="card text-white bg-success text-center " style="width: 200px; padding:40px 40px ; margin-left:20px; float:left">
    <div class="card-header " >Accepted </div>
    <div class="card-body">
    <h5 class="card-title">
    </h5>
      <p class="card-text"></p>
    </div>
  </div>
  <div class="card text-white bg-warning text-center" style="width: 200px; padding:40px 40px; margin-left:20px; float:left">
    <div class="card-header">Total Amount</div>
    <div class="card-body">
    <h5 class="card-title">{{$t_amount}}</h5>
      <p class="card-text"></p>
    </div>
  </div>
  <div class="card text-white bg-danger text-center" style="width: 200px; padding:40px 40px; margin-left:20px; float:left">
    <div class="card-header">Due Amount</div>
    <div class="card-body">
    <h5 class="card-title">{{($charge)-($balance)}}</h5>
      <p class="card-text"></p>
    </div>
  </div>
  <div class="card text-white bg-info text-center" style="width: 200px; padding:40px 40px; margin-left:20px; float:left">
    <div class="card-header">Decline</div>
    <div class="card-body">
      <h5 class="card-title">{{ $decline }}</h5>
      <p class="card-text"></p>
    </div>
  </div>
<br><br>
<br>
<br>
<br>
<br>
 
 

</head>
<body>
 <div class="container box">
  <h1 align="center">Search Date </h1>
  <br />
  <div class="table-responsive">
   <br />
   <form method="GET" action="">
   <div class="row">
    <div class="input-daterange">
     <div class="col-md-4">
      <input type="text" name="start" id="start" class="form-control" />
     </div>
     <div class="col-md-4">
      <input type="text" name="end" id="end" class="form-control" />
     </div>      
    </div>
    <div class="col-md-4">
     <input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
    </div>
   </div>
  </form>
   <br />


   
  </div>
 </div>
</body>


<script type="text/javascript">
  $(function() {
          $("#start").datepicker({ format: "yy-mm-dd" });
          $("#end").datepicker({ format: "yy-mm-dd" });
  });
</script>


 @endif
 

@endsection
