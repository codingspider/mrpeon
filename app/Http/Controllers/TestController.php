<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
session_start();

class TestController extends Controller
{
    public function index(){
    	//$data= "Rokon";
    	$prepend=[];
    	
    	$product['fff'] =['1,2,3,4'];
    	Session::flash('mizan','hi wants to sleep');


		
    	
    	return view('index',$product);
           
    }
}
