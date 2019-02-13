<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Add Form</div>
    @php
        $datas = DB::table('zones')->get();
    @endphp
    <div class='panel-body'>
      <form method='post' action='{{CRUDBooster::mainpath('add-save')}}'>
        @csrf
        <div class='form-group col-md-8 '>
          <label>Name</label>
          <input type='text' name='name' required class='form-control'/>
        </div>
        <div class='form-group col-md-8 '>
            <label>Email</label>
            <input type='text' name='email' required class='form-control'/>
          </div>
          <div class='form-group col-md-8 '>
            <label>Address</label>
            <input type='text' name='address' required class='form-control'/>
          </div> 
          <div class='form-group col-md-8 '>
            <label>Description</label>
            <input type='text' name='description' required class='form-control'/>
          </div> 
          <div class='form-group col-md-8 '>
            <label>Phone</label>
            <input type='text' name='phone' required class='form-control'/>
          </div>
          <div class='form-group col-md-8 '>
            <label>Select Zone</label>
            <select class="form-control" name="zone_id">
                  @foreach ($datas as $value)

                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                        
                    @endforeach
                
            </select>
          </div>  
          <div class='form-group col-md-8 '>
            <label>Receive Amount</label>
            <input type='text' name='receive_amount' required class='form-control'/>
          </div> 

          <input type="hidden" name="string" value="<?php echo substr(md5(mt_rand()), 0, 7); ?>">

          <input type="hidden" name="status" value="1">
          <input type="hidden" name="merchant_id" value="{{ CRUDBooster::myId()}}">
        {{-- <input type="hidden" name="" value="{{ CRUDBooster::myId()}}" --}}
         
        <!-- etc .... -->


        
     
    </div>
    <div class='panel-footer'>
      <input type='submit' class='btn btn-primary' value='Save changes'/>
    </div>
</form>
  </div>
  
@endsection