<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function send_mail($subject, $body, $attachment = "")
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mail@from.com';                     // SMTP username
    $mail->Password   = 'password';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mail@from.com', 'from guy');

    $mail->addAddress("to@gmail.com", "to guy");     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('mail_for@CC.com');

    // Attachments
    if ($attachment){
        $mail->addAttachment($attachment['tmp_name'], $attachment["name"]);         // Add attachments
    }
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!$mail->send()) {
		throw new Exception("Mailer Error: " . $mail->ErrorInfo);
    } else {
        echo 'Mail Sent Successfully';
    }
}
