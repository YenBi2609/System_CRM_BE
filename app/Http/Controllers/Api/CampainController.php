<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campain;

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
            // $mail = 'yenbi2609@gmail.com';
            // $message = [
            //     'type' => 'Create account',
            //     'task' => 'abc',
            //     'content' => 'has been created!',
            // ];
            // SendEmail::dispatch($message, $mail)->delay(now()->addMinute(1));
            // return [
            //     "status" => "200",
            //     "email"  => $mail
            // ];
        return (["response" => $campain_list, "status" => "200 OK"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campain              = new Campain();
        $campain->name  = $request->name;
        $campain->idUser = $request->idUser;
        if($campain->save()) {
            // $mail = $campain->email;
            // $message = [
            //     'type' => 'Create account',
            //     'task' => $campain->name,
            //     'content' => 'has been created!',
            // ];
            // SendEmail::dispatch($message, $mail)->delay(now()->addMinute(1));
            // return [
            //     "status" => "200",
            //     "email"  => $mail
            // ];
            return [
                "status" => "200"
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
}
