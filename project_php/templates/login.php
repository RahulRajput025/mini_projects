<!-- Header -->
<?php include '../includes/header.php' ?>
<?php session_start(['login_success']);
session_start(); ?>


<?php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $cookie_name = $_COOKIE['username'];
    $cookie_password = $_COOKIE['password'];
} else {
    $cookie_name = '';
    $cookie_password = '';
}

?>

<div class="container mt-5">
    <div class="row data_forms ">
        <!-- alert message if login details are wrong -->
        <?php
        if (isset($_SESSION['login_failed'])) {
            echo ' 
        <div class="alert alert-danger alert-dismissible fade show alert-message " role="alert">
        ' . $_SESSION['login_failed'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
            unset($_SESSION['login_failed']);
        }


        // message after password update
        if (isset($_SESSION['updated_password'])) {
            echo ' 
        <div class="alert alert-success alert-dismissible fade show alert-message " role="alert">
        ' . $_SESSION['updated_password'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
            unset($_SESSION['updated_password']);
        }



        // message after sign up
        if (isset($_SESSION['sign_up_message'])) {
            echo ' 
        <div class="alert alert-success alert-dismissible fade show alert-message " role="alert">
        ' . $_SESSION['sign_up_message'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
            unset($_SESSION['sign_up_message']);
        }
        ?>
        <!-- message after sign up ends-->



        <div class="col-md-6"> <img src=" ../assets/images/login.jpg" class="img-fluid h-100 w-100 rounded" alt="">
        </div>
        <div class="col-md-6">
            <form action="../config/model/login_handle.php" method="POST" class="my-5" id="loginForm">
                <div class="form-group">
                    <label class="my-2" for="email"><i class="fa-solid fa-user"></i><span class="mx-2">Enter
                            Username</span></label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?php echo $cookie_name; ?>" placeholder="Enter Username">
                </div>

                <div class="form-group mt-3">
                    <label class="my-2" for="password"><i class="fa-solid fa-key"></i><span
                            class="mx-2">Password</span></label>
                    <input type="password" class="form-control" name="user_password" id="user_password"
                        value="<?php echo $cookie_password; ?>" placeholder="Password">

                    <div class="remember_me mt-3">
                        <input class="" type="checkbox" value="remember_me" name="remember_me" id="remember_me">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    <p class="mt-4 text-light">Don't Have account,<a class="text-primary" href="./signup.php"> Signup
                            here</a></p>

                    <p class="mt-4 text-light">Forgot your password,<a class="text-primary"
                            href="./recover_password.php">
                            Reset
                            here</a></p>
                </div>
                <button type="submit" class="btn btn-light mt-3">Login</button>
                <!-- <button type="submit" class="btn btn-danger mt-3"><a href="./index.php">Home</a></button> -->
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php' ?>