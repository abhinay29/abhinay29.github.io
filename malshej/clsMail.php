<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$adminEmail = 'napster@tb.net';

function phpmailer($email, $subject, $body){

  $smtp_host = 'mail.binoclard.in';
  $smtp_user = 'info@binoclard.in';
  $smtp_pass = 'Napster#765#';
  $smtp_port = '25';
  $smtp_sender = 'Malshej Lake Camping';


  // Production

  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  // $mail->SMTPSecure = 'ssl';
  $mail->Host = $smtp_host;
  $mail->Port = $smtp_port;
  $mail->SMTPAuth = true;
  $mail->SMTPAutoTLS = true;
  $mail->Password = $smtp_pass;
  $mail->Username = $smtp_user;
  $mail->setFrom($smtp_user, $smtp_sender);
  $mail->addAddress($email);
  $mail->addReplyTo($smtp_user, $smtp_sender);
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $body;
  $send = $mail->send();
  return $send;

  // Production

  // For Local Testing

  // $mail = new PHPMailer(true);
  // $mail->isSMTP();
  // $mail->SMTPDebug = 0;
  // $mail->SMTPOptions = array(
  //   'ssl' => array(
  //       'verify_peer' => false,
  //       'verify_peer_name' => false,
  //       'allow_self_signed' => true
  //   )
  // );
  // $mail->Host = $smtp_host;
  // $mail->Port = $smtp_port;
  // $mail->setFrom($smtp_user, $smtp_sender);
  // $mail->addAddress($email);
  // $mail->addReplyTo($smtp_user, $smtp_sender);
  // $mail->isHTML(true);
  // $mail->Subject = $subject;
  // $mail->Body = $body;
  // $send = $mail->send();
  // return $send;

  // For Local Testing

}

class clsMail {

    function sendEnquiryForm($data = array()){

      global $adminEmail;

      $subject = "Booking Enquiry from {$data['name']}";

      $body = "Hello Admin,<br>
      <p>Book now enquiry details are following.</p>
      <table style='width: 400px;'>
        <tr><td style='width: 30%;'><strong>Name</strong></td><td>{$data['name']}</td></tr>
        <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
        <tr><td><strong>Phone</strong></td><td>{$data['phone']}</td></tr>
        <tr><td><strong>Message</strong></td><td>{$data['message']}</td></tr>
      </table>
      <br><br>
      Regards, <br>
      WebMaster
      Malshej Lake Camping
      ";

      $sendMail = phpmailer($adminEmail, $subject, $body);

      return $sendMail;

    }

    function contactForm($data = array()){

      global $adminEmail;

      $subject = "{$data['name']} want to contact.";

      $body = "Hello Admin,<br>
      <p>Contact form details from contact page are following.</p>
      <table style='width: 400px;'>
        <tr><td style='width: 30%;'><strong>Name</strong></td><td>{$data['name']}</td></tr>
        <tr><td><strong>Email</strong></td><td>{$data['email']}</td></tr>
        <tr><td><strong>Phone</strong></td><td>{$data['phone']}</td></tr>
        <tr><td><strong>Message</strong></td><td>{$data['message']}</td></tr>
      </table>
      <br><br>
      Regards, <br>
      WebMaster
      Malshej Lake Camping
      ";

      $sendMail = phpmailer($adminEmail, $subject, $body);

      return $sendMail;

    }

  } // clsMail

?>
