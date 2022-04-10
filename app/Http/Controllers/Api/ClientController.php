<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_list = Client::all();
        return (["response" => $client_list, "status" => "200 OK"]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client              = new Client();
        $client->name  = $request->name;
        $client->phoneNumber = $request->phoneNumber;
        $client->address = $request->address;
        $client->email       = $request->email;

        if($client->save()) {

            return [
                "status" => "200",
                "data"  => $client
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
        $client = Client::find($id);
        $client->name  = $request->name;
        $client->phoneNumber = $request->phoneNumber;
        $client->address = $request->address;
        $client->email       = $request->email;
        if($client->save()) {
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
        Client::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
