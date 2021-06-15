<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Pueba de mail";

    protected $user;
    protected $numero;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $numero)
    {
        $this->user = $user;
        $this->numero = $numero;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('mails.prueba')
        ->with([
            'name' => $this->user->name,
            'numero' => $this->numero,
        ]);
    }
}
