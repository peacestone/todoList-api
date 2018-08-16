<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoteAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($note, $task)
    {
        $this->note = $note;
        $this->task = $task;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        echo $this->note->img_url;
        return $this->subject('Note added for task id#' . $this->task->id)
        ->view('emails.noteAdded', [
            'taskId' => $this->task->id,
            'taskDueDate' => $this->task->dueDate,
            'taskDescription' => $this->task->content,
            'noteId' => $this->note->id,
            'noteContent' => $this->note->content,
            'img_url' => $this->note->img_url
        ]);
    }
}
