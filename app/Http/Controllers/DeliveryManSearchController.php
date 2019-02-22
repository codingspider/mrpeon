<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DeliveryManSearchController extends Controller
{
    public function index(){

     

        $data = DB::table('request_forms')->paginate(10);

        return view('merchant.delivery_man_search', compact('data'));
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('request_forms')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('phone', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('request_forms')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->address.'</td>
         <td>'.$row->phone.'</td>
         <td>'.$row->email.'</td>
         <td><input type="button" value="Add" onclick="add_data"></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}

 

 



