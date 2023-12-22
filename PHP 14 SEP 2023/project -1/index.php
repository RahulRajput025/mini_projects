<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP First Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php
    $welcome = "PHP Website";
    $h2 = "This is Heading 2";
    $h3 = "This is Heading 3";
    $h4 = "This is Heading 4";
    $h5 = "This is Heading 5";

    define('Rahul', 'one');


    echo 'this is a simple string';

    echo 'You can also have embedded newlines in
strings this way as it is
okay to do<br>';

    // Outputs: Arnold once said: "I'll be back"
    echo 'Arnold once said: "I\'ll be back"<br>';

    // Outputs: You deleted C:\*.*?
    echo 'You deleted C:\\*.*?<br>';

    // Outputs: You deleted C:\*.*?
    echo 'You deleted C:\*.*?<br>';

    // Outputs: This will not expand: \n a newline
    echo 'This will not expand: \n a newline<br>';

    // Outputs: Variables do not $expand $either
    echo 'Variables do not $expand $either<br>';


    // FOREACH LOOP
    $arr = array("Apple", "Mango", "Banana");
        ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center mt-5">
                <h1>
                    Welcome to My
                    <?= $welcome ?>
                </h1>

                <h2>Heading 2
                    <?= $h2 ?>
                </h2>

                <h3>Heading 3
                    <?= $h3 ?>
                </h3>

                <h4>Heading 4
                    <?= $h4 ?>
                </h4>

                <h5>Heading 5
                    <?php echo $h5 ?> <b>
                        <?php echo "abc" ?>
                    </b>
                </h5>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>

</html>