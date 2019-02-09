<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Merchant;
use App\request_forms;

class RequestQuantity extends Controller
{
    public function index($id){

        
        return view('request_quantity');
    }


    public function get($id){

        $data=DB::table('request_forms')->where('merchant_id',$id)->get();

        return view('request_quantity', compact('data'));
    }



public function insert (Request $request, $id){



        $result =  DB::Table('request_forms')->where('merchant_id',$id)
        ->update(
        array(
        'agent_id' =>  $request->merchnt
        )
               );
        return  redirect()->back();
    }

    
    
    



}
