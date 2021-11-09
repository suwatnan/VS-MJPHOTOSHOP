<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\editpayment;
use DB;
class EditpaymentController extends Controller
{
  
public function Addeditpayment(Request $request)
{
 
        //add booking data into booking table
        $editpayment = new editpayment();
        $editpayment->printphotoID = $request->get("printphotoID"); 
    
        $file = $request->file('file');
        if(isset($file)){
            $file->move('imageFileName',$file->getClientOriginalName());
            $editpayment->imagebill2 = $file->getClientOriginalName();
        }
        $editpayment->save();
       
      //soft delete
      return response()->json(array(
        'message' => 'Addeditpayment successfully', 
        'status' => 'true'));
}



}



