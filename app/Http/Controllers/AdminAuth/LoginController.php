<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Menampilkan form login
    public function create()
    {
        return view('admin.auth.login');
    }

    // Memproses login
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        // Gunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/orders'); // Redirect ke halaman order admin
        }

        throw ValidationException::withMessages([
            'username' => __('auth.failed'),
        ]);
    }

    // Proses logout
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}