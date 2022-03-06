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
        $task_list = Product::all();
        return (["response" => $task_list, "status" => "200 OK"]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task              = new Product();
        $task->name        = $request->name;
        $task->description      = $request->description;
        $task->price    = $request->price;
        $task->cost    = $request->cost;
        $task->quantity        = $request->quantity;

        if($task->save()) {

            return [
                "status" => "200",
                "email"  => $task
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
        $task = Product::find($id);
        $task->name        = $request->name;
        $task->description      = $request->description;
        $task->price    = $request->price;
        $task->cost    = $request->cost;
        $task->quantity        = $request->quantity;
        if($task->save()) {
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
