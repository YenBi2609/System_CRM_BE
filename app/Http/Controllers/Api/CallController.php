<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Call;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callList = Call::all();
        foreach($callList as $call) {
            $call->clientName = $call->clients->name;
            $call->userName = $call->users->name;
            $call->phoneNumber = $call->clients->phoneNumber;
        }
        return [
            'status'     => "200",
            'listObject' => $callList
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
        $call              = new Call();
        $call->idClient        = $request->idClient;
        $call->date      = $request->date;
        $call->note    = $request->note;
        $call->idUser    = $request->idUser;

        if($call->save()) {

            return [
                "status" => "200",
                "data"  => $call
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
        $call = Call::find($id);
        $call->idClient        = $request->idClient;
        $call->date      = $request->date;
        $call->note    = $request->note;
        $call->idUser    = $request->idUser;
        if($call->save()) {
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
        Call::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
