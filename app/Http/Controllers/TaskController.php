<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        $TASK_name = $request->input('name');
        DB::table('tasks')->insert([
            'name' => $TASK_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/tasks');
    }
    public function destroy($id)
    {
        DB::table('tasks')->where('id' , $id ) -> delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id' , $id ) -> first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update(Request $request, $id)
    {
        $TASK_name = $request->input('name');
        DB::table('tasks')->where('id' , $id ) -> update([
            'name' => $TASK_name,
            'updated_at' => now(),
        ]);
        return redirect('/tasks');
    }
}
