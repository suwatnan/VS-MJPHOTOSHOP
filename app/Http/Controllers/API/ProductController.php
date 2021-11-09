<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        $size = $request->get('size');
        $sql="SELECT * FROM product";
        if($size != ""){
            $sql.= " WHERE size = '$size' ";
        }
        if($size == "-เลือกขนาดรูป-"){
           
        }
        $product=DB::select($sql);         
        return response()->json($product);
    }
    
}
