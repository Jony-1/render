<?php

namespace App\Http\Controllers;

use App\Models\config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = config::first();
        return response([
            'config' => $config
        ]); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit(config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $iva = config::find($id);
       
        $iva->iva_percent= $request->iva_percent;
        $iva->shipping_price= $request->shipping_price;
    
        $iva->save();

        return response([
            'message' => 'Tu configuración se actualizó exitosamente!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(config $config)
    {
        //
    }
}
