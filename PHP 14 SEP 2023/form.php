<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            .row{
                margin-top: 100px;
                box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
                padding: 15px;
                /* background-color: #212529; */
                background-color: black;
                border-radius: 5px;
            }
            .form-group label{
                font-size: 35px;
                color:white;
                /* font-family: Arial, Helvetica, sans-serif; */
            }
            .form-group input{
                height: 50px;
            }
            .btn {
                width: 120px;
                padding: 6px;
                font-size: 24px;
            }
        </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6"> <img src="./images/bg-4.jpg" class="img-fluid h-100 w-100 rounded" alt="">
            </div>
            <div class="col-md-6">
                <form action="" method="post" class="my-5" >
                    <div class="form-group">
                        <label class="my-2" for="email">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" >
                    </div>

                    <div class="form-group mt-5">
                        <label class="my-2" for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group mt-5">
                        <label class="my-2" for="c-password">Confirm Password</label>
                        <input type="password" class="form-control" name="c-password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>