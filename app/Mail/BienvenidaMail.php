<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class BienvenidaMail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;
    public $subject = "Bienvenido";

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('mails.bienvenido')
        ->with([
            'user' => $this->user,
        ]);;
    }
}
