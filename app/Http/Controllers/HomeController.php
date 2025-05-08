<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware auth diterapkan pada method index, tapi tidak pada showRegistrationSuccess
        $this->middleware('auth')->only('index');
         // $this->middleware('guest')->only('showRegistrationSuccess'); // Opsional: Hanya tamu bisa lihat halaman ini
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Pastikan user sudah login sebelum sampai sini (dilindungi middleware)
        $user = Auth::user(); // Ambil data user yang sedang login

        return view('home', compact('user'));
    }

    public function showRegistrationSuccess(Request $request)
    {
        // Cek apakah redirect ini berasal dari proses registrasi yang sukses
        // Kita mengecek data di flash session
        if ($request->session()->has('registration_success')) {
             // Ambil data dari flash session
             $name = $request->session()->get('registered_user_name');
             $email = $request->session()->get('registered_user_email');

            return view('auth.register-success', compact('name', 'email'));
        }

        // Jika tidak ada data sukses registrasi di session, redirect ke halaman register
        return redirect()->route('register');
    }
}
