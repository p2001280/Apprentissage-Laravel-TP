<?php

namespace App\Listeners;

use Illuminate\Contracts\Mail\Mailer;
use App\Events\ContactRequestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Listeners\ContactListener;
use App\Mail\PropertyContactMail;


class ContactListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestEvent $event): void
    {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
}
