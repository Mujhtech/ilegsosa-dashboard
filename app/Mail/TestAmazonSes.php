<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;


class TestAmazonSes extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;


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
        $to = Arr::get($this->to, '0.address');

        return $this->from('app@ilegsosa.org', 'Ilesa Grammar School Alumnus')->view('emails.template')->mailersend(

            null,
            [
                new Variable($to, ['name' => $this->name, 'content' => $this->content]),
            ],
            ['tag']);
    }
}
