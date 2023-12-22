<?php

session_start();

// Connection file
require('/var/www/html/project_php/config/connection.php');

// Fetch whole data of a table without any condition
function fetch_user_data($col, $table)
{
    global $conn;
    $sql = "SELECT $col FROM $table";
    $execute = mysqli_query($conn, $sql);
    if (!$execute) {
        die("Query execution failed: " . mysqli_error($conn));
    }
    $count = mysqli_fetch_assoc($execute);
    return $count;
}


// TO FETCH DATA FROM USER AND USER_ADDRESS TABLE
function fetch_whole_data($col, $table_1, $table_2)
{
    global $conn;
    $data_container = array();
    $fetch_query = "SELECT $col FROM $table_1 INNER JOIN $table_2 ON $table_1.id = $table_2.id";
    $execute = mysqli_query($conn, $fetch_query);
    while ($row = mysqli_fetch_array($execute, MYSQLI_ASSOC)) {
        array_push($data_container, $row);
    }
    if (!empty($data_container)) {
        return $data_container;
    } else {
        return false;
    }
}


// TO UPDATE ROLES AND ACCOUNT ACTIVE STATUS
function role_assign($table, $value, $condition)
{
    global $conn;
    $update_role_status = "UPDATE $table SET $value WHERE $condition";
    $execute_update_sql = mysqli_query($conn, $update_role_status);
    if ($execute_update_sql) {
        $_SESSION['update_role_&_status'] = "Updated Successfully";
        header("location: ../../admin_panel/super_admin.php");
        return true;
    } else {
        echo "Mission impossible";
    }
}



function userStats($col1, $table1, $condition1)
{
    global $conn;
    $query = "SELECT $col1 FROM $table1 WHERE $condition1";
    $execute = mysqli_query($conn, $query);
    if ($execute === false) {
        die("Database query error: " . mysqli_error($conn));
    }
    $count = mysqli_num_rows($execute);
    return $count;
}



// function showSingleUser($col1, $table1, $condition1)
// {
//     global $conn;
//     $query = "SELECT $col1 FROM $table1 WHERE $condition1";
//     $execute = mysqli_query($conn, $query);
// }
?>