<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $task_title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$task_title)
    {
        $this ->name = $name;
        $this ->task_title = $task_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mailAddTask')
            ->with(['name'=> $this ->name,
                    'task_title'=>$this ->task_title
            ])
            ->subject('Создание нового задания');
    }
}
