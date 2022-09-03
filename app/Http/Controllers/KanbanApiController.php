<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class KanbanApiController extends Controller
{
    public function index()
    {
        $task = Task::orderBy('id', 'DESC')->get();
        return response()->json([
            'success' => true,
            'message' => "Data Retrieve Successfully",
            'data' => $task
        ]);
    }

    public function store(Request $request)
    {
        $task_name = Task::where('task_name', $request->task_name)->first();
        if ($task_name) {
            return response()->json([
                'error' => true,
                'message' => "Task already exist"
            ]);
        }
        $task = Task::create([
            'task_name' => $request->task_name,
            'task_category' => 1
        ]);

        return response()->json([
            'success' => true,
            'message' => "Task Store Successfully"
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
