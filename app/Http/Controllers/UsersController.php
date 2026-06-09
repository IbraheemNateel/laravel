<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

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
        User::create([
            'name' => $USER_name,
            'email' => $USER_email,
            'password' => bcrypt($USER_password),
        ]);
        return redirect('/users');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    public function edit($id)
    {
        $user = User::find($id);
        $users = User::all();
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
        $user = User::find($id);
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->name = $USER_name;
        $user->email = $USER_email;
        $user->save();

        return redirect('/users');
    }
}
