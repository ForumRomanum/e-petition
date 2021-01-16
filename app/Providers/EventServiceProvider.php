<?php

namespace App\Providers;

use App\Events\PetitionPdfGenerated;
use App\Events\SignCreated;
use App\Listeners\SendPetitionPdfToUser;
use App\Listeners\SendSignCreatedEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SignCreated::class => [
            SendSignCreatedEmail::class
        ],
        PetitionPdfGenerated::class => [
            SendPetitionPdfToUser::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
