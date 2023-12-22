<?php
include '../connection.php';
session_start();

$user_email = $_POST["email"];
$token = $_POST["token"];
$token = mysqli_real_escape_string($conn, $token);

$sql = "SELECT * FROM user_token WHERE user_token = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $token);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) === 0) {
    die("Token not found");
}

$row = mysqli_fetch_assoc($result);
if (strtotime($row["user_token_expire"]) <= time()) {
    die("Token has expired");
} else {
    echo "Token is valid";
    if (isset($_POST['new_password_btn'])) {
        $new_password = trim(htmlentities($_POST['new_password'], ENT_QUOTES, 'UTF-8'));
        $c_new_password = trim(htmlentities($_POST['confirm_new_password'], ENT_QUOTES, 'UTF-8'));

        if ($new_password == $c_new_password) { 
            $hash_new_pass = password_hash($new_password, PASSWORD_DEFAULT);

            $update_pass = "UPDATE `users` SET `password`=? WHERE email = ?";
            $stmt = mysqli_prepare($conn, $update_pass);
            mysqli_stmt_bind_param($stmt, "ss", $hash_new_pass, $user_email);
            $execute = mysqli_stmt_execute($stmt);

            if ($execute) {
            $_SESSION['updated_password'] = "Yout password updated succeeefully";
            header("location: ../../templates/login.php");
            } else {
                echo '<script> alert("Error in updation") </script>';
            }
        } else {
            echo '<script> alert("Password do not match") </script>';
        }
    }
}
?>
