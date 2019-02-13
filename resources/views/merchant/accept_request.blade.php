<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th>Merchant Name</th>
        <th>Merchant Address</th>
        <th>Merchant Phone</th>
       <th>Request</th>
        
       </tr>
  </thead>
  <tbody>

 @foreach($result as $row)
    

       <tr>
 
        <td>{{$row->name}}</td>
        <td>{{$row->address}}</td>
        <td>{{$row->phone}}</td>

        <?php 

$data=DB::table('request_forms')->where('request_forms.merchant_id',$row->cid)->where('request_forms.agent_id','!=',0)->count();


  $agents= DB::table('agents')->get();
 

          ?>
 
        <td>
                     
        <a class='btn btn-info btn-sm' href="{{URL::to('/get_details/accept', $row->cid) }}" >{{$data}}</a>
          
        </td>
               
        
       </tr>

       @endforeach
    
  </tbody>
</table>

@endsection