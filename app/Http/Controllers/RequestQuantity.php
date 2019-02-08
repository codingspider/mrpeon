<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestQuantity extends Controller
{
    public function index($id){

        
        return view('request_quantity');
    }


    public function get($id){

        $data=DB::table('request_forms')->where('merchant_id',$id)->get();

        return view('request_quantity', compact('data'));
    }
}
