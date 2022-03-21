<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderList = OrderDetail::all();
        foreach($orderList as $order) {
            $order->orderName = $order->orders->status;
            $order->productName = $order->products->name;
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
        $order              = new OrderDetail();
        $order->idProduct        = $request->idProduct;
        $order->idOrder      = $request->idOrder;
        $order->quantity    = $request->quantity;
        $order->discount    = $request->discount;
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
        $orderList = OrderDetail::where('idOrder', '=', $id)->get();
        foreach($orderList as $order) {
            $order->orderName = $order->orders->status;
            $order->productName = $order->products->name;
        }
        return [
            'status'     => "200",
            'listObject' => $orderList
        ];
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
        $order = OrderDetail::find($id);
        $order->idProduct        = $request->idProduct;
        $order->idOrder      = $request->idOrder;
        $order->quantity    = $request->quantity;
        $order->discount    = $request->discount;
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
        OrderDetail::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
