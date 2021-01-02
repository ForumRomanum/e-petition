<?php

namespace App\Http\Controllers;


use App\Models\Petition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function search(Request $request)
    {
        $phrase = $request->get('phrase');
        $page = $request->get('page', 1);

        $data = Petition::query()
            ->where(function ($q) use ($phrase) {
                $q->where('name', 'like', "%$phrase%")
                    ->orWhere('description_plain', 'like', "%$phrase%");
            })
            ->where('is_public', true)
            ->select(['id', 'name', 'goal', 'user_id', 'description_plain'])
            ->with(['user' => function ($user) {
                $user->select(['id', 'first_name', 'last_name']);
            }])
            ->withCount('signs')
            ->orderBy('id', 'desc')
            ->paginate(20, ['petitions.*'], 'page', $page);

        return view('pages.search', [
            'searchPhrase' => $phrase,
            'results' => $data
        ]);
    }

}
