<?php

// Model File
require('/var/www/html/project_php/config/model/admin_fetch_data.php');


// SHOWING FULL DATA ON SUPER ADMIN PANEL
$col = "*";
$table_1 = 'users';
$table_2 = 'user_address';
$users_data = fetch_whole_data($col, $table_1 , $table_2);



// UPDATING ROLES AND ACTIVE STATUS
if (isset($_POST['role_btn'])) {
    $role = $_POST['Role'];
    $status = $_POST['Status'];
    $user_data_id = $_POST['Id'];
    $col = '*';
    $table = 'users';
    $count = fetch_user_data($col, $table);
    // Check if active_status is updated
    if ($status != $count['active_status']) {
        $currentDateTime = date('Y-m-d H:i:s');
        $value = " `Role` = '$role',
        `active_status` = '$status',
        `Last_active` =  '$currentDateTime'";
    } else {
        // Only update the role without changing the timestamp
        $value = " `Role` = '$role',
        `active_status` = '$status'";
    }
    $condition = "id = '$user_data_id'";
    role_assign($table, $value, $condition);
    $response = array("status"=>200);
    echo json_encode($response);
}



//  SHOW NUMBER OF USERS
$col1 = "*";
$table1 = "users";

$condition1 = "Role = 1";
$count_user = userStats($col1, $table1, $condition1);

//  SHOW NUMBER OF ADMINS
$condition1 = "Role = 0";
$count_admin = userStats($col1, $table1, $condition1);

//  SHOW NUMBER OF ACTIVE USERS
$condition1 = "active_status = 1 AND Role = 1";
$count_active_users = userStats($col1, $table1, $condition1);

// SHOW ACTIVE ADMINS
$condition1 = "active_status = 1 AND Role = 0";
$count_active_admins = userStats($col1, $table1, $condition1);

?>