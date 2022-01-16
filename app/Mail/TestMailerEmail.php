<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\LaravelDriver\MailerSendTrait;

class TestMailerEmail extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;

    public $content;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $content)
    {
        //
        $this->name = $name;
        $this->content = $content;
    }

    public function build()
    {
        $to = Arr::get($this->to, '0.address');

        return $this->view('emails.test_html')
            ->text('emails.test_text')
            ->mailersend(
                // Template ID
                null,
                // Variables for simple personalization
                [
                    new Variable($to, ['name' => 'Your Name'])
                ],
                // Tags
                ['tag'],
            );
    }
}