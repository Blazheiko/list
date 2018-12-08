<?php

namespace App\Events;

use App\Models\Todolist;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class onAddTaskEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

//    public $user_name;
//    public $user_email;
   public $task;
   public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Todolist $task, User $user)
    {
//        $this -> user_name = $user -> name;
//        $this -> user_email = $user -> email;
      $this -> task = $task;
      $this -> user = $user ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
