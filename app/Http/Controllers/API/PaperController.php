<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;

class PaperController extends Controller
{
    public function index()
    {
        $Paper = Paper::all(); 
        return response()->json($Paper);
    }

}