<?php session_start(); ?>

<!-- connection from database -->
<?php include '../config/connection.php' ?>

<!-- header -->
<?php include '../includes/header.php' ?>

<!-- navigation bar -->
<?php include '../includes/navigation.php'; ?>

<!-- php logic file to show all data from database -->
<?php include '../config/model/show_users.php' ?>


<div class="container">
    <?php
    if (isset($_SESSION['error_updation'])) {
        echo ' 
        <div class="alert alert-danger alert-dismissible fade show alert-message " role="alert">
        ' . $_SESSION['error_updation'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="row justify-content-center ">
        <div class="col-md-11 data_forms text-light mt-4">
            <form action="../config/model/update_profile.php" method="POST" enctype="multipart/form-data" class="my-2"
                id="imageDeleteForm" onsubmit="return validateProfileUpdateForm()">

                <h1 class="text-center">Update Profile</h1>
                <div class="row justify-content-around mt-5">
                    <div class="col-md-5">
                        <!-- IMAGE AS INPUT -->
                        <div class="form-group mb-3">
                            <div class="custom-file">
                                <img src='<?php echo "../assets/uploaded_images/$imageData" ?>'
                                    class="img-fluid rounded profile_image-update" alt="">
                                <input name="profile_image" type="file" class="custom-file-input rounded"
                                    id="profile_image">
                                <input type="hidden" name="profile_image" value="<?php echo $row['image']; ?>">


                                <!-- button to remove profile image -->
                                <?php if ($row['image'] === NULL) {
                                } else {
                                    echo '<button type="submit" onclick=" return confirmDeleteImage()" name="del_profile_image"
                                        class="rounded mt-1 btn btn-light" style="font-size:14px;" value="Remove Image">
                                        Remove</button>';
                                } ?>
                            </div>
                        </div>

                        <!-- Username Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Username</span></label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="<?php echo $row['username']; ?>" placeholder="Enter Username">
                            <div class="error mt-1 username">
                                <?php echo isset($errors['username']) ? $errors['username'] : ""; ?>
                            </div>
                        </div>

                        <!-- Email Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Email</span></label>
                            <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email"
                                id="email" placeholder="Enter Email" disabled >
                            <div class="error mt-1 email">
                                <?php echo isset($errors['email']) ? $errors['email'] : ""; ?>
                            </div>
                        </div>

                        <!-- Age Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Age</span></label>
                            <input type="number" class="form-control" value="<?php echo $row['age']; ?>" name="age"
                                id="age" placeholder="Enter Age">
                            <div class="error mt-1 age">
                                <?php echo isset($errors['age']) ? $errors['age'] : ""; ?>
                            </div>
                        </div>

                        <!-- Address Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Address</span></label>
                            <input type="text" class="form-control" value="<?php echo $row_address['address']; ?>"
                                name="address" id="address" placeholder="Enter Address">
                            <div class="error mt-1 address">
                                <?php echo isset($errors['address']) ? $errors['address'] : ""; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <!-- Date of Birth Input Field -->
                        <div class="form-group">
                            <label class=""><span class="mx-2"> Date of Birth</span></label>
                            <input type="date" class="form-control" value="<?php echo $row['dob']; ?>" max="2015-01-01"
                                name="dob" id="dob" placeholder="Enter dob">
                            <div class="error dob">
                                <?php echo isset($errors['dob']) ? $errors['dob'] : ""; ?>
                            </div>
                        </div>

                        <!-- Hobbies Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Hobbies</span></label>
                            <input type="text" class="form-control" value="<?php echo $row['hobbies']; ?>"
                                name="hobbies" id="hobbies" placeholder="Enter hobbies">
                            <div class="error mt-1 hobbies">
                                <?php echo isset($errors['hobbies']) ? $errors['hobbies'] : ""; ?>
                            </div>
                        </div>

                        <!-- Pin Code Input Field -->
                        <div class="form-group">
                            <label class="mt-3"><span class="mx-2">Pin Code</span></label>
                            <input type="text" class="form-control" value="<?php echo $row['pin_code']; ?>"
                                name="pin_code" id="pin_code" placeholder="Enter pin code">
                            <div class="error mt-1 pin_code">
                                <?php echo isset($errors['pin_code']) ? $errors['pin_code'] : ""; ?>
                            </div>
                        </div>

                        <!-- Country Input Field -->
                        <div class="form-group mt-4">
                            <label for="country">Country</label>
                            <select class="form-select" name="country" id="country" onchange="fetchStates()">
                                <option value="">Select Country</option>
                            </select>
                            <div class="error mt-1 country">
                                <?php echo isset($errors['country']) ? $errors['country'] : ""; ?>
                            </div>
                        </div>

                        <!-- State Input Field -->
                        <div class="form-group mt-4">
                            <label for="state">State</label>
                            <select class="form-select" name="state" id="state" onchange="fetchCities()">
                                <option value="">Select State</option>
                            </select>
                            <div class="error mt-1 state">
                                <?php echo isset($errors['state']) ? $errors['state'] : ""; ?>
                            </div>
                        </div>

                        <!-- City Input Field -->
                        <div class="form-group mt-4">
                            <label for="city">District/City</label>
                            <select class="form-select" name="district" id="city">
                                <option value="">Select District/City</option>
                            </select>
                            <div class="error mt-1 district">
                                <?php echo isset($errors['district']) ? $errors['district'] : ""; ?>
                            </div>
                        </div>

                        <!-- Gender Input Field -->
                        <div class="mt-4 btn-group">
                            <label style="font-size: 23px;" for="gender">Select Gender</label><br>
                            <?php
                            $savedGender = $row['gender'];
                            $genders = [
                                ['id' => 'male', 'label' => 'Male', 'value' => '1'],
                                ['id' => 'female', 'label' => 'Female', 'value' => '0'],
                                ['id' => 'others', 'label' => 'Others', 'value' => '2']
                            ];
                            foreach ($genders as $gender) {
                                $checked = ($savedGender == $gender['value']) ? 'checked' : '';
                                echo '<input class="btn-check text-light  ml-4 " type="radio" name="gender" id="' . $gender['id'] . '" value="' . $gender['value'] . '" ' . $checked . '>';
                                echo '<label style="font-size:19px;" class="form-check-label btn btn-outline-light" for="' . $gender['id'] . '">' . $gender['label'] . '</label>';
                            }
                            ?>
                            <div class="error mt-1 gender">
                                <?php echo isset($errors['gender']) ? $errors['gender'] : ""; ?>
                            </div>
                        </div>

                        <!-- FAVOURITE SUBJECTS -->
                        <div class="mt-4">
                            <label style="font-size: 22px;" class="mr-3" for="subject">Favourite Subject</label><br>
                            <?php
                            $favoriteSubjects = explode(',', $row['subjects']);
                            $subjects = ['PHP', 'JS', 'Python'];

                            foreach ($subjects as $subject) {
                                $isChecked = in_array($subject, $favoriteSubjects) ? 'checked' : '';
                                echo '<div class="form-check form-check-inline">';
                                echo '<input class="form-check-input btn-check text-light" name="subject[]" type="checkbox" id="' . $subject . '" value="' . $subject . '" ' . $isChecked . '>';
                                echo '<label class="form-check-label btn btn-outline-light " for="' . $subject . '">' . $subject . '</label>';
                                echo '</div>';
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="text-center my-3">
                    <button type="submit" name="update_data_btn" class="btn btn-light text-dark mt-3">Update</button>
                    <button type="submit" class="btn btn-light mt-3"><a href="./index.php"
                            class="text-dark">Home</a></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- confirmation to delete image -->
<script>
    function confirmDeleteImage() {
        if (confirm("Are you sure you want to remove profile...")) {
            // document.getElementById("imageDeleteForm").submit();
        } else {
            return false;
        }
    }
</script>


<!-- js script link -->
<script src="../assets/script/updateProfile.js"></script>


<!-- scripts to load country, state and city -->
<script>
    // FOR COUNTRY, STATE AND DISTRICT SELECTION 
    const apiEndpoint = 'https://api.countrystatecity.in/v1/';
    const apiKey = 'aWNiRmI3Sll2TklmVDFZV2VvSjBBZGd4OEH6cWk3Q2hQZms5ZzdzMw==';

    // Function to fetch countries and populate the country dropdown
    async function fetchCountries() {
        const countrySelect = document.getElementById('country');
        countrySelect.innerHTML = '<option value="">Select Country</option>';
        try {
            const response = await fetch(apiEndpoint + 'countries', {
                headers: {
                    'X-CSCAPI-KEY': apiKey,
                },
            });
            const data = await response.json();


            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.iso2;
                option.textContent = country.name;
                countrySelect.appendChild(option);
            });
            countrySelect.value = '<?php echo $row_address['country']; ?>';
            fetchStates();
        } catch (error) {
            console.error('Error fetching countries:', error);
        }
    }

    // Function to fetch states based on the selected country
    async function fetchStates() {
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        stateSelect.innerHTML = '<option value="">Select State</option>';
        const selectedCountry = countrySelect.value;

        if (selectedCountry) {
            try {
                const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states`, {
                    headers: {
                        'X-CSCAPI-KEY': apiKey,
                    },
                });
                const data = await response.json();

                stateSelect.innerHTML = '<option value="">Select State</option>';
                data.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.iso2;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });

                stateSelect.value = '<?php echo $row_address['state']; ?>';
                fetchCities();
            } catch (error) {
                console.error('Error fetching states:', error);
            }
        } else {
            stateSelect.innerHTML = '<option value="">Select State</option>';
            citySelect.innerHTML = '<option value="">Select District/City</option>';
        }
    }

    // Function to fetch cities based on the selected state
    async function fetchCities() {
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        citySelect.innerHTML = '<option value="">Select District/City</option>';

        const selectedCountry = countrySelect.value;
        const selectedState = stateSelect.value;

        if (selectedCountry && selectedState) {
            try {
                const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states/${selectedState}/cities`, {
                    headers: {
                        'X-CSCAPI-KEY': apiKey,
                    },
                });
                const data = await response.json();

                citySelect.innerHTML = '<option value="">Select District/City</option>';
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.name;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
                citySelect.value = '<?php echo $row_address['district']; ?>';
            } catch (error) {
                console.error('Error fetching cities:', error);
            }
        } else {
            citySelect.innerHTML = '<option value="">Select District/City</option>';
        }
    }

    // country
    fetchCountries();
</script>