<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formatprint;

class FormatprintController extends Controller
{
    public function index()
    {
        $formatprint = formatprint::all(); 
        return response()->json($formatprint);
    }

}