<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiPetitionController extends Controller
{
    public function getSignsInfo(Request $request): Response
    {
        $ids = explode(',', $request->get('ids', ''));
        if (!count($ids)) {
            return response([]);
        }
        $data = Petition::query()->whereIn('id', $ids)
            ->where('is_public', true)
            ->select(['id', 'goal'])
            ->withCount('signs')
            ->get()
            ->map(function ($item, $key) {
                return [
                    'id' => $item->id,
                    'signs_count' => $item->formatted_signs_count,
                    'signs_percent' => $item->signs_percent,
                ];
            });

        return response($data);
    }
}
