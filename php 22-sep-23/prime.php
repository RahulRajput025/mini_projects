<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5 text-center justify-content-center ">
            <h1 class="mt-5">Prime Number Check</h1>
            <div class="col-md-10">
                <form action="" method="POST" class="" id="" onsubmit="return check_prime()">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="number" id="number" placeholder="Enter Number">
                        <div class="error mt-1 name"></div>
                    </div>
                    <button type="submit" class="btn btn-success text-light mt-3">Check</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num = $_POST['number'];
        function check_prime($num)
        {
            if ($num == 1)
                return 0;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>