<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\receiving;

class ReceivingController extends Controller
{
    public function index()
    {
        $receiving = receiving::all(); 
        return response()->json($receiving);
    }

}