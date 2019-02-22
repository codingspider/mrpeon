<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
class BarcodeController extends Controller
{
    public function barcode(){

        $details = DB::table('request_forms')->paginate(15);

        return view('merchant.barcode', compact('details'));
    }
    public function details(Request $request, $id){

        $details = DB::table('request_forms')
        ->where('id', $id)
        
        ->first();

        return view ('merchant.details', compact('details'));
    }
   
}
