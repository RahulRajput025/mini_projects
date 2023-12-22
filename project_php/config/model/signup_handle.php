<?php
session_start();

include '../connection.php';
// print_r($_POST);
// exit();
// Required files to send mail using PHPMailer
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer-master/src/PHPMailer.php';
// require './PHPMailer-master/src/Exception.php';
// require './PHPMailer-master/src/SMTP.php';

include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim(htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'));
    $email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $password = trim(htmlentities($_POST['user_password'], ENT_QUOTES, 'UTF-8'));
    $cpassword = trim(htmlentities($_POST['confirm_password'], ENT_QUOTES, 'UTF-8'));
    $hash = trim(htmlentities(password_hash($password, PASSWORD_DEFAULT), ENT_QUOTES, 'UTF-8'));

    // Check if the email is already in the database
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Email is not unique, show an error message
        $_SESSION['sign_up_message'] = "Email already exists. Please use a different email.";
        header("location: ../../templates/signup.php");
        exit;
    } else {
        // Email is unique, proceed with the sign-up process
        $query = "INSERT INTO `users` (username, password, email, active_status, Role) VALUES ('$username', '$hash', '$email', 1 , 1 )";
        $execute = mysqli_query($conn, $query);

        if ($execute) {
            $_SESSION['sign_up_message'] = "Signup successful";
            header("location: ../../templates/login.php");
            exit;
        } else {
            echo "<script> alert('Error in signing up') </script>";
        }
    }
}








// Email content
// $to = "rahuldadwal1122@gmail.com";
// $subject = "New Signup";
// $message = "A new user has signed up with the following details:\n\n";
// $message .= "Username: $username\n\n";
// $message .= "Password: $password\n\n";

// $mail = new PHPMailer(true);

// try {
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'rahul.mind2web@gmail.com';
//     $mail->Password = 'vkheziycudirssai';
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//     $mail->Port = 465;

//     $mail->setFrom('rahul.mind2web@gmail.com', 'Rahul');
//     $mail->addAddress($to, 'Rahul Rajput');


//     $mail->Subject = $subject;
//     $mail->Body = $message;

//     $mail->send();

// for success message


// catch (Exception $e) {
//     echo "email sending failed. Error: " . $mail->ErrorInfo;
// }
// }


?>