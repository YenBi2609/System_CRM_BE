<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campain;
use App\Models\Client;
use App\Jobs\SendEmail;

class CampainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $campain_list = Campain::all();
        foreach($campain_list as $campain) {
            $campain->userName = $campain->users->name;
        }
        return [
            'status'     => "200",
            'response' => $campain_list
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
        $campain       = new Campain();
        $campain->name  = $request->name;
        $campain->idUser = $request->idUser;
        $campain->content = $request->content;
        if($campain->save()) {
            return [
                "status" => "200",
                "data"  => $campain
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
        $campain = Campain::find($id);
        $campain->name  = $request->name;
        $campain->idUser = $request->idUser;
        $campain->content = $request->content;
        if($campain->save()) {
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
        Campain::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
    public function sendEmail($id)
    {
        $campain = Campain::find($id);
        $client_list = Client::all();
        foreach($client_list as $client) {
            $mail = $client->email;
            $message = [
                'content' => $campain->content,
            ];
            SendEmail::dispatch($message, $mail)->delay(now()->addMinute(1));
        }

        $campain->totalEmailSent += count($client_list);
        if($campain->save()) {
            return [
                "status" => "200",
                'response' => count($client_list)
            ];
        } 
    }
}
