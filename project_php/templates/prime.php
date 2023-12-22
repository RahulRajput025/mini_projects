<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<div class="container">
    <div class="row mt-5 text-center justify-content-center ">
        <h1 class="mt-5">Prime Number Check</h1>
        <div class="col-md-10">

            <?php if (isset($_SESSION['login_success'])) {
                echo '<form action="" method="POST" class="" id="" onsubmit="return check_prime()">
<div class="form-group ">
    <label class=""><i class="fa-solid fa-user"></i><span class="mx-2">Enter Username</span></label>
    <input type="text" class="form-control" name="number" id="number" placeholder="Enter Number">
    <div class="error mt-1 name" ></div>
</div>

<button type="submit" class="btn btn-success text-light mt-3">Check</button>
</form>';
            } else {
                echo '
                <h2 class="text-danger text-center my-3" >Please Login to access this page</h2>
                <form action="" method="POST" class="" id="" onsubmit="return check_prime()">
<div class="form-group ">
    <label class=""><i class="fa-solid fa-user"></i><span class="mx-2">Enter Username</span></label>
    <input type="text" class="form-control" name="number" id="number" placeholder="Enter Number" disabled >
    <div class="error mt-1 name" ></div>
</div>

<button type="submit" class="btn btn-success text-light mt-3" disabled >Check</button>
</form>';
            } ?>

        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['number'];
    function check_prime($num)
    {
        if ($num == 1)
            return 1;
        for ($i = 2; $i <= $num / 2; $i++) {
            if ($num % $i == 0)
                return 0;
        }
        return 1;
    }
    $output = check_prime($num);
    if ($output == 1)
        echo '<h2 class="text-center text-success mt-4" >It is a prime number</h2>';
    else
        echo '<h2 class="text-center text-danger mt-4" >It is a non-prime number</h2>';
}
?>
<?php include './includes/footer.php'; ?>