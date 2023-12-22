<!-- Header -->
<?php session_start(); 
include '../includes/header.php' ;

if (isset($_SESSION['sign_up_message'])) {
    echo ' 
<div class="alert alert-danger alert-dismissible fade show alert-message " role="alert">
' . $_SESSION['sign_up_message'] . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    unset($_SESSION['sign_up_message']);
}
?>
    <div class="container mt-5">
        <div class="row data_forms">
            <div class="col-md-6"> <img src=" ../assets/images/signup.jpg" class="img-fluid h-100 w-100 rounded" alt="">
            </div>
            <div class="col-md-6">


                <form action="../config/model/signup_handle.php" method="POST" class="my-5" id="signupForm"
                    onsubmit="return validateSignupForm()">
                    <div class="form-group">
                        <label class="my-2"><i class="fa-solid fa-user"></i><span class="mx-2">Enter
                                Username</span></label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter Username">
                        <div class="error mt-1 name"></div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="my-2"><i class="fa-solid fa-user"></i><span class="mx-2">Enter
                                Email</span></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        <div class="error mt-1 email"></div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="my-2"><i class="fa-solid fa-key"></i><span class="mx-2">Password</span></label>
                        <input type="password" class="form-control" name="user_password" id="user_password"
                            placeholder="Password">
                        <div class="error mt-1 password"></div>
                    </div>

                    <div class="form-group mt-3 mb-5">
                        <label class="my-2"><i class="fa-solid fa-key"></i><span class="mx-2">Confirm
                                Password</span></label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                            placeholder="Confirm Password">
                        <div class="error mt-1 both_passwords"></div>
                        <div class="error mt-1 c-password"></div>
                    </div>

                    <p class="text-light"><a class="text-light" href="./login.php">Login
                            here</a></p>

                    <button type="submit" class="btn btn-light mt-3">Submit</button>
                    <!-- <button type="submit" class="btn btn-danger mt-3"><a href="./index.php">Home</a></button> -->

                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../includes/footer.php' ?>