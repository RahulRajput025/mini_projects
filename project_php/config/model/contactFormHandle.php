<?php
include '../connection.php';


// Required files to send mail using PHPMailer
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer-master/src/PHPMailer.php';
// require './PHPMailer-master/src/Exception.php';
// require './PHPMailer-master/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $username = trim(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
    if (empty($username)) {
        $errors["username"] = "Username is required.";
    }
    $email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $textarea = trim(htmlentities($_POST['textarea'], ENT_QUOTES, 'UTF-8'));
    if (empty($textarea)) {
        $errors["textarea"] = "please fill this area.";
    }
    if (empty($errors)) {
        // php script to save signup details
        $sql = "SELECT * FROM `contactUs`";
        $query = "INSERT INTO `contactUs`( `name`, `email`, `textarea`) VALUES ('$username','$email','$textarea')";
        $execute = mysqli_query($conn, $query);
    } else {
        echo '<script> errorMessageContact()</script>';
    }

    // Email content
    // $to = "rahuldadwal1122@gmail.com";
    // $subject = "Message from contact us form";
    // $message = "users details:\n\n";
    // $message .= "Username: $username\n\n";
    // $message .= "Email: $email\n\n";
    // $message .= "Message: $textarea\n\n";

    // $mail = new PHPMailer(true);

    // try {
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'rahul.mind2web@gmail.com';
    //     $mail->Password = 'vkheziycudirssai';
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     $mail->Port = 465;

    //     $mail->setFrom($email, $username);
    //     $mail->addAddress($to, 'Rahul Rajput');

    //     $mail->Subject = $subject;
    //     $mail->Body = $message;
    //     $mail->send();
    // for success message
    session_start();
    $_SESSION['contact_success_message'] = "Your Information has been received";

    // } catch (Exception $e) {
    //     echo "email sending failed. Error: " . $mail->ErrorInfo;
    // }
}
header("location: ../../templates/contact.php");
?>