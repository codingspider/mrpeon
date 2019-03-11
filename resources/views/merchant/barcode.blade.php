@extends('crudbooster::admin_template') 
@section('content')


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Charge</th>
            <th>Description</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach ($details as $detail)
        <td>{{ $detail->id }}</td>
        <td>{{ $detail->address}}</td>
        <td>{{ $detail->email }}</td>
        <td>{{ $detail->phone }}</td>
        <td>{{ $detail->receive_amount }}</td>
        <td>{{ $detail->description}}</td>
        <td><a href="{{ URL::to('details/pages/barcode/view', $detail->id)}}" class="btn btn-warning" >Print</a></td>
            
        
    </tr>
        @endforeach
        
        
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Charge</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

 
 


@endsection
