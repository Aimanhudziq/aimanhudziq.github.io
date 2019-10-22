<?php

namespace App\Mail;
//namespace Illuminate\View\Engines;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(\Request $req)
    {
        $first_name = $this->user['first_name'];
        $password = $this->user['password'];
        return $this->view('users.email_generatePassword')
        ->with(['first_name'=>$first_name, 'password'=>$password]);
        
    }
}
