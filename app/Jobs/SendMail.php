<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Swift_SmtpTransport;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $transport = (new Swift_SmtpTransport('imap.exmail.qq.com', 143))
            ->setUsername($this->data['name'])
            ->setPassword($this->data['password']);


        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message($this->data['title']))
            ->setFrom($this->data['user'])
            ->setCc($this->data['cc'])
            ->setTo($this->data['to'])
            ->setReplyTo($this->data['replyTo'])
            ->setBody($this->data['content']);

         return $mailer->send($message);

    }
}
