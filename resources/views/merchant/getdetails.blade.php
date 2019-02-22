<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')


<table class="table table-striped table-hover ">
 
    <tbody>
    <tr>
    
    <tr class="info">
       

    <form action="{{URL::to('application/approve') }}" method="post">

            @csrf

          <table class="table table-striped">
          <thead>
            <tr>
              <th>Select</th>
              
              <th>Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($data as $passport)
          
            <tr>
              <td><input type="checkbox" name="pid[]" value="{{$passport->id}}"> <label>{{$passport->name}}</label></td>
         
            <td>{{$passport->id}}</td>
              <td>{{$passport->email}}</td>
              <td>{{$passport->phone}}</td>
              <td>@php
                  if($passport->status == 2)
                  echo '<span style="background-color: #00FA9A">Accepted</span>';
                else {
                  echo '<span style="background-color: #FD1919">Cancelled</span>';
                }
              @endphp
              
            </td>
             
            </tr>
            @endforeach
          </tbody>
        </table>
      
        <input type="radio" name="accept" value="2"> Accept <br>
        <input type="radio" name="accept" value="3"> Cancel<br>
        <br>
        <input type="submit" name="submit" class="btn btn-success">


      </form>
            
            </tr>
          
   
  
    </tbody>
  </table>

{{-- <!-- ADD A PAGINATION -->
<p>{{$result->links()}}</p> --}}
@endsection