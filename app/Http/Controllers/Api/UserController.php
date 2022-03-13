<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = User::get();
        // return json_encode($post);
        $user_list = User::all();
        return (["response" => $user_list, "status" => "200 OK"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user              = new User();
        $user->name  = $request->name;
        $user->phoneNumber = $request->phoneNumber;
        $user->address = $request->address;
        $user->email       = $request->email;
        $user->password       = $request->password;
        $user->role       = $request->role;
        if($user->save()) {
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
        $user = User::find($id);
        $user->name  = $request->name;
        $user->phoneNumber = $request->phoneNumber;
        $user->address = $request->address;
        $user->email       = $request->email;
        $user->password       = $request->password;
        $user->role       = $request->role;
        if($user->save()) {
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
        User::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
