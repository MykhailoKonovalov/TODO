<?php

namespace App\Http\Controllers;

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
        $task = Task::get()->toJson(JSON_PRETTY_PRINT);
        return response($task, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $this->validate($request, [
            'performed' => ['boolean'],
            'text' => ['required', 'string'],
        ]);
        $task->text = $request->text;
        $task->performed = $request->performed;
        $task->save();

        return response()->json([
            "message" => "Task record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (Task::where('id', $id)->exists()) {
            $book = Task::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Task not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'performed' => ['boolean'],
            'text' => ['string'],
        ]);
        if (Task::find($id)->exists()) {
            $task = Task::find($id);
            $task->text = is_null($request->text)
                ? $task->text
                : $request->text;
            $task->performed = is_null($request->performed)
                ? $task->performed
                : $request->performed;
            $task->save();
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Task not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(Task::where('id', $id)->exists()) {
            $book = Task::find($id);
            $book->delete();
            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Task not found"
            ], 404);
        }
    }
}
