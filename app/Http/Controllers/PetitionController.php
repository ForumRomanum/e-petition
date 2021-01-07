<?php

namespace App\Http\Controllers;


use App\Http\Requests\PetitionRequest;
use App\Http\Requests\SignRequest;
use App\Models\Petition;
use App\Models\Sign;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->select(['id', 'name', 'goal'])
            ->withCount('signs')
            ->orderBy('id', 'desc')
            ->paginate(20, ['petitions.*'], 'page', $page)
            ->withQueryString();

        return view('pages.petitions', [
            'searchPhrase' => $phrase,
            'results' => $data
        ]);
    }

    public function show(int $id)
    {
        $petition = Petition::where([
            ['id', $id],
            ['is_public', true]
        ])->with(['user' => function ($user) {
            $user->select(['id', 'first_name', 'last_name']);
        }])->withCount('signs')->first();

        return view('pages.single-petition', [
            'petition' => $petition
        ]);
    }

    public function create(PetitionRequest $request): RedirectResponse
    {
        $petition = new Petition([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'type' => (int)$request->get('type'),
            'goal' => (int)$request->get('goal')
        ]);

        $petition->is_public = (bool)(int)$request->get('is_public');
        $petition->user_id = Auth::id();
        $petition->save();
        if ($petition->is_public) {
            return redirect()->route('single-petition', ['id' => $petition->id]);
        }
        return redirect()->route('my-petition', ['id' => $petition->id]);
    }
}
