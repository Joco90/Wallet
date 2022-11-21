<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPasswordDefault extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $motdepass;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$email,$password)
    {
        //
        $this->data=$user;
        $this->email=$email;
        $this->motdepass=$password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gompewojoel@gmail.com')
                    ->subject('Votre mot de passe par defaut')
                    ->view('emails.sendmail');
    }
}
