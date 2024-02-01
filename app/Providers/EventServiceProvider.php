<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Auth;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
{
    parent::boot();

    Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
        $event->menu->add([
            'text' => 'Profile',
            'url' => route('user.profile', Auth::user()->id),
            'icon' => 'fas fa-user',
            'active' => ['profile*'],

           
        ]);
    });
}
}
