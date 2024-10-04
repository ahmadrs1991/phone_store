<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => "required|email",
            "password" => "required",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => "provided email is not true"
        ]);
    }

    public function user_edit(Request $request,string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|numeric',
            'role' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $user = User::findOrFail($id);

        $user->update($request->all());
        return  view('admin.dashboard',$user);
    }
    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'تم حذف الجوال بنجاح!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("/");
    }
    public function dashIND(Request $request)
    {
        $users=User::all();
        return  view('admin.dashboard',compact('users'));
    }
}
