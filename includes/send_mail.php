<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$name = "manish";
$email = "manish@afinoz.com";
$subject = "LOL";
$body = "WhatEver it takes";
$attachment = "";

$mail->SMTPDebug = 0;                                       // Enable verbose debug output
$mail->isSMTP();                                            // Set mailer to use SMTP
$mail->Host       = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'info@vinra.co.in';                     // SMTP username
$mail->Password   = 'password';                               // SMTP password
$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
$mail->Port       = 465;                                    // TCP port to connect to

//Recipients
$mail->setFrom('info@vinra.co.in', 'vinra');

$mail->addAddress( $email, $name);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// Attachments
if($attachment)
    $mail->addAttachment($attachment);         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $body;

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo 'Mail Sent Successfully';
}
