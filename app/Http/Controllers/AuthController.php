<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Página de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Página de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Registrar novo usuário
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }

    // Processar login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);

            // dd(session('user')); // Depuração para verificar se a sessão foi criada

            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Email ou senha incorretos.');
        }
    }

    // Página protegida (Dashboard)
    public function dashboard()
    {
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado.');
        }

        return view('auth.dashboard', ['user' => session('user')]);
    }

    // Logout do usuário
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login')->with('success', 'Logout realizado com sucesso.');
    }
}
