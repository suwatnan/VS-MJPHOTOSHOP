<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\printphoto;
use App\Models\printphotodetail;
use DB;

class PrintphotoController  extends Controller
{
    public function addprintphoto(Request $request)
    {
        $iduser = $request->get('iduser');
        $printphoto = new printphoto();  
        $printphoto->status  = 0;
        $printphoto->userID= $iduser;    
        $printphoto->save(); 
        
        $sql = "SELECT printphotoID FROM printphoto WHERE userID = $iduser ORDER BY printphotoID DESC";
        $data = DB::select($sql)[0];

        $printphotodetail = new printphotodetail();  
        $printphotodetail->sizeimageID = $request->get('sizeimageID');
        $printphotodetail->formatprintID = $request->get('formatprintID');
        $printphotodetail->productID = $request->get('productID');
        $printphotodetail->note = $request->get('note');
        $printphotodetail->paperID = $request->get('paperID');
        $printphotodetail->totalprice = $request->get('totalprice');
        $printphotodetail->printphotoID = $data-> printphotoID;
       

        $file = $request->file('file');
        if(isset($file)){
            $file->move('imageFileName',$file->getClientOriginalName());
            $printphotodetail->imageFileName = $file->getClientOriginalName();
        }
        $printphotodetail->save();

        return response()->json(array(
            'message' => 'add a printphoto successfully', 
            'status' => 'true'));  
           
        
       
    }

    public function viewprintphotodetail($id)
    {
       $sql = "SELECT printphoto.*,paper.*,sizeimage.*,product.*,printphotodetail.*,users.*,formatprint.* FROM printphotodetail
       INNER JOIN printphoto ON printphoto.printphotoID = printphotodetail.printphotoID
       INNER JOIN paper ON paper.paperID = printphotodetail.paperID
       INNER JOIN sizeimage ON sizeimage.sizeimageID = printphotodetail.sizeimageID
       INNER JOIN product ON product.productID = printphotodetail.productID
       INNER JOIN users ON users.userID = printphoto.userID
       INNER JOIN formatprint ON formatprint.formatprintID = printphotodetail.formatprintID
       WHERE printphoto.userID = $id AND (printphoto.status = 0 or printphoto.status = 1 or printphoto.status = 5)";  
        
        $printphotodetail=DB::select($sql);         
        return response()->json($printphotodetail);
    }

    public function view($id)
    {
        $sql="SELECT * FROM printphotodetail WHERE printphotodetail.printphotoID='$id'";
        $printphotodetail=DB::select($sql)[0];         
        return response()->json($printphotodetail);
    }

    public function viewprintphotoID()
    {
        $sql="SELECT * FROM `printphoto` WHERE 1 ORDER BY printphotoID DESC ";
        
        $printphoto=DB::select($sql)[0];         
        return response()->json($printphoto);
    }

    public function up1($printphotoID)
    {
        $printphoto = printphoto::find($printphotoID);
        $printphoto->status = 1;
        $printphoto->save();
        $sql="SELECT * FROM `printphotodetail` WHERE printphotoID = $printphotoID ";
        $printphoto1=DB::select($sql)[0];  

        $paperID = $printphoto1->paperID;
        $sql ="UPDATE paper SET quantity = quantity -1 WHERE paperID = $paperID";
        $data = DB::select($sql);

        $productID = $printphoto1->productID;
        $sql ="UPDATE product SET quantity = quantity -1 WHERE productID = $productID";
        $data = DB::select($sql);
    
        
        return response()->json(array(
            'message' => 'up a printphoto successfully', 
            'status' => 'true'));

    }

    public function up2($printphotoID)
    {
        $printphoto = printphoto::find($printphotoID);
        $printphoto->status = 4;
        $printphoto->save();
        
        return response()->json(array(
            'message' => 'up a printphoto successfully', 
            'status' => 'true'));

    }


    public function viewhistory2($id)
    {
        $sql = "SELECT printphoto.*,paper.*,sizeimage.*,product.*,printphotodetail.*,users.*,formatprint.* FROM printphotodetail
       INNER JOIN printphoto ON printphoto.printphotoID = printphotodetail.printphotoID
       INNER JOIN paper ON paper.paperID = printphotodetail.paperID
       INNER JOIN sizeimage ON sizeimage.sizeimageID = printphotodetail.sizeimageID
       INNER JOIN product ON product.productID = printphotodetail.productID
       INNER JOIN users ON users.userID = printphoto.userID
       INNER JOIN formatprint ON formatprint.formatprintID = printphotodetail.formatprintID
       WHERE printphoto.userID = $id AND (printphoto.status = 2 or printphoto.status = 3 or printphoto.status = 4)";  
        
        $printphotodetail=DB::select($sql);         
        return response()->json($printphotodetail);

    }

    public function viewhistory3($id)
    {
        $sql = "SELECT printphoto.*,paper.*,sizeimage.*,product.*,printphotodetail.*,users.*,formatprint.* FROM printphotodetail
       INNER JOIN printphoto ON printphoto.printphotoID = printphotodetail.printphotoID
       INNER JOIN paper ON paper.paperID = printphotodetail.paperID
       INNER JOIN sizeimage ON sizeimage.sizeimageID = printphotodetail.sizeimageID
       INNER JOIN product ON product.productID = printphotodetail.productID
       INNER JOIN users ON users.userID = printphoto.userID
       INNER JOIN formatprint ON formatprint.formatprintID = printphotodetail.formatprintID
       WHERE printphoto.userID = $id AND (printphoto.status = 2)";  
        
        $printphotodetail=DB::select($sql);         
        return response()->json($printphotodetail);

    }

    public function viewhistory4($id)
    {
        $sql = "SELECT printphoto.*,paper.*,sizeimage.*,product.*,printphotodetail.*,users.*,formatprint.* FROM printphotodetail
       INNER JOIN printphoto ON printphoto.printphotoID = printphotodetail.printphotoID
       INNER JOIN paper ON paper.paperID = printphotodetail.paperID
       INNER JOIN sizeimage ON sizeimage.sizeimageID = printphotodetail.sizeimageID
       INNER JOIN product ON product.productID = printphotodetail.productID
       INNER JOIN users ON users.userID = printphoto.userID
       INNER JOIN formatprint ON formatprint.formatprintID = printphotodetail.formatprintID
       WHERE printphoto.userID = $id AND printphoto.status = 3";  
        
        $printphotodetail=DB::select($sql);         
        return response()->json($printphotodetail);

    }

    public function viewhistory5($id)
    {
        $sql = "SELECT printphoto.*,paper.*,sizeimage.*,product.*,printphotodetail.*,users.*,formatprint.* FROM printphotodetail
       INNER JOIN printphoto ON printphoto.printphotoID = printphotodetail.printphotoID
       INNER JOIN paper ON paper.paperID = printphotodetail.paperID
       INNER JOIN sizeimage ON sizeimage.sizeimageID = printphotodetail.sizeimageID
       INNER JOIN product ON product.productID = printphotodetail.productID
       INNER JOIN users ON users.userID = printphoto.userID
       INNER JOIN formatprint ON formatprint.formatprintID = printphotodetail.formatprintID
       WHERE printphoto.userID = $id AND printphoto.status = 4";  
        
        $printphotodetail=DB::select($sql);         
        return response()->json($printphotodetail);

    }

    public function deleteprintphotodetail($id)
    {
        //hard delete
        $printphotodetail = printphotodetail::find($id);
        $printphotodetail->delete();
        //soft delete
        return response()->json(array(
            'message' => 'delete a print successfully', 
            'status' => 'true'));
    }

    
       
      
}