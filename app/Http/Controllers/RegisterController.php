<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Events\UserCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;



class RegisterController extends Controller
{
    public function index()
    {
        return view('Account.registration', [
            'title' => 'Registration',
            'active' => 'registration',
            'users' => User::all()
        ]);
    }

    public function regist(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Nama Wajib Di isi',
                'email.required' => 'Email Wajib Di isi',
                'password.required' => 'Password Wajib Di isi'
            ]
        );
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($data);
        event(new UserCreated($user));
        return redirect('/account')->with('success', 'Akun Telah Di Tambah');
    }
}