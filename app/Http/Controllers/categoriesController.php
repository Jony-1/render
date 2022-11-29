<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return response()->json($categories); 
        //
    }
}
