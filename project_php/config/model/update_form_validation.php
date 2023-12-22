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

    // Address Validation (Assuming a simple non-empty validation)
    $address = $_POST['address'];
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }
    // Validate Date of Birth
    $dob = $_POST['dob'];
    if (empty($dob)) {
        $errors['dob'] = "Date of Birth is required.";
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