<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | LOGIN ADMIN
        |--------------------------------------------------------------------------
        */
        if ($request->role === 'admin') {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin',
            ])) {
                return back()->withErrors([
                    'email' => 'Email atau password admin salah',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN MAHASISWA (NIM + EMAIL)
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'nim' => 'required',
            'email_mahasiswa' => 'required|email',
        ]);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)
            ->where('email', $request->email_mahasiswa)
            ->first();

        if (!$mahasiswa) {
            return back()->withErrors([
                'nim' => 'NIM dan Email tidak cocok',
            ]);
        }

        if (!$mahasiswa->user) {
            return back()->withErrors([
                'nim' => 'Akun ini belum terhubung dengan user',
            ]);
        }

        // LOGINKAN USER MAHASISWA KE LARAVEL
        Auth::login($mahasiswa->user);
        $request->session()->regenerate();

        return redirect()->route('mahasiswa.index');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * REGISTER HANYA UNTUK ADMIN
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($user);

        return redirect()->route('admin.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
