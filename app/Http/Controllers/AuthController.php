<?php

namespace App\Http\Controllers;


use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where([
            'email' => $request->get('email'),
            'is_active' => true
        ])->first();
        if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $_SESSION['api_token'] = $user->api_token;
        }
        return redirect()->route('main-page');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
        ]);

        $generateRandomString = Str::random(60);

        $token = Hash::make($generateRandomString);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->api_token = $token;

        $user->save();

    }

    public function search(Request $request)
    {
        $phrase = $request->get('phrase');

        $data = Petition::query()
            ->where(function ($q) use ($phrase) {
                $q->where('name', 'like', "%$phrase%")
                    ->orWhere('description_plain', 'like', "%$phrase%");
            })
            ->where('is_public', true)
            ->get();

        return view('pages.search', [
            'searchPhrase' => $phrase,
            'results' => $data
        ]);
    }

}
