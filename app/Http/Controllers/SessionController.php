<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    /**
     * Exibir a tela de registro.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Processar o registro do usuário.
     */
    public function register(Request $request)
    {
        // Log::info('Dados recebidos no registro:', $request->all());  🔥 Registra a requisição no log

        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Criar o usuário no banco de dados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // dd($request->all());  🔥 Exibe os dados recebidos na requisição

        // Autenticar o usuário automaticamente após o registro
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Exibir a tela de login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Processar o login do usuário.
     */
    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput();
    }

    /**
     * Exibir a dashboard (Apenas para usuários logados).
     */
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar essa página.');
        }

        return view('auth.dashboard'); // Certifique-se de que a view `dashboard.blade.php` existe.
    }

    /**
     * Realizar logout do usuário.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Você saiu do sistema.');
    }
}
