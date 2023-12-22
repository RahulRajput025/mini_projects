<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
// session_start();

// Connection
include '../config/connection.php';

// Header File
include '../includes/header.php';

// Controller File to fetch all user data
require_once '../config/controller/admin_user_data.php';
// var_dump($users_data);


// Modal file
include './data_modal.php';
?>

<!-- For jQuery table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>


<!-- =============== Navigation ================ -->

<!-- DELETE USERS AFTER INACTIVE STATUS OF 30 DAYS -->
<?php
// 30 DAYS - 43200 minutes
$timelimit = date('Y-m-d H:i:s', strtotime('-900 minutes'));
$sql_fetch = "SELECT `Last_active` FROM `users`";
$sql_execute = mysqli_query($conn, $sql_fetch);
$sql_delete = "DELETE users, user_address FROM users INNER JOIN user_address ON users.id = user_address.id WHERE users.active_status = 0 AND users.Last_active <= '$timelimit'";
$execute = mysqli_query($conn, $sql_delete);
?>

<div class="main-container">
    <?php
    // if (isset($_SESSION['Deleted_account'])) {
    //     echo ' 
    //     <div class="alert alert-success alert-dismissible fade show alert-message " role="alert">
    //     ' . $_SESSION['Deleted_account'] . '
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>';
    //     unset($_SESSION['Deleted_account']);
    // }
    ?>
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="logo-apple"></ion-icon>
                    </span>
                    <span class="title">Brand Name</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Customers</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title">Messages</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="help-outline"></ion-icon>
                    </span>
                    <span class="title">Help</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <span class="title">Password</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <!-- <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div> -->

            <div class="user">
                <img src="assets/imgs/customer01.jpg" alt="">
            </div>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        echo $count_user;
                        ?>
                    </div>
                    <div class="cardName"> Users</div>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">
                        <?php echo $count_admin ?>
                    </div>
                    <div class="cardName"> Admins</div>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">
                        <?php echo $count_active_users; ?>
                    </div>
                    <div class="cardName">Active User Accounts</div>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">
                        <?php echo $count_active_admins; ?>
                    </div>
                    <div class="cardName">Active Admin Accounts</div>
                </div>
            </div>
        </div>

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>List</h2>
                        </div>
                        <div class="col-md-12">
                            <?php if (isset($_SESSION['update_role_&_status'])) {
                                echo ' 
                                <div class="alert alert-success alert-dismissible fade show alert-message" role="alert">
                                ' . $_SESSION['update_role_&_status'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                unset($_SESSION['update_role_&_status']);
                            } ?>
                        </div>
                    </div>
                </div>

                <table id="table_id" class="display admin_table" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Select Roles</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users_data as $data) {
                            $id = $data['id'];
                            ?>
                            <tr data-user-id="<?php echo $data['id']; ?>">
                                <td class="text-center">
                                    <?php echo $data['id'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $data['username'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $data['email'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $data['age'] ?>
                                </td>
                                <td>
                                    <!-- FORM STARTS -->
                                    <form id="table-data" class="userUpdateForm">
                                        <input type="hidden" id="user_data_id" name="user_data_id" value="<?php echo $data['id'] ?>">
                                        <select class="form-select" name="status" id="status">
                                            <option selected value="<?php echo $data['active_status'] ?>">
                                                <?php if ($data['active_status'] == 0) {
                                                    echo 'Inactive';
                                                } else {
                                                    echo 'Active';
                                                } ?>
                                            </option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                </td>
                                <td>
                                    <div class="form-group mt-1">
                                        <select class="form-select" name="role" id="role">
                                            <option selected value="<?php echo $data['Role'] ?>">
                                                <?php if ($data['Role'] == 0) {
                                                    echo 'Admin';
                                                } else {
                                                    echo 'User';
                                                } ?>
                                            </option>
                                            <option value="1">User</option>
                                            <option value="0">Admin</option>
                                        </select>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="button" name="role_btn" id="updateButton"
                                        class="status return justify-content-center mt-2 rounded "
                                        data-id="<?php echo $data['id']; ?>">Update</button>
                                    </form>

                                    <button type="button" class="status return rounded" data-bs-toggle="modal"
                                        data-bs-target="#userProfileModal<?php echo $id; ?>">View</button>
                                    <button type="button" class="status return rounded">
                                        <a href="#" class="text-light"><span>Delete</span></a>
                                    </button>
                                    <div class="modal fade" id="userProfileModal<?php echo $id; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <a href="#" class="modal_info" data-bs-toggle="modal"
                                                    data-bs-target="#userProfileModal<?php echo $id; ?>">
                                                    <?php echo $data['username'] . "'s information" ?><br>
                                                    <?php echo "username => " . $data['username']; ?><br>
                                                    <?php echo "email => " . $data['email']; ?><br>
                                                    <?php echo "age => " . $data['age']; ?><br>
                                                    <?php echo "dob => " . $data['dob']; ?><br>
                                                    <?php echo "hobbies => " . $data['hobbies']; ?><br>
                                                    <?php echo "pincode => " . $data['pin_code']; ?><br>
                                                    <?php echo "favsubjects => " . $data['subjects']; ?>
                                                </a>
                                                <div class="modal-body">
                                                    <!-- USER DATA  -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        function saveData() {
            $.ajax({
                url: 'http://localhost/project_php/config/controller/admin_user_data.php',
                type: 'POST',
                data: $('#table-data').serialize(),
                success: function (data) {
                    $("#table-data").html(data);
                }
            });
        }
        // saveData();
        $('#table-id').on('click','#updateButton', function (e) {
            e.preventDefault();
            var Status = $("#status").val();
            var Role = $("#role").val();
            var Id = $("#user_data_id").val();
            $.ajax({
                url: '/project_php/config/controller/admin_user_data.php',
                method: 'POST',
                data: {
                    Status :Status,
                    Role:Role,
                    Id:Id
                },
                dataType:'json',
                success: function (data) {
                    console.log(data)
                    // saveData();
                }
            });
        });
    });
</script>

<!-- For jQuery table -->
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script>
    // Destroy existing DataTable if it exists
    if ($.fn.DataTable.isDataTable('#table_id')) {
        $('#table_id').DataTable().destroy();
    }

    // Initialize DataTable
    $(document).ready(function () {
        $('#table_id').DataTable({
            "paging": true,
            "pageLength": 10,
            // "order": [0, 'asc'],
        });
    });
</script>

<!-- For showing the modal -->
<script>
    document.querySelectorAll('.btn-view').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var modalId = button.getAttribute('data-target');
            $(modalId).modal('show');
        });
    });
</script>
<?php include '../includes/footer.php'; ?>