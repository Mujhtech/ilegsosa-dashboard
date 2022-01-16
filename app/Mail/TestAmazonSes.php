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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $name)
    {
        //
        $this->content = $content;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('app@ilegsosa.org', 'Ilesa Grammar School Alumnus')->view('email.template');
    }
}
