<?php
$query = "SELECT DISTINCT country FROM your_country_table";
$result = mysqli_query($connection, $query);

// Check if there are countries
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $country = $row['country'];
        echo '<option value="' . $country . '">' . $country . '</option>';
    }
}
?>

<!-- In your HTML form, for the country select tag -->
<select class="form-select" name="country" id="country" onchange="fetchStates()">
    <option value="">Select Country</option>
    <!-- PHP code to populate countries here -->
</select>

<!-- Similarly, for the state and city select tags -->
<select class="form-select" name="state" id="state" onchange="fetchCities()">
    <option value="">Select State</option>
    <!-- PHP code to populate states here -->
</select>

<select class="form-select" name="district" id="city">
    <option value="">Select District</option>
    <!-- PHP code to populate cities here -->
</select>



<!-- COUNTRY -->
<div class="form-group mt-5">
    <select class="form-select" name="country" id="country">
        <option value="">Select Country</option>
        <?php while ($country_row = mysqli_fetch_assoc($country_result)): ?>
            <option value="<?php echo $country_row['id']; ?>">
                <?php echo $country_row['country_name']; ?>
            </option>
        <?php endwhile; ?>
    </select>
</div>

<!-- STATE -->
<div class="form-group mt-5">
    <select class="form-select" name="state" id="state">
        <option value="">Select State</option>
        <?php while ($state_row = mysqli_fetch_assoc($state_result)): ?>
            <option value="<?php echo $state_row['id']; ?>">
                <?php echo $state_row['state_name']; ?>
            </option>
        <?php endwhile; ?>
    </select>
</div>

<!-- DISTRICT -->
<div class="form-group mt-5">
    <select class="form-select" name="district" id="district">
        <option value="">Select District</option>
        <?php while ($district_row = mysqli_fetch_assoc($district_result)): ?>
            <option value="<?php echo $district_row['id']; ?>">
                <?php echo $district_row['district_name']; ?>
            </option>
        <?php endwhile; ?>
    </select>
</div>