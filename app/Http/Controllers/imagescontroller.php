<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imagescontroller extends Controller
{

    public function index()
    {
        $articles_images = Article::all();
        return response()->json($articles_images);
        //
    }

    public function show_image(Request $request)
    {
        // return response('Into the show first... ');
        $article = Article::all();

        if (Storage::disk('art_image')->exists($article->image)) {

            // return Storage::disk('art_image');
            return response('File joven... ');
            
        }
        return response('Into the show... ');
        // return response()->json();
        //
    }
    //
}
