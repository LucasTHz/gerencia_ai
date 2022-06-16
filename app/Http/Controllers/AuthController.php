<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Authenticate a user and redirect to the home page.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth('estudante')->attempt($credentials) || auth('professor')->attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('home')->with(
                'msg', 'Login realizado com sucesso!'
            );
        }
        
        return redirect('/login')->with(
            'error', 'Email ou senha inválidos.'
        );
    }
    /**
     * Return view for the login page.
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Logout a user and redirect to the home page.
     * @param Request $request
     */
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return to_route('home')->with(
            'msg', 'Logout realizado com sucesso!'
        );
    }
}
