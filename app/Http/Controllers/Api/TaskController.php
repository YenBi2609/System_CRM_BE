<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task_list = Task::all();
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
        $task              = new Task();
        $task->name  = $request->name;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->duration       = $request->duration;
        $task->date       = $request->date;
        $task->user       = $request->user;

        if($task->save()) {
            // $customerEmail = $task->customer->email;
            // $productName   = $task->product->name;
            // $taskduration    = $task->duration;
            // $message = [
            //     'type' => 'Register successsfully',
            //     'content' => 'Welcome to KOURSES, from Team 13 with love <3!',
            //     'productName' => $productName,
            //     'taskduration'  => $taskduration
            // ];
            // SendEmail::dispatch($message, $customerEmail)->delay(now()->addMinute(1));

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
        $task = Task::find($id);
        $task->name  = $request->name;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->duration       = $request->duration;
        $task->date       = $request->date;
        $task->user       = $request->user;
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
        Task::where('id', '=', $id)->delete();
        return [
            'status' => '200'
        ]; 
    }
}
