<!-- php logic to show data on update page from user table-->
<?php session_start(); 


$user_id = $_SESSION['id'];
$query = "SELECT * FROM `users` WHERE id = $user_id";
$execute = mysqli_query($conn, $query);

if (mysqli_num_rows($execute) > 0) {
    $row = mysqli_fetch_assoc($execute);
    $username = $row['username'];

    // TO SHOW PROFILE IMAGE
    $imageData = $row['image'];
}


// php logic to show data on update page from second table
$query_2 = "SELECT * FROM `user_address` WHERE id = $user_id";
$execute_2 = mysqli_query($conn, $query_2);
if (mysqli_num_rows($execute_2) > 0) {
    $row_address = mysqli_fetch_assoc($execute_2);

}