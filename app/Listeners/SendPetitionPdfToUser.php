<?php

namespace App\Listeners;

use App\Events\PetitionPdfGenerated;
use Illuminate\Support\Facades\Mail;

class SendPetitionPdfToUser
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
     * @param PetitionPdfGenerated $event
     * @return void
     */
    public function handle(PetitionPdfGenerated $event)
    {
        $petition = $event->getPetition();
        $path = $event->getPath();

        $signs = 'name,email' . PHP_EOL;
        foreach ($petition->signs as $sign) {
            $line = $sign->full_name . ',' . $sign->email . PHP_EOL;
            $signs .= $line;
        }
        Mail::send('mail.petition-pdf', [
            'name' => trim($petition->name),
        ], function ($message) use ($petition, $path, $signs) {
            $message->to($petition->user->email)
                ->subject(__('account.petition-pdf'));
            $message->attach($path);
            $message->attachData($signs, 'signs.csv', []);
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });
    }
}
