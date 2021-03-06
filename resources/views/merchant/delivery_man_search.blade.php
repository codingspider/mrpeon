@extends('crudbooster::admin_template') 
@section('content')


<div class="container box">
    
    <h3 align="center">Live search </h3><br />
    <div class="panel panel-default">
     <div class="panel-heading">Search  Data</div>
     <div class="panel-body">
      <div class="form-group">
       <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
      </div>
      <div class="table-responsive">
       <h3 align="center">Total Data : <span id="total_records"></span></h3>
       <table class="table table-striped table-bordered">
        <thead>
         <tr>
          <th> Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
 
        </tbody>
       </table>
      </div>
     </div>    
    </div>
   </div>
  </body>
 </html>
 
 <script>
 $(document).ready(function(){
 
  fetch_customer_data();
 
  function fetch_customer_data(query = '')
  {
   $.ajax({
    url:"{{ route('search') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
     $('tbody').html(data.table_data);
     $('#total_records').text(data.total_data);
    }
   })
  }
 
  $(document).on('keyup', '#search', function(){
   var query = $(this).val();
   fetch_customer_data(query);
   
  });
 });
</script>

 
 


@endsection
