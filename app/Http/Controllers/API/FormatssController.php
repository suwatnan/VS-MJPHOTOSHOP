<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formatss;

class FormatssController extends Controller
{
    public function index()
    {
        $formatss = Formatss::all(); 
        return response()->json($formatss);
    }

}