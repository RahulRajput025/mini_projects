<?php
// CONNECTION
include '../connection.php';

// SESSION
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim(htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'));
    $password = trim($_POST['user_password']);

    // query for login
    $sql = "SELECT id, password, username, active_status, Role FROM `users` WHERE username='$username' ";
    $query = mysqli_query($conn, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        $hash_password = $user['password'];

        // Check if the user is active (active_status is 1)
        if ($user['active_status'] == 1) {
            if (password_verify($password, $hash_password)) {
                $_SESSION['login_success'] = "Login successful. Now complete your profile to move forward.";
                $_SESSION['name'] = $username;
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // For the "remember me" functionality
                if (isset($_POST['remember_me'])) {
                    setcookie('username', $_POST['username'], time() + (60 * 60 * 24));
                    setcookie('password', $_POST['user_password'], time() + (60 * 60 * 24));
                } else {
                    setcookie('username', '', time() - (60 * 60 * 24));
                    setcookie('password', '', time() - (60 * 60 * 24));
                }


                // for role based message
                if($user['Role'] == 0){
                    $_SESSION['admin_message'] = " (You are assigned as Admin)";
                }

                // Redirect to the update profile page on success
                header("location: ../../templates/update.php");
            } else {
                // Error message for incorrect password
                $_SESSION['login_failed'] = "Wrong username or password";
                header("location: ../../templates/login.php");
            }
        } else {
            // Error message for inactive user
            $_SESSION['login_failed'] = "Your account is inactive. Please contact support for assistance.";
            header("location: ../../templates/login.php");
        }
    } else {
        // Error message for incorrect username
        $_SESSION['login_failed'] = "Wrong username or password";
        header("location: ../../templates/login.php");
    }
}
?>
