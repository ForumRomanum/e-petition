<?php

namespace App\Http\Controllers;


use App\Models\Petition;

class HomeController extends Controller
{
    public function index()
    {
        $lastPetitions = Petition::query()
            ->where('is_public', true)
            ->select(['id', 'name', 'goal', 'user_id'])
            ->with(['user' => function ($user) {
                $user->select(['id', 'first_name', 'last_name']);
            }])
            ->withCount('signs')
            ->orderBy('id', 'desc')
            ->limit(20)
            ->get();

        flash()->success(' Successfully updated device ')->overlay();
        return view('pages.home', [
            'lastPetitions' => $lastPetitions,
        ]);
    }
}
