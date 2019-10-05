<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use App\BankAssignmentList;
//use App\User;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $info;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(\Request $req)
    {
        $bank_code = $this->info['bank_code'];
        $first_name = $this->info['first_name'];

        return $this->view('users.email_notification')
          ->with(['bank_code'=>$bank_code,'first_name'=>$first_name]);
    }
}
