<?php

namespace App\Notifications;

use App\Models\Todolist;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendCreateTask extends Notification
{
    use Queueable;

//    public $user_name;
//    public $user_email;
    public $task;
    public $user;


    /**
     *
     *
     * @return void
     */

    public function __construct(Todolist $task, User $user)
    {
//        $this -> user_name = $user -> name;
//        $this -> user_email = $user -> email;
        $this -> task = $task ;
        $this -> user = $user ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
//        return (new MailMessage)->view(
//            'mails.mailAddTask', ['task_title' => $this->task->title,'name' =>$this ->user->name,]
//        );

        return (new MailMessage)
                    ->line('Тестовое сообщение')
                    ->action('Перейти на домашнюю страницу', url('/home'))
                    ->line('Добавлена новая запись')
                    ->line('Спасибо за внимание  ');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return ['name'=>$this->user->name,
            //
        ];
    }
}
