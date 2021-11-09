<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timess;

class TimessController extends Controller
{
    public function index()
    {
        $timess = Timess::all(); 
        return response()->json($timess);
    }

}