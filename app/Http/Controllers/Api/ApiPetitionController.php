<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Petition;
use Illuminate\Http\Request;

class ApiPetitionController extends Controller
{
    public function getSignsInfo(Request $request)
    {
        $ids = explode(',', $request->get('ids', ''));
        $data = Petition::query()->whereIn('id', $ids)
            ->where('is_public', true)
            ->select(['id', 'goal'])
            ->withCount('signs')
            ->get()
            ->map(function ($item, $key) {
                return [
                    'id' => $item->id,
                    'signs_count' => $item->signs_count,
                    'signs_percent' => $item->signs_percent,
                ];
            });

        return response($data);
    }

}
