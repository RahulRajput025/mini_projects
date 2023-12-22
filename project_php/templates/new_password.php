<!-- Header -->
<?php include '../includes/header.php' ?>
<?php
session_start();
$token = $_GET['token'];
$user_email = $_GET['email'];
// var_dump($token);
// var_dump($user_email);
?>

<div class="container mt-5">
    <h1 class="text-center my-5">Enter New Password</h1>
    <div class="row data_forms ">
        <div class="col-md-6"> <img src="../assets/images/login.jpg"  class="img-fluid h-100 w-100 rounded" alt="">
        </div>
        <div class="col-md-6">
            <form action="../config/model/reset_password.php" method="POST" class="my-5">

                <div class="form-group mt-3">
                    <label class="my-4" for="recover_password_email"><i style="font-size:30px;"
                            class="fa-regular fa-envelope"></i><span style="font-size: 30px;" class="mx-2">Enter New Password</span></label>
                    <input type="password" class="form-control" name="new_password" id="new_password"
                        style="height: 45px;" placeholder="Enter New Password">
                </div>
                <div class="form-group mt-3">
                    <label class="my-4" for="recover_password_email"><i style="font-size:30px;"
                            class="fa-regular fa-envelope"></i><span style="font-size: 30px;" class="mx-2">Confirm Password</span></label>
                    <input type="password" class="form-control" name="confirm_new_password" id="new_password"
                        style="height: 45px;" placeholder="Confirm new password">
                        <input type="hidden" name="token" value="<?php echo $token ?>" >
                        <input type="hidden" name="email" value="<?php echo $user_email ?>" >
                </div>
                <button type="submit" name="new_password_btn" class="btn btn-light mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php' ?>