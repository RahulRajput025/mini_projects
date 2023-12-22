<?php session_start(); ?>

<!-- connection from database -->
<?php include '../config/connection.php' ?>

<!-- php logic file to show all data from database -->
<?php include '../config/model/show_users.php' ?>

<!-- header -->
<?php include '../includes/header.php' ?>

<!-- navigation bar -->
<?php include '../includes/navigation.php'; ?>



<form action="" id="deletProfile" onclick="return confirmDeleteProfile()" method="POST">
    <input type="submit" value="Delete" name="del_profile" class="btn btn-danger text-light"></input>
    <?php
    $del_query = "DELETE FROM `users` WHERE `id` = $user_id";
    $del_query2 = "DELETE FROM `user_address` WHERE `id` = $user_id";
    $execute1 = mysqli_query($conn, $del_query);
    if (!$execute1) {
        die("Error executing delete query 1: " . mysqli_error($conn));
    }
    $execute2 = mysqli_query($conn, $del_query2);
    if (!$execute2) {
        die("Error executing delete query 2: " . mysqli_error($conn));
    }
    if ($execute1 && $execute2) {
        session_destroy();
        // unset($_SESSION['login_success']);
        header("location: ../../templates/login.php");
    } else {
        echo "error in deletion";
    }
    ?>
</form>


<script>
    function confirmDeleteProfile() {
        if (confirm("Are you sure you want to Delete Your profile...")) {
            document.getElementById("deletProfile").submit();
        } else {
            return false;
        }
    }
</script>