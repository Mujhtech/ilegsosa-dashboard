<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TestAmazonSes extends Mailable
{
    use Queueable, SerializesModels;


    public $content;
    public $name;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $name, $subject)
    {
        //
        $this->content = $content;
        $this->name = $name;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@ilegsosa.org', 'Ilesa Grammar School Alumnus')->subject($this->subject)->view('emails.template');
    }
}
