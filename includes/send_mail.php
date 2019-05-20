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
    $mail->Host       = 'smtp.rediffmailpro.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@vinra.co.in';                     // SMTP username
    $mail->Password   = 'Vinra@2019';                               // SMTP password
    $mail->SMTPSecure = 'Tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@vinra.co.in', 'Vinra-Mailer');

    $mail->addAddress("info@vinra.co.in", "Gopal Kumar");     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('yourmanish_123@yahoo.com');
    $mail->addBCC('raiabhinavrai1994@gmail.com');

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
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        echo 'Mail Sent Successfully';
        return true;
    }
}
