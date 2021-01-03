<?php

namespace App\Http\Controllers;


use App\Models\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    public function index(Request $request)
    {
        $phrase = strtolower($request->get('phrase', ''));
        $page = $request->get('page', 1);

        $data = Petition::query();
        if ($phrase) {
            $data->where(function ($q) use ($phrase) {
                $q->where('name', 'ilike', "%$phrase%")
                    ->orWhere('description_plain', 'ilike', "%$phrase%");
            });
        }
        $data = $data->where('is_public', true)
            ->select(['id', 'name', 'goal', 'user_id'])
            ->with(['user' => function ($user) {
                $user->select(['id', 'first_name', 'last_name']);
            }])
            ->withCount('signs')
            ->orderBy('id', 'desc')
            ->paginate(20, ['petitions.*'], 'page', $page)
            ->withQueryString();

        return view('pages.petitions', [
            'searchPhrase' => $phrase,
            'results' => $data
        ]);
    }

    public function show(Request $request, Petition $petition)
    {
        return view('pages.single-petition', [
            'data' => $petition
        ]);
    }

    public function create(Request $request)
    {

    }
}
