<!-- Header -->
<?php include '../includes/header.php' ?>
<?php
session_start();
?>

<div class="container mt-5">
    <h1 class="text-center my-5">Recover Your Password</h1>
    <div class="row data_forms ">
        <div class="col-md-6"> <img src=" ../assets/images/login.jpg" class="img-fluid h-100 w-100 rounded" alt="">
        </div>
        <div class="col-md-6">
            <form action="../config/model/recover_pass_handle.php" method="POST" class="my-5">

                <div class="form-group mt-3">
                    <label class="my-4" for="recover_password_email"><i style="font-size:30px;"
                            class="fa-regular fa-envelope"></i><span style="font-size: 30px;" class="mx-2">Enter Valid
                            Email</span></label>
                    <input type="email" class="form-control" name="recover_password_email" id="recover_password_email"
                        style="height: 45px;" placeholder="Enter Email">
                </div>

                <button type="submit" name="recover_password_btn" class="btn btn-light mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include '../includes/footer.php' ?>