<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Session::flash('status', 'succes');
            Session::flash('message', 'Success Login!');

            // return redirect('/');
            return Redirect::intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Wrong email or password!');

        return Redirect::to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'max:255',
            'password' => 'required|max:255',
        ]);

        $newImage = '';

        if ($request->file('image_req')) {
            $extension = $request->file('image_req')->getClientOriginalExtension();
            $newImage = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('image_req')->storeAs('image_req', $newImage);
        }

        $newFile = '';

        if ($request->file('file_req')) {
            $extension = $request->file('file_req')->getClientOriginalExtension();
            $newFile = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('file_req')->storeAs('file_req', $newFile);
        }

        $request['image'] = $newImage;
        $request['file'] = $newFile;
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        if ($user) {
            Session::flash('status', 'Success');
            Session::flash('message', 'Register Success');
        }

        return redirect('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
