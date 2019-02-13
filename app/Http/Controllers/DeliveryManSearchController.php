<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DeliveryManSearchController extends Controller
{
    public function index(){

        return view('merchant.delivery_man_search');
    }


    public function action(Request $request)
 
{
 
if($request->ajax())
 
{
 
$output="";
 
$products=DB::table('request_forms')->where('name','LIKE','%'.$request->search."%")->get();
 
if($products)
 
{
 
foreach ($products as $key => $product) {
 
$output.='<tr>'.
 
'<td>'.$product->id.'</td>'.
 
'<td>'.$product->name.'</td>'.
 
'<td>'.$product->email.'</td>'.
 
'<td>'.$product->phone.'</td>'.
 
'</tr>';
 
}

 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }
 
 
 
}
 
}