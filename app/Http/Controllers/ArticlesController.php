<?php

namespace App\Http\Controllers;
use App\Models\Article;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles); 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',
            'name' => 'required|string',
            'code' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',           
        ]);

        //Save image in server and get its url
        $url_image = $this->validate_image($request);

        $article = Article::create([
            'image' => $url_image,
            'name' => $request->name, 
            'code' => $request->code,
            'categories_id' => $request->categories_id,
            'selling_price' => $request->selling_price,
            'stock' => $request->stock,
            'description' => $request->description,
            'active' => true,
        ]);

        return response(
            [
                'message' => 'Articulo creado exitósamente.',
                'new_article' => $article //Nuevo usuario creado
            ]
        );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
     
        // return response()->json();
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit( $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // return response('Response:'.$request);

        $article = Article::find($id);
        // return response('Response:'.$request);
        if ($request->hasfile('image')) {
            return response('Response:'.$request);
            $archivo = $request->file('image');
            $nuevo_nombre = uniqid() . time() . '.' . $archivo->getClientOriginalExtension(); //46464611435281365.jpg
            $direccion = public_path() . '/uploads'; // http://127.0.0.1:8000/public

            // $archivo->move($direccion, $nuevo_nombre, );
            $archivo->storeAs("vue/public/uploads/", $nuevo_nombre, 'art_image');
            $direccion = 'uploads/' . $nuevo_nombre; //uploads/46464611435281365.jpg

            // $article->image= 'vue/public/'.$article->image;
            if (Storage::disk('art_image')->exists($article->image)) {
    
                // return response('what delete(?)');
                Storage::disk('art_image')->delete($article->image);
    
                // return response('Se borro la foto chino');   
            }

        } else {


            $direccion = 'public/uploads/default.jpg';
            // return response('ElseXD');
            
        } 


      
        
      

        
        // $article = Article::find($id);
        $article->image=$direccion;
        $article->name=$request->name;
        $article->code=$request->code;
        $article->categories_id=$request->categories_id;
        $article->selling_price=$request->selling_price;
        $article->stock=$request->stock;
        $article->description=$request->description;
        $article->active=$request->active;

        $article->save();

        // $article->fill($request->all())->save(); 
        // return response()->json([
        //         'article'=>$article
        //     ]);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // return response('what delete(?)');

        $article = Article::find($id);
        // $article->image= 'hola'.$article->image;
        
        // return response('Entramos, a ver: '.$article->image);
        $article->image= 'vue/public/'.$article->image;
        // return response('Entramos, a ver: '.$article->image);
        if (Storage::disk('art_image')->exists($article->image)) {

            // return response('what delete(?)'.$article->image);
            Storage::disk('art_image')->delete($article->image);

            // return response('Se borro la foto chino');   
        }
       

        $article ->delete();
        return response('borrado');
        // $articles->delete();
        // return response()->json([
        //         'mensaje'=> 'article eliminado'
        //     ]);

        //
    }

    public function validate_image($request) {

        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public', $name);
            return '/storage' . '/' . $name; //uploads/46464611435281365.jpg

        } else {
            return null;
        }
    }
}
