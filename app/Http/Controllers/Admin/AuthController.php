<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'ព័ត៌មានចូលប្រើប្រាស់មិនត្រឹមត្រូវ។'])->withInput();
        }

        $user = Auth::user();

        if (!$user->isAdmin()) {
            Auth::logout();
            return back()->withErrors(['email' => 'អ្នកមិនមានសិទ្ធិចូលប្រើប្រព័ន្ធ Admin។'])->withInput();
        }

        if (!$user->is_active) {
            Auth::logout();
            return back()->withErrors(['email' => 'គណនីនេះត្រូវបានបិទ។ សូមទំនាក់ទំនង Super Admin។'])->withInput();
        }

        $request->session()->regenerate();

        $user->update(['last_login_at' => now()]);
        ActivityLog::log('login', "Logged in from {$request->ip()}");

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        ActivityLog::log('logout', 'Logged out');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
