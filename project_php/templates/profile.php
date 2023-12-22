<!-- connection from database -->
<?php include '../config/connection.php' ?>

<!-- header -->
<?php include '../includes/header.php' ?>

<!-- navigation bar -->
<?php include '../includes/navigation.php'; ?>

<!-- php logic file to show all data from database -->
<?php include '../config/model/show_users.php' ?>

<div class="container">
    <div class="row text-center justify-content-center my-5">
        <div class="col-md-6">

            <!-- user profile image -->
            <?php
            if (empty($row['image'])) {
                echo '<img src="../assets/images/user_profile.png" alt="">';
            } else {
                $imageData = $row['image'];

                ?>
                <img src='<?php echo "../assets/uploaded_images/$imageData" ?>'
                    style="border-radius: 50%; object-fit:cover;" width="50%" height="34%" alt="">
            <?php } ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <!-- ID -->
                    <tr>
                        <th scope="row">id</th>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                    </tr>

                    <!-- USERNAME -->
                    <tr>
                        <th scope="row">Name</th>
                        <td>
                            <?php echo $username; ?>
                        </td>
                    </tr>

                    <!-- EMAIL -->
                    <tr>
                        <th scope="row">Email</th>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                    </tr>

                    <!-- DATE OF BIRTH -->
                    <tr>
                        <th scope="row">DOB</th>
                        <td>
                            <?php echo $row['dob']; ?>
                        </td>
                    </tr>

                    <!-- AGE -->
                    <tr>
                        <th scope="row">Age</th>
                        <td>
                            <?php echo $row['age']; ?>
                        </td>
                    </tr>

                    <!-- GENDER -->
                    <tr>
                        <th scope="row">Gender</th>
                        <td>
                            <?php if ($row['gender'] == 0) {
                                echo "Female";
                            } elseif ($row['gender'] == 1) {
                                echo "Male";
                            } else {
                                echo "Transgender";
                            } ?>
                        </td>
                    </tr>

                    <!-- FAVOURITE SUBJECTS -->
                    <tr>
                        <th scope="row">Favourite Subjects</th>
                        <td>
                            <?php echo $row['subjects']; ?>
                        </td>
                    </tr>

                    <!-- FAVOURITE SUBJECTS -->
                    <tr>
                        <th scope="row">Hobbies</th>
                        <td>
                            <?php echo $row['hobbies']; ?>
                        </td>
                    </tr>

                    <!-- COUNTRY -->
                    <tr>
                        <th scope="row">Country</th>
                        <td>
                            <?php echo $row_address['country']; ?>
                        </td>
                    </tr>

                    <!-- STATE -->
                    <tr>
                        <th scope="row">State</th>
                        <td>
                            <?php echo $row_address['state']; ?>
                        </td>
                    </tr>

                    <!-- District -->
                    <tr>
                        <th scope="row">District</th>
                        <td>
                            <?php echo $row_address['district']; ?>
                        </td>
                    </tr>

                    <!-- ADDRESS -->
                    <tr>
                        <th scope="row">Address</th>
                        <td>
                            <?php echo $row_address['address']; ?>
                        </td>
                    </tr>

                    <!-- PIN CODE -->
                    <tr>
                        <th scope="row">Pin Code</th>
                        <td>
                            <?php echo $row['pin_code']; ?>
                        </td>
                    </tr>

                    <!-- CREATED AT -->
                    <tr>
                        <th scope="row">Created At</th>
                        <td>
                            <?php echo $row['created_at']; ?>
                        </td>
                    </tr>

                    <!-- UPDATED AT -->
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>
                            <?php echo $row['updated_at']; ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button class="btn btn-primary"><a href="./update.php">Update</a></button><br><br>
        </div>
    </div>
</div>

<!-- alert after sign up -->
<script>
    <?php
    session_start();
    if (isset($_SESSION['profile_update'])) {
        echo 'alert("' . $_SESSION['profile_update'] . '");';
        unset($_SESSION['profile_update']);
    }
    ?>
</script>
<!-- alert after sign up ends-->

<?php include '../includes/footer.php' ?>