<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $team;
    private $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$team, $comment)
    {
        $this->user = $user;
        $this->team = $team;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.comment-received')
            ->with([
                'comment' => $this->comment,
                'team' => $this->team,
            ])
            ->subject('Comment recieved')
            ->from($this->user);
    }
}
