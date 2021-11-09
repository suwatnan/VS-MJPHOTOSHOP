<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\Paper;
use App\Models\Product;
use DB;
class PaymentController extends Controller
{
public function payment(Request $request)
{
    $paperID = $request->get('paperID');
    $sql ="UPDATE paper SET quantity = quantity -1 WHERE paperID = $paperID";
    $data = DB::select($sql);

    $productID = $request->get('productID');
    $sql ="UPDATE product SET quantity = quantity -1 WHERE productID = $productID";
    $data = DB::select($sql);
    
}

    
public function AddPayment(Request $request)
{
 
        //add booking data into booking table
        $payment = new payment();
        $payment->printphotoID = $request->get("printphotoID"); 
    
        $file = $request->file('file');
        if(isset($file)){
            $file->move('imageFileName',$file->getClientOriginalName());
            $payment->imagebill = $file->getClientOriginalName();
        }
        $payment->save();
       
      //soft delete
      return response()->json(array(
        'message' => 'AddPaymentg successfully', 
        'status' => 'true'));
}

public function viewPayment($id)
{
    $sql="SELECT * FROM payment WHERE payment.printphotoID ='$id'";
    $payment=DB::select($sql)[0];         
    return response()->json($payment);
}

}



