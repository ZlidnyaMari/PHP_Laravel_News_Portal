<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginUpdateListener
{
    /**
     * Create the event Listener.
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
     * @param  object  $event
     * @return void
     */
    public function handle($event): void  //обработчик события, когда в event что то произошло он должен отрабатывать
    {
        if(isset($event->user) && $event->user instanceof User) {
            $event->user->last_login_at = CarbonImmutable::now();
            $event->user->save();
        }
    }
}
