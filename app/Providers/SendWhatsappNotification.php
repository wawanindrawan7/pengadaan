<?php

namespace App\Providers;

use App\Http\Controllers\WAServices;
use App\Providers\Whatsapp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWhatsappNotification
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
     * @param  Whatsapp  $event
     * @return void
     */
    public function handle(Whatsapp $event)
    {
        $wa = new WAServices();
        $wa->send($event->to, $event->message);
    }
}
