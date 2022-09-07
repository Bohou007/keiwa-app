<?php

namespace App\Mail;

use App\Models\Forms;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Forms
     */
    public $form;

    /**
     * Create a new message instance.
     *@param  \App\Models\Forms  $Forms
     * @return void
     */
    public function __construct(Forms $form)
    {
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplay@agillycloud.com')->subject('Mail from ItSolutionStuff.com')->view('email.index');
    }
}