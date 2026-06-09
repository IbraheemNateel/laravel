<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Auth\Events\Validated;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();


        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
      $Validated = $request->validate([
            'name' => 'required|string|max:10',
        ]);
        $TASK_name = $request->input('name');
        Task::create([
            'name' => $TASK_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/tasks');
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $task = Task::find($id);
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update(Request $request, $id)
    {
        $Validated = $request->validate([
              'name' => 'required|string|max:10',
          ]);
        $TASK_name = $request->input('name');
        $task = Task::find($id);
        $task->name = $TASK_name;
        $task->save();
        return redirect('/tasks');
    }
}
