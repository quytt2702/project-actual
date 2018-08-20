<?php

namespace App\Services;

use Log;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

use App\Repositories\Contracts\Admin\CaiDatRepository;
use App\Entities\Admin\CaiDat;

class Mailer
{
    public function send($to, $subject, $body)
    {
        // $from = 'skyfoodresponse@gmail.com';
        // $pass = 'nacszhqgtjdrxmoi';

        // $from = 'tiencmu@gmail.com';
        // $pass = 'tubnluikjmbdquas';

        // mixmilk.vn@gmail.com
        // mixmilk.vn@gmail.com

        $caiDat = CaiDat::first();

        $from = $caiDat->email;
        $pass = $caiDat->email_password;

        $mail = new PHPMailer(true); // Passing `true` enables exceptions

        try {
            // Server settings
            // $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = $from; // SMTP username
            $mail->Password = $pass; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom($from, config('app.name'));
            // $mail->addAddress('joe@example.net', 'Joe User'); // Add a recipient
            $mail->addAddress($to); // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            Log::info('Mail sent');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            Log::info('Mail not sent');
        }
    }
}
