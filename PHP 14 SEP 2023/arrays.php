<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ARRAYS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- ARRAYS -->
    <?php
    $associateArray = array(
        "Name" => "Rahul",
        "Age" => 21,
        "Designation" => "SportsPresident",
        "Roll no." => 1917281
    );

    // Array Merge
    $merge_array_1 = array("string", 12, "color" => "green");
    $merge_array_2 = array("color" => "red", "string", "string-2", 12, 15);
    $mergedArray = array_merge($merge_array_1, $merge_array_2);
    // print_r($mergedArray);
    echo "<br>";


    // Shuffle
    echo "<h4>shuffle function</h4>";
    $input = array("d" => "lemon", "a" => "orange", "b" => "banana");
    shuffle($input);
    print_r($input);
    echo "<br><br>";


    // Range Function
    // with two parameters   (low and  high)
    echo "<h4>Range function</h4>";
    foreach (range(0, 6) as $number) {
        echo "$number,";
    }
    echo "<br>";
    print "\n";
    // with two parameters   (low, high and step)
    foreach (range(0, 100, 10) as $number) {
        echo "$number, ";
    }
    echo "<br>";
    // with letters
    foreach (range('a', 'c') as $letter) {
        echo "$letter, ";
    }
    echo "<br><br>";


    // list function
    echo "<h4>List Functions</h4>";
    $fruit = array("mango", "apple", "banana");
    list($a, $b, $c) = $fruit;
    echo "I have several fruits, a $a, a $b, and a $c.";
    echo "<br><br>";



    $input = array("a" => "banana", "b" => "apple", "c" => "orange");
    print_r(array_rand($input));


    ?>

    <div class="container">
        <div class="row text-center justify-content-center mt-5">
            <div class="col-md-8">
                <!-- ASSOCIATIVE ARRAYS -->
                <h3>Associative Arrays</h3>
                <table class="table">
                    <tr>
                        <th>Key</th>
                        <th>Value</th>
                    </tr>
                    <?php foreach ($associateArray as $key => $value) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $key; ?>
                            </td>
                            <td>
                                <?php echo $value; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- ASSOCIATIVER ARRAYS ENDS -->


            <div class="row text-center justify-content-center mt-5">
                <div class="col-md-3">
                    <h3>Merged Arrays</h3>
                    <table class="table">
                        <tr>
                            <th>Key</th>
                            <th>Value</th>
                        </tr>
                        <?php foreach ($mergedArray as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $key; ?>
                                </td>
                                <td>
                                    <?php echo $value; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>