<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
      <section style="width:360px; padding: 7px;margin-left:30px">
        <div class="container">
          <div class="row">
            <img src="" width="140" class="img-responsive" style="float:left;">
          <div class=""></div>
              <div><br>
                <b style="padding:0px">Sender  Details</b><br><br>
                <label style="font-weight: bold;">Name:</label><span>  {{ $details->name}}</span><br>
                <label style="font-weight: bold;">Number:</label><span>  {{ $details->phone}}</span><br>
                <label style="font-weight: bold;">Email:</label><span>  {{ $details->email}}</span><br>
                <label style="font-weight: bold;">Address:</label><span>  {{ $details->address}}</span><br><br>

                           


                <span>..........................................</span><br>
                <b class="py-2"> Recipient Signature</b>
              </div>
              <p><?php

              //echo DNS1D::getBarcodeHTML($details->string, "C128");
              echo DNS1D::getBarcodeSVG($details->string, "C39");
              ?></p>
              <p style="margin-left:50px">{{$details->string}}</p>
          </div>
        </div>
      </section><br><br><br><br>

      <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>




 @endsection 