<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendEmail;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::all();
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
                "status" => "200",
                "data"  => $user
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
    public function login(Request $request)
    {        
        $user = User::where('email', '=', $request->email)->where('password','=', $request->password)->get();
        return [
            'status' => '200',
            'user' => $user
        ]; 
    }
}
