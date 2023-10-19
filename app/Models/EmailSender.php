<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
class EmailSender {
    static function sendEmail($recipient, $subject, $body){

    $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                       
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_USER;
            $mail->Password   = EMAIL_PASS;
            $mail->Port       = 465;
            $mail->SMTPSecure = "ssl";
        
            //Recipients
            $mail->setFrom(EMAIL_USER, APP_NAME);
            $mail->addAddress($recipient);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body; 
        
            $mail->send();
            echo 'Message has been sent';
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}