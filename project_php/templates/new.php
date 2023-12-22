<?php session_start(); ?>

<!-- connection from database -->
<?php include '../config/connection.php' ?>

<!-- header -->
<?php include '../includes/header.php' ?>

<!-- navigation bar -->
<?php include '../includes/navigation.php'; ?>

<!-- php logic file to show all data from database -->
<?php include '../config/model/show_users.php' ?>

<?php
// php logic to show data on the update page from the second table
$query_2 = "SELECT * FROM `user_address` WHERE id = $user_id";
$execute_2 = mysqli_query($conn, $query_2);

if (mysqli_num_rows($execute_2) > 0) {
    $row_address = mysqli_fetch_assoc($execute_2);
} ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11 data_forms text-light mt-4">
            <form action="../config/model/update_profile.php" method="POST" enctype="multipart/form-data" class="my-2">
                <h1 class="text-center">Update Profile</h1>
                <div class="row justify-content-around mt-5">
                    <!-- ... other form elements ... -->

                    <!-- COUNTRY -->
                    <div class="col-md-5">
                        <div class="form-group mt-5">
                            <label for="country">Country</label>
                            <select class="form-select" name="country" id="country" onchange="fetchStates()">
                                <option value="">Select Country</option>
                            </select>
                        </div>
                    </div>

                    <!-- STATE -->
                    <div class="col-md-5">
                        <div class="form-group mt-5">
                            <label for="state">State</label>
                            <select class="form-select" name="state" id="state" onchange="fetchCities()">
                                <option value="">Select State</option>
                            </select>
                        </div>
                    </div>

                    <!-- DISTRICT/CITY -->
                    <div class="col-md-5">
                        <div class="form-group mt-5">
                            <label for="city">District/City</label>
                            <select class="form-select" name="district" id="city">
                                <option value="">Select District/City</option>
                            </select>
                        </div>
                    </div>

                    <!-- ... continue with other form elements ... -->
                </div>
                <div class="text-center my-3">
                    <button type="submit" class="btn btn-light text-dark mt-3">Update</button>
                    <button type="submit" class="btn btn-light mt-3"><a href="./index.php" class="text-dark">Home</a></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // ... existing JavaScript code ...

    // Function to fetch countries and populate the country dropdown
    async function fetchCountries() {
        const countrySelect = document.getElementById('country');
        // ... other select elements ...

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
            // Set the selected option based on saved data
            countrySelect.value = '<?php echo $row_address['country']; ?>';
            // Trigger fetching states based on the selected country
            fetchStates();
        } catch (error) {
            console.error('Error fetching countries:', error);
        }
    }

    // Function to fetch states based on the selected country
    async function fetchStates() {
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        // ... other select elements ...

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
                // Set the selected option based on saved data
                stateSelect.value = '<?php echo $row_address['state']; ?>';
                // Trigger fetching cities based on the selected state
                fetchCities();
            } catch (error) {
                console.error('Error fetching states:', error);
            }
        } else {
            stateSelect.innerHTML = '<option value="">Select State</option>';
            // Clear city dropdown when country is changed
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
                // Set the selected option based on saved data
                citySelect.value = '<?php echo $row_address['district']; ?>';
            } catch (error) {
                console.error('Error fetching cities:', error);
            }
        } else {
            citySelect.innerHTML = '<option value="">Select District/City</option>';
        }
    }

    // Initial population of the country dropdown
    fetchCountries();

</script>

<!-- alert after sign up ends-->
<?php include '../includes/footer.php' ?>
