<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailAdapter extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $view;
    public $info;
    public $subject;
    public $from;

    public function __construct($subject, $view, $info)
    {
        $this->view = $view;
        $this->info = $info;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->from('quoclongdng@gmail.com')->view($this->view)->with($this->info);
    }
}
