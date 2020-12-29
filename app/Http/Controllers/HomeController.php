<?php

namespace App\Http\Controllers;


use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
//        dd(Auth::user());
        return view('home.index');
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
