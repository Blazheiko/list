<?php

namespace App\Listeners;

use App\Events\onAddTaskEvent;
use App\Mail\MailClass;
use App\Notifications\SendCreateTask;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class onAddTaskListener
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
     * @param  onAddTaskEvent  $event
     * @return void
     */
    public function handle(onAddTaskEvent $event)
    {
        $event ->user->notify(new SendCreateTask($event->task,$event->user));

        //Mail::to($event->user_email)->send(new MailClass($event-> user_name, $event-> task_title));
    }
}
