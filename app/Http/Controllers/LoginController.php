<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return redirect('/');
            } else {
                return redirect('/user');
            }
        } else {
            return view('login', ['title' => 'Login']);
        }
    }

    public function tambahlogin(Request $request)
    {
        $validatedData =
            $request->validate([
                'nama' => 'required',
                'username' => 'required|string|unique:registers',
                'password' => 'required|min:8|confirmed',
            ], [
                'nama.required' => 'harus mengisi nama lengkap',
                'username.required' => 'harus mengisi username',
                'username.string' => 'username wajib diisi string',
                'username.unique' => 'username ini sudah dibuat',
                'password.required' => 'harus mengisi password',
                'password.min' => 'Password min. 8 karakter',
                'password.confirmed' => 'Password harus sama dengan Konfirmasi Password'
            ]);

        $validatedData['nama'] = $validatedData['nama'];
        $validatedData['username'] = $validatedData['username'];
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['hak_akses'] = 'user';
        Register::create($validatedData);

        return redirect('register')->with('message', 'User created successfully');
    }

    public function register()
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return redirect('/');
            } else {
                return redirect('/user');
            }
        } else {
            return view('register', ['title' => 'Register']);
        }
    }

    public function login(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->hak_akses == "admin") {
                return redirect('/');
            } else {
                return redirect('/user');
            }
        } else {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:8'
            ], [
                'username.required' => 'harus mengisi username',
                'username.string' => 'username wajib diisi string',
                'password.required' => 'harus mengisi password',
                'password.min' => 'Password min. 8 karakter'
            ]);

            $registers = $request->only('username', 'password');
            if (Auth::attempt($registers)) {
                $register = Auth::user();
                if ($register->hak_akses == 'admin') {
                    return redirect('/');
                } elseif ($register->hak_akses == 'user') {
                    return redirect('/user');
                } else {
                    return redirect('login')->with('message', 'Gagal Login');
                }
            } else {
                return redirect('login')->with('message', 'Username atau password salah');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
