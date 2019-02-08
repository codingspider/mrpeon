<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')


<table class="table table-striped table-hover ">
    <thead>
    <tr>
   
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <td>Address</td>
    </tr>
    </thead>
    <tbody>
    <tr>
    
    <tr class="info">
      @foreach ($data as $item)

    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->phone}}</td>
    <td>{{$item->address}}</td>

    
    </tr>
    @endforeach
   
  
    </tbody>
  </table>

{{-- <!-- ADD A PAGINATION -->
<p>{{$result->links()}}</p> --}}
@endsection