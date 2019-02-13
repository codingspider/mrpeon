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
        <th> Assign Agent</th>
        
       </tr>
  </thead>
  <tbody>

 @foreach($result as $row)
    
@php



$data=DB::table('request_forms')->where('request_forms.merchant_id',$row->cid)->where('request_forms.agent_id',0)->get(); 
if(count($data) ==0){
  continue;
}else{
  
}


@endphp
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

  $agents= DB::table('agents')->get();



  

          ?>
 
        <td>
              
         
        <a class='btn btn-info btn-sm' href="{{URL::to('/get_details', $row->cid) }}" >{{$data}}</a>
       
          
        </td>
          <td>{{$charge}} </td>
          <td>{{$balance}} </td>
      <td>{{($charge)-($balance)}}</td>
               
        
          <td>
            <form action="{{URL::to('/merchant/added',$row->cid )}}" method="post">
              @csrf
                  <select class="form-control" name="merchnt" id="merchnt" onchange="this.form.submit()">
                      <option>Choose Agent</option>

                    @foreach ($agents as $item)
                    
                  <option value="{{$item->cmsuser_id}}">{{$item->name}}</option>
                                       
                    @endforeach
                        
                   </select> 
                   
                 </form>
                </td>
             <td>
          </td>
       </tr>

       @endforeach
    
  </tbody>
</table>



{{-- <!-- ADD A PAGINATION -->
<p>{{$result->links()}}</p> --}}
@endsection