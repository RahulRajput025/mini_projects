<!-- Navigation-->
<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php include '../config/connection.php'; ?>
<link rel="stylesheet" href="../assets/css/styles.css">
<nav style="background-color: #e9f7eb;" class="navbar navbar-expand-lg  py-3">
    <div class="container px-5">
        <a class="navbar-brand" href="../templates/index.php"><span class="fw-bolder text-primary">
                <?php
                if (isset($_SESSION['login_success']) || isset($_SESSION['admin_message'])) {
                    echo 'Welcome ->' . $_SESSION['name'] . ' '.($_SESSION['admin_message']).'';
                }
                ?>

            </span></a>

        <!-- Username Display after Login -->



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link" href="../templates/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../templates/prime.php">Prime Number</a></li>
                <li class="nav-item"><a class="nav-link" href="../templates/profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="../templates/contact.php">Contact</a></li>
            </ul>

            <!-- Display of buttons according to login and logout -->
            <?php
            if (isset($_SESSION['login_success'])) {
                echo '
                <button class="btn btn-danger mr-2 ml-3" "><a style="text-decoration: none;"
                    href="../config/model/logout.php">Logout</a></button';
            } else {
                echo '<button class="btn btn-success ml-2  "><a style="text-decoration: none;"
                href="../templates/login.php">Login</a></button>
        <button class="btn btn-success mr-2 "><a style="text-decoration: none;"
                href="../templates/signup.php">SignUp</a></button>';
            }
            ?>
        </div>
    </div>
</nav>