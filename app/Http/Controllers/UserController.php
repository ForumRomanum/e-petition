<?php

namespace App\Http\Controllers;


use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myAccount(Request $request)
    {
        return view('pages.account.account', []);
    }

    public function myPetitions(Request $request)
    {
        $page = $request->get('page', 1);
        $data = $this->getMyPetitions($page, true);

        return view('pages.account.my-petitions', [
            'results' => $data,
            'isWorkingCopy' => false
        ]);
    }

    public function myWorkingCopies(Request $request)
    {
        $page = $request->get('page', 1);
        $data = $this->getMyPetitions($page, false);

        return view('pages.account.my-petitions', [
            'results' => $data,
            'isWorkingCopy' => true
        ]);
    }

    private function getMyPetitions($page, $public)
    {
        return Auth::user()->petitions()
            ->where('is_public', $public)
            ->select(['id', 'name', 'goal'])
            ->withCount('signs')
            ->orderBy('id', 'desc')
            ->paginate(20, ['petitions.*'], 'page', $page)
            ->withQueryString();
    }

    public function myPetitionSigns(int $id)
    {
        $petition = Petition::where('id', $id)
            ->select(['id', 'name', 'goal'])
            ->withCount('signs')
            ->with('signs')
            ->first();

        return view('pages.account.user-petition-signs', [
            'petition' => $petition,
        ]);
    }
}
