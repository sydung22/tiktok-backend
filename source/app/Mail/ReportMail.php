<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $description, $video_id, $user)
    {
        //
        $this->title = $title;
        $this->description = $description;
        $this->user = $user;
        $this->video_id = $video_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.report')->with([
            'user' => $this->user,
            'title' => $this->title,
            'description' => $this->description,
            'video_id' => $this->video_id
        ]);
    }
}
