<?php
include '../connection.php';
session_start();

// ID of logged in user
$user_id = $_SESSION['id'];

if (isset($_POST['update_data_btn'])) {
    $errors = [];
    $username = trim(htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'));
    if (empty($username)) {
        $errors["username"] = "Username is required.";
    }

    // $email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    // if (empty($email)) {
    //     $errors["email"] = "Email is required.";
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors["email"] = "Invalid email format.";
    // }

    $age = trim(htmlentities($_POST['age'], ENT_QUOTES, 'UTF-8'));
    if (empty($age)) {
        $errors["age"] = "Age is required.";
    } elseif (!is_numeric($age) || $age < 0) {
        $errors["age"] = "Invalid age.";
    }

    $dob = trim(htmlentities($_POST['dob'], ENT_QUOTES, 'UTF-8'));
    $gender = trim(htmlentities($_POST['gender'], ENT_QUOTES, 'UTF-8'));
    $hobbies = trim(htmlentities($_POST['hobbies'], ENT_QUOTES, 'UTF-8'));
    $pin_code = trim(htmlentities($_POST['pin_code'], ENT_QUOTES, 'UTF-8'));
    $address = trim(htmlentities($_POST['address'], ENT_QUOTES, 'UTF-8'));
    $country = trim(htmlentities($_POST['country'], ENT_QUOTES, 'UTF-8'));
    $state = trim(htmlentities($_POST['state'], ENT_QUOTES, 'UTF-8'));
    $district = trim(htmlentities($_POST['district'], ENT_QUOTES, 'UTF-8'));
    $subject = implode(', ', $_POST['subject']);
    $profile_img_name = $_FILES['profile_image']['name'];
    $profile_img_tmp = $_FILES['profile_image']['tmp_name'];

    // Store the current datetime
    $currentDateTime = date('Y-m-d H:i:s');

    // Check if a new image is uploaded
    if (!empty($_FILES['profile_image']['name'])) {
        // Retrieve the old image name from the database
        $query = "SELECT `image` FROM `users` WHERE `id`='$user_id'";
        $result = mysqli_query($conn, $query);
        $target = mysqli_fetch_assoc($result);
        $old_profile_img = $target['image'];
        // Delete the old image from the folder
        if (!empty($old_profile_img)) {
            $old_image_path = '../../assets/uploaded_images/' . $old_profile_img;
            if (file_exists($old_image_path)) {
                unlink($old_image_path); // Delete the old image
            }
        }
        // Image Name with timestamp and extension
        $file_extension = pathinfo($profile_img_name, PATHINFO_EXTENSION);
        $timestamp = time();
        $random_number = rand(1000, 50000);
        $profile_img = $timestamp . '-' . $random_number . '.' . $file_extension;
        $folder = '../../assets/uploaded_images/' . $profile_img;
        // saving file in folder
        if (move_uploaded_file($profile_img_tmp, $folder)) {
        } else {
            echo "<script> alert('Error uploading the image.') </script>";
            exit;
        }
    } else {
        $query = "SELECT `image` FROM `users` WHERE `id`='$user_id'";
        $result = mysqli_query($conn, $query);
        $target = mysqli_fetch_assoc($result);
        $profile_img = $target['image'];
    }

    // TO SHOW DATA OF THE USER_ADDRESS TABLE
    $query = "SELECT `country`, `state`, `district`,`address` FROM `user_address` WHERE `id`='$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $existingCountry = $row['country'];
    $existingState = $row['state'];
    $existingDistrict = $row['district'];


    // Update SQL for users table
    $update_sql = "UPDATE `users` SET `username`='$username', `age`='$age', `hobbies`='$hobbies', `dob`='$dob', `gender`='$gender', `subjects`='$subject', `pin_code`='$pin_code', `Role`=1, `image`='$profile_img', `updated_at`='$currentDateTime' WHERE `id`='$user_id'";
    $execute = mysqli_query($conn, $update_sql);


    // Update SQL for user_address table
    $update_sql_2 = "INSERT INTO `user_address` (`id`, `address`, `country`, `state`, `district`) VALUES ('$user_id', '$address', '$country', '$state', '$district') ON DUPLICATE KEY UPDATE `address`='$address', `country`='$country', `state`='$state', `district`='$district'";
    $execute_sql_2 = mysqli_query($conn, $update_sql_2);

    // STORING SESSION MESSAGE
    $_SESSION['profile_update'] = "Profile Updated Successfully";

    if ($execute && $execute_sql_2) {
        header("location: ../../templates/profile.php");
    } else {
        $_SESSION['error_updation'] = "Please fill all fields";
        header("location: ../../templates/update.php");
    }
}


if (isset($_POST['del_profile_image'])) {
    $delete_img = $_POST['profile_image'];
    if (!empty($delete_img)) {
        $img_path = '../../assets/uploaded_images/' . $delete_img;
        if (file_exists($img_path)) {
            if (unlink($img_path)) {
                $update_sql = "UPDATE `users` SET `image` = NULL WHERE `id`='$user_id'";
                $execute = mysqli_query($conn, $update_sql);
                if ($execute) {
                    $_SESSION['profile_update'] = "Image Deleted Successfully";
                    header("location: ../../templates/profile.php");
                } else {
                    echo "Error in updating the image in the database: " . mysqli_error($conn);
                }
            } else {
                echo "Error deleting the image file.";
            }
        } else {
            echo "Image file not found.";
        }
    } else {
        $showError = "please select profile image";
    }
}
?>




<!-- SERVER SIDE VALIDATION -->
<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate Username
    $username = $_POST['username'];
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors['username'] = "Username can only contain letters, numbers, and underscores.";
    }

    // Validate Email
    $email = $_POST['email'];
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Validate Age
    $age = $_POST['age'];
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif (!is_numeric($age) || $age <= 0 || $age > 120) {
        $errors['age'] = "Invalid age. Please enter a valid age.";
    }


    // Address Validation
    $address = $_POST['address'];
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }
    // Validate Date of Birth
    $dob = $_POST['dob'];
    if (empty($dob)) {
        $errors['dob'] = "Date of Birth is required.";
    } elseif (!preg_match("/\d{4}-\d{2}-\d{2}/", $dob)) {
        $errors['dob'] = "Invalid Date of Birth format. Please use yyyy-mm-dd format.";
    }


    // Validate Hobbies (Assuming it's optional)
    $hobbies = $_POST['hobbies'];
    // Validation can be added here if needed

    // Validate Pin Code
    $pinCode = $_POST['pin_code'];
    if (empty($pinCode)) {
        $errors['pin_code'] = "Pin Code is required.";
    } elseif (!preg_match('/^\d{6}$/', $pinCode)) {
        $errors['pin_code'] = "Invalid Pin Code. Please enter a valid 6-digit code.";
    }

    // Validate Country
    $country = $_POST['country'];
    if (empty($country)) {
        $errors['country'] = "Country is required.";
    }

    // Validate State
    $state = $_POST['state'];
    if (empty($state)) {
        $errors['state'] = "State is required.";
    }

    // Validate City
    $city = $_POST['district'];
    if (empty($city)) {
        $errors['district'] = "City is required.";
    }

    // Validate Gender
    $gender = $_POST['gender'];
    if (empty($gender)) {
        $errors['gender'] = "Gender is required.";
    }

    // Validate Favorite Subjects (Assuming it's optional)
    $favoriteSubjects = isset($_POST['subject']) ? $_POST['subject'] : array();
    // Validation can be added here if needed

    // Add more field validations as needed.
}
?>