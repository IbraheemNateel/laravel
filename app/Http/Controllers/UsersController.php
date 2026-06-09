<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $USER_name = $request->input('name');
        $USER_email = $request->input('email');
        $USER_password = $request->input('password');
        DB::table('users')->insert([
            'name' => $USER_name,
            'email' => $USER_email,
            'password' => bcrypt($USER_password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/users');
    }
    public function destroy($id)
    {
        DB::table('users')->where('id' , $id ) -> delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id' , $id ) -> first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:8',
        ]);
        $USER_name = $request->input('name');
        $USER_email = $request->input('email');
        $USER_password = $request->input('password');
        if ($request->password) {
    $data['password'] = bcrypt($request->password);
}

DB::table('users')->where('id', $id)->update($data);
        DB::table('users')->where('id' , $id ) -> update([
            'name' => $USER_name, 
            'email' => $USER_email,
            'password' => bcrypt($USER_password),
            'updated_at' => now(),
        ]);
        return redirect('/users');

    }
}
