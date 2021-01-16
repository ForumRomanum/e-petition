<?php

namespace App\Listeners;

use App\Events\SignCreated;
use Illuminate\Support\Facades\Mail;

class SendSignCreatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param SignCreated $signCreated
     * @return void
     */
    public function handle(SignCreated $signCreated)
    {
        $sign = $signCreated->getSign();
        $tokenUrl = route('confirm-signature', ['token' => $sign->confirm_token]);

        Mail::send('mail.send-sign-token', [
            'name' => trim($sign->first_name . ' ' . $sign->last_name),
            'token_url' => $tokenUrl,
        ], function ($message) use ($sign) {
            $message->to($sign->email)
                ->subject(__('signs.sign_created'));
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });
    }
}
