<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\deposit;
use DB;
class DepositController extends Controller
{   
public function AddDeposit(Request $request)
{
 
        //add booking data into booking table
        $deposit = new deposit();
        $deposit->bookingID = $request->get("bookingID"); 
    
        $file = $request->file('file');
        if(isset($file)){
            $file->move('imageFileName',$file->getClientOriginalName());
            $deposit->imagedeposit = $file->getClientOriginalName();
        }
        
        $deposit->save();
       
      //soft delete
      return response()->json(array(
        'message' => 'Adddeposit successfully', 
        'status' => 'true'));
}

public function viewDeposit($id)
{
    $sql="SELECT * FROM deposit WHERE deposit.bookingID='$id'";
    $deposit=DB::select($sql)[0];         
    return response()->json($deposit);
}


public function AddDeposit2(Request $request)
{
 
        //add booking data into booking table
        $deposit = new deposit();
        $deposit->bookingID = $request->get("bookingID"); 
    
        $file = $request->file('file');
        if(isset($file)){
            $file->move('imageFileName',$file->getClientOriginalName());
            $deposit->imagedeposit2 = $file->getClientOriginalName();
        }
        $deposit->save();
       
      //soft delete
      return response()->json(array(
        'message' => 'Adddeposit2 successfully', 
        'status' => 'true'));
}

}



