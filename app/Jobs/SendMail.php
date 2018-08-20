<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Services\Mailer;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $title;
    protected $body;
    protected $mailer;
    public $tries = 3;

    public function __construct($email, $title, $body)
    {
        $this->email = $email;
        $this->title = $title;
        $this->body = $body;
        $this->mailer = app(Mailer::class);
    }

    public function handle()
    {
        $this->mailer->send($this->email, $this->title, $this->body);
    }

    public static function send($email, $title, $body)
    {
        return static::dispatch($email, $title, $body);
    }
}
