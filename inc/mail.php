<?php
require 'phpmailer/vendor/autoload.php';
function sendMail($email, $sender, $subject, $body)
{
  $mail = new PHPMailer;
  //$mail->SMTPDebug = 3;

  $mail->isSMTP();  // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify mailgun SMTP servers
  $mail->SMTPAuth = true; // Enable SMTP authentication
  $mail->Username = 'joserafaeldn@gmail.com'; // SMTP username from https://mailgun.com/cp/domains
  $mail->Password = base64_decode("Ym5yMzRnb3N1cHJhMTc="); // SMTP password from https://mailgun.com/cp/domains
  $mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'
  $mail->CharSet = "UTF-8";

  $mail->From = 'joserafaeldn@gmail.com'; // The FROM field, the address sending the email
  $mail->FromName = $sender; // The NAME field which will be displayed on arrival by the email client
  $mail->addAddress($email, "");     // Recipient's email address and optionally a name to identify him
  $mail->isHTML(true);   // Set email to be sent as HTML, if you are planning on sending plain text email just set it to false

  // The following is self explanatory
  $mail->Subject = $subject;
  $mail->Body    = $body;
  $mail->AltBody = "Your email doesn't support HTML.";

  if(!$mail->send()) {
      return $mail->ErrorInfo;
  } else {
      return true;
  }
}
?>
