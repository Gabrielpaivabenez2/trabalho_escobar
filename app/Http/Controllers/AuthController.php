<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // não esqueça de importar o model User
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostra a tela de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Credenciais inválidas.');
    }

    // Mostra o dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Mostra a tela de cadastro
    public function showRegister()
    {
        return view('auth.register'); // nova view de registro
    }

    // Processa o cadastro
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:6'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user); 

        return redirect()->route('dashboard')->with('success', 'Cadastro realizado com sucesso!');
    }
}
