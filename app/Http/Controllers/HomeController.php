<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return view('home', ['title' => 'Home']);
            } else if (Auth::user()->hak_akses == "user") {
                return redirect('/user');
            }
        } else {
            return redirect('login');
        }
    }

    public function form()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return view('form', ['title' => 'Tambah Data']);
            } else if (Auth::user()->hak_akses == "user") {
                return redirect('/user');
            }
        } else {
            return redirect('login');
        }
    }

    public function user()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return redirect('/');
            } else if (Auth::user()->hak_akses == "user") {
                return view('user', ['title' => 'Home']);
            }
        } else {
            return redirect('login');
        }
    }

    public function changepassword()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return view('changepassword', ['title' => 'Ubah Password']);
            } else {
                return view('changepassword', ['title' => 'Ubah Password']);
            }
        } else {
            return redirect('login');
        }
    }

    public function prosesubahpassword(Request $request, $id)
    {
        $request->validate([
            'password1' => 'required|min:8',
            'password' => 'required|min:8|same:password_confirmed',
            'password_confirmed' => 'required|min:8',
        ], [
            'password1.required' => 'harus mengisi password',
            'password1.min' => 'Password min. 8 karakter',
            'password.required' => 'harus mengisi password',
            'password.min' => 'Password min. 8 karakter',
            'password.same' => ' Password baru harus sama dengan Konfirmasi Password',
            'password_confirmed.required' => 'harus mengisi password',
            'password_confirmed.min' => 'Password min. 8 karakter',
        ]);


        $old_password = request('password1');
        $new_password = User::select('id', 'password')->whereId($id)->firstOrFail();

        if (!Hash::check($old_password, $new_password->password)) {
            return redirect()->back()->withErrors(['password1' => 'Password lama anda tidak cocok']);
        } elseif (strcmp($old_password, request('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->withErrors(['password' => 'Kata Sandi Baru tidak boleh sama dengan kata sandi Anda saat ini.']);
        } elseif (Hash::check($old_password, $new_password->password)) {
            $new_password->update(['password' => Hash::make(request('password'))]);
            return redirect()->back()->with('message', 'Berhasil di ubah password');
        }
    }
}
