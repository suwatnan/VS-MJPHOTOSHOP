<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sizeimage;

class SizeimageController extends Controller
{
    public function index()
    {
        $Sizeimage = Sizeimage::all(); 
        return response()->json($Sizeimage);
    }

}