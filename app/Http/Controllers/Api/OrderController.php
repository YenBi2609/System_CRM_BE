<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderList = Order::all();
        foreach($orderList as $order) {
            $order->clientName = $order->clients->name;
            $order->userName = $order->users->name;
        }
        return [
            'status'     => "200",
            'listObject' => $orderList
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order              = new Order();
        $order->idClient        = $request->idClient;
        $order->date      = $request->date;
        $order->note    = $request->note;
        $order->idUser    = $request->idUser;
        $order->status      = $request->status;
        $order->total    = $request->total;

        if($order->save()) {

            return [
                "status" => "200",
                "data"  => $order
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
        $order = Order::find($id);
        $order->idClient        = $request->idClient;
        $order->date      = $request->date;
        $order->note    = $request->note;
        $order->idUser    = $request->idUser;
        $order->status      = $request->status;
        $order->total    = $request->total;
        if($order->save()) {
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
        order::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
