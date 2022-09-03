<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Task;

class KanbanController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();
        return view('kanbanBoard')->with('tasks', $tasks);
    }

    public function store(Request $request)
    {
        $task_name = Task::where('task_name', $request->task_name)->first();
        if ($task_name) {
            return redirect()->back()->with('error', 'Task name is duplicate');
        }
        $task = Task::create([
            'task_name' => $request->task_name,
            'task_category' => 1
        ]);

        return redirect()->back();
    }

    public function inProgress($id)
    {
        $task = Task::where('id', $id)->update(['task_category' => 2]);
        return redirect()->back();
    }

    public function todo($id)
    {
        $task = Task::where('id', $id)->update(['task_category' => 1]);
        return redirect()->back();
    }

    public function taskDone($id)
    {
        $task = Task::where('id', $id)->update(['task_category' => 3]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $task = Task::where('id', $id);
        $task->delete();
        return redirect()->back();
    }
}
