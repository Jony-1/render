<?php

namespace App\Http\Controllers;

use App\Models\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(

    )
    {

        $sales = DB::select('
        
        SELECT sales.sales_number AS number, sales.id, articles.name AS articles, users.name AS user, users.email, sales_details.amount, sales_details.price, sales_details.subtotal, configs.shipping_price, sales_details.iva, sales_details.total, sales.created_at, sales.state, details.phone_number, details.address, articles.code, configs.shipping_price, configs.iva_percent, sales.date
        FROM sales_details, articles, sales, users, configs, details, roles
        WHERE articles.id = sales_details.articles_id
        AND sales.id = sales_details.sales_id
        AND users.id = details.users_id
        AND users.id = sales_details.users_id
        ');
        

        return response() ->json($sales);

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
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(sales $sales)
    {
        //
    }
}
