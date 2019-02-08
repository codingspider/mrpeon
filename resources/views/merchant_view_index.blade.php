<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th> Request Quantity</th>
        <th> Total Charge</th>
        <th> Receive amount</th>
        <th> Dues amount</th>

        <th>Action</th>
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
      <tr>
        <td>{{$row->name}}</td>
        <td>{{$row->address}}</td>
        <td>{{$row->phone}}</td>

        <?php 

$data=DB::table('request_forms')->where('request_forms.merchant_id',$row->cid)->count();

$balance = DB::table('request_forms')->where('request_forms.merchant_id',$row->cid)->sum('receive_amount');


$charge = DB::table('request_forms')
  ->join('zones', 'zones.id', '=',  'request_forms.zone_id' )
  ->select('request_forms.id', 'zones.charge')
  ->where('request_forms.merchant_id',$row->cid)
	
  ->sum('zones.charge');

//dd($amount);

          ?>
 
        <td>
                    
        <a class='btn btn-info btn-sm' href="{{URL::to('/get_details',$row->cid)}}" style="display:block;">{{$data}}</a>
          
        </td>
          <td>{{$charge}} </td>
          <td>{{$balance}} </td>
      <td>{{($charge)-($balance)}}</td>
        
        
        <td>
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-danger btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
          @endif
        </td>
       </tr>
    @endforeach
  </tbody>
</table>

{{-- <!-- ADD A PAGINATION -->
<p>{{$result->links()}}</p> --}}
@endsection