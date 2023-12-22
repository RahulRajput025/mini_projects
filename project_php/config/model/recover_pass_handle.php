<?php session_start();
include '../connection.php' ?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc9...
?>

<?php
if (isset($_POST['recover_password_btn'])) {
    $user_email = $_POST['recover_password_email'];
    $recovery_email = $_POST['recover_password_email'];
    $token = bin2hex(random_bytes(8));
    $token_hash = hash("sha256", $token);
    $expire_token = date("Y-m-d H:i:s", time() + 60 * 30);

    $insert_token = "INSERT INTO `user_token`(`user_email`, `user_token`, `user_token_expire`) VALUES ('$user_email','$token_hash','$expire_token')";
    $execute = mysqli_query($conn, $insert_token);
    if ($execute) {
        echo "A link has been sent to your email. Go, check and reset your password";
    } else {
        echo "error";
    }

    //Required files to send mail using PHPMailer
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/SMTP.php';

    //Email content
    $to = $user_email;
    $subject = "Password Recovery Email";
    $message = <<<END
    Click <a href="http://localhost/project%20php/templates/new_password.php?token=$token_hash&email=$user_email">here to reset your password</a>
    END;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rahul.mind2web@gmail.com';
        $mail->Password = 'vkheziycudirssai';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom("noreply@gmail.com");
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        //for success message

    } catch (Exception $e) {
        echo "email sending failed. Error: " . $mail->ErrorInfo;
    }
}
?>