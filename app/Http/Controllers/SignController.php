<?php

namespace App\Http\Controllers;


use App\Http\Requests\SignRequest;
use App\Models\Sign;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SignController extends Controller
{
    public function sign(SignRequest $request, int $id): RedirectResponse
    {
        if (Sign::where([
            ['email', $request->get('email')],
            ['id', $id]
        ])->first()) {
            return redirect()->route('single-petition', ['id' => $id])->withErrors([]);
        }
        $sign = new Sign([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'notify' => (bool)$request->get('notify'),
        ]);

        $sign->petition_id = $id;
        $sign->save();

        return redirect()->route('single-petition', ['id' => $id]);
    }

    public function confirmSignature(Request $request, string $token): RedirectResponse
    {
        /** @var Sign $sign */
        $sign = Sign::where('confirm_token', $token)->first();

        if (!$sign) {
            return redirect()->route('main-page');
        }

        $sign->confirm_token = null;
        $sign->confirmed_at = now();
        $sign->save();

        return redirect()->route('single-petition', ['id' => $sign->petition_id]);
    }
}
