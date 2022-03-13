<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = Product::all();
        return (["response" => $product_list, "status" => "200 OK"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->description      = $request->description;
        $product->price    = $request->price;
        $product->cost    = $request->cost;
        $product->quantity        = $request->quantity;

        if($product->save()) {

            return [
                "status" => "200",
                "email"  => $product
            ];
        } else {
            return [
                "status" => "500"
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name        = $request->name;
        $product->description      = $request->description;
        $product->price    = $request->price;
        $product->cost    = $request->cost;
        $product->quantity        = $request->quantity;
        if($product->save()) {
            return [
                "status" => "200"
            ];
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
