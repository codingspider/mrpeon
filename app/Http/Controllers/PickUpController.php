<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PickUpController extends Controller
{
    public function index () {

        

        return view('merchant.pickup_request');
    }

public function search(Request $request) {
        if($request->ajax()){
   $key=$_GET['query'];
   
   $status =array(2,3);
   $products=DB::table('request_forms')
               ->join('zones','zone.id','=','request_forms.zone_id')
               ->select('request_forms.*','zone.charge')
               ->where('string','LIKE','%'.$key."%")
               ->whereIn('request_forms.status',$status)->get();
       if($products){
               foreach ($products as $key => $product) {
   $suggestions=[];
   $suggestions[$key]['value']=$product->name;
   
   $suggestions[$key]['ui']='<tr>
                               <td>'.$product->string.'</td>
                               <td>'.$product->name.'</td>
                               <td>'.$product->address.'</td>
                               <td>'.$product->phone.'</td>
                               <td>'.$product->description.'</td>
                               <td>'.$product->receive_amount.'</td>
                               <input type="hidden" id="pid" name="pid[]" value="'.$product->id.'">
                               <td><input type="button" value="Delete" onclick="delRow(this)"></td>
                             </tr>';
   
   
       }
   
       $output["suggestions"]=$suggestions;
       return Response($output);
       }
    }
 }
}
