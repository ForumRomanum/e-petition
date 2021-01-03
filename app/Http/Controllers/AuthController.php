<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $returnTo = $request->get('return-to');
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return $returnTo
                ? redirect($returnTo)
                : redirect()->route('main-page');
        }
        return view('pages.auth.login', [
            'errors' => [
                'Błędny login lub hasło. Spróbuj ponownie'
            ]
        ]);
    }

    public function register(Request $request)
    {
        $returnTo = $request->get('return-to');
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();
        return $returnTo
            ? redirect()->route('login', ['return-to' => $returnTo])
            : redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main-page');
    }
}
