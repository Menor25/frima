<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require('vendor/autoload.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true); //Create a new instance of the mailer
    $mail->isSMTP(); //Telling php we re using SMTP server
    $mail->SMTPAuth = true; //Set the authentication for smtp to true

    $mail->Host = "smtp.example.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Your SMTP server login details
    $mail->Username = "youemail@example.com";
    $mail->Password = 'password';

    $mail->setForm($email, $name);
    $mail->addAddress("frima@example.com", "Dave");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    echo "Email sent";