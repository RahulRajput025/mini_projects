// SIGNUP FORM VALIDATION
function errorMessage(id, message) {
    element = document.getElementById(id);
    element = document.getElementsByClassName(id)[0]["innerText"] = message;
}
function validateSignupForm() {
    let returnInput = true;
    // Name Validation
    let username = document.getElementById("username").value;
    if (username == "" || username == null) {
        errorMessage("name", "Please Enter Name");
        returnInput = false;
    }
    // Password Validation
    let password = document.getElementById("user_password");
    if (password.value.length < 6) {
        errorMessage("password", "*Password must be greater than 6");
        returnInput = false;
    }
    // Confirm Password Validation
    let confirmPassword = document.getElementById("confirm_password");
    if (confirmPassword.value.length < 6) {
        errorMessage("c-password", "*Password must be greater than 6");
        returnInput = false;
    }
    // Password Matching Validation
    if (password.value !== confirmPassword.value) {
        errorMessage("both_passwords", "Passwords do not match");
        returnInput = false;
    }
    return returnInput;
}
// SIGNUP FORM ENDS






// CONTACT FORM HANDLE
function errorMessageContact(id, message) {
    const element = document.querySelector('.' + id);
    if (element) {
        element.innerText = message;
    }
}
function validateContactForm() {
    let returnInput = true;
    // Name Validation
    const name = document.getElementById("name").value;
    if (name === "") {
        errorMessageContact("username", "Please Enter Name");
        returnInput = false;
    } else {
        errorMessageContact("username", "");
    }
    // Email Validation
    const email = document.getElementById("email").value;
    if (email === "" || !isValidEmail(email)) {
        errorMessageContact("email", "Please Enter a valid email");
        returnInput = false;
    } else {
        errorMessageContact("email", "");
    }
    // Textarea Validation
    const textarea = document.getElementById("textarea").value;
    if (textarea.length < 15) {
        errorMessageContact("textarea", "Characters must be greater than 15");
        returnInput = false;
    } else {
        errorMessageContact("textarea", "");
    }
    // Select Box Validation
    let php = document.getElementById("PHP");
    let js = document.getElementById("Java Script");
    let pyhton = document.getElementById("Python");
    if (
        php.selected != true &&
        js.selected != true &&
        pyhton.selected != true
    ) {
        errorMessage("subject[]", "please select favourite subject");
        returnInput = false;
    }
    return returnInput;
}
function isValidEmail(email) {
    const emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}
// // CONTACT FORM ENDS





// // UPDATE FORM HANDLE
// function errorMessageProfile(id, message) {
//     const element = document.querySelector('.' + id);
//     if (element) {
//         element.innerText = message;
//     }
// }
// function validateProfileUpdateForm() {
//     let returnInput = true;
//     // Name Validation
//     const name = document.getElementById("username").value;
//     if (name === "") {
//         errorMessageProfile("username", "Please Enter Name");
//         returnInput = false;
//     } else {
//         errorMessageProfile("username", "");
//     }
//     // Email Validation
//     const email = document.getElementById("email").value;
//     if (email === "" || !isValidEmail(email)) {
//         errorMessageProfile("email", "Please Enter a valid email");
//         returnInput = false;
//     } else {
//         errorMessageProfile("email", "");
//     }
//     //Age Validation
//     const age = document.getElementById("age").value;
//     if (age === "" || !isValidEmail(age)) {
//         errorMessageProfile("age", "Please Enter a valid email");
//         returnInput = false;
//     } else {
//         errorMessageProfile("age", "");
//     }
//     //Address Validation
//     const address = document.getElementById("address").value;
//     if (address === "" || !isValidEmail(address)) {
//         errorMessageProfile("address", "Please Enter Address");
//         returnInput = false;
//     } else {
//         errorMessageProfile("address", "");
//     }
//     //Hobbies Validation
//     const hobbies = document.getElementById("hobbies").value;
//     if (hobbies === "" || !isValidEmail(hobbies)) {
//         errorMessageProfile("hobbies", "Please Enter Address");
//         returnInput = false;
//     } else {
//         errorMessageProfile("hobbies", "");
//     }
//     //PinCode Validation
//     const pin_code = document.getElementById("pin_code").value;
//     if (pin_code === "" || pin_code.length < 6 || pin_code.length > 6 || !isValidEmail(pin_code)) {
//         errorMessageProfile("pin_code", "Please Enter Valid Pin Code");
//         returnInput = false;
//     } else {
//         errorMessageProfile("pin_code", "");
//     }
//     //Country Validation
//     const country = document.getElementById("country").value;
//     if (country === "" || !isValidEmail(country)) {
//         errorMessageProfile("country", "Please Select Country");
//         returnInput = false;
//     } else {
//         errorMessageProfile("country", "");
//     }
//     //State Validation
//     const state = document.getElementById("state").value;
//     if (state === "" || !isValidEmail(state)) {
//         errorMessageProfile("state", "Please Select Country");
//         returnInput = false;
//     } else {
//         errorMessageProfile("state", "");
//     }
//     //district Validation
//     const district = document.getElementById("district").value;
//     if (district === "" || !isValidEmail(district)) {
//         errorMessageProfile("district", "Please Select Country");
//         returnInput = false;
//     } else {
//         errorMessageProfile("district", "");
//     }
//     // Textarea Validation
//     const textarea = document.getElementById("textarea").value;
//     if (textarea.length < 15) {
//         errorMessageProfile("textarea", "Characters must be greater than 15");
//         returnInput = false;
//     } else {
//         errorMessageProfile("textarea", "");
//     }
//     return returnInput;
// }
// function isValidEmail(email) {
//     const emailRegex = /\S+@\S+\.\S+/;
//     return emailRegex.test(email);
// }
// // UPDATE FORM ENDS





//UPDATE FORM VALIDATION
function errorMessage(id, message) {
    element = document.getElementById(id);
    element = document.getElementsByClassName(id)[0]["innerText"] = message;
}
function validateAdmissionForm() {
    let returnInput = true;
    // Name Validation
    let username = document.getElementById("name").value;
    if (username == "" || username == null) {
        errorMessage("name", "Please Enter Name");
        returnInput = false;
    }

    let age = document.getElementById("age").value;
    if (age == "" || age == null) {
        errorMessage("age", "Please Enter age");
        returnInput = false;
    }

    let dob = document.getElementById("dob").value;
    if (dob == "" || dob == null) {
        errorMessage("dob", "Please Enter DOB");
        returnInput = false;
    }

    let state = document.getElementById("state").value;
    if (state == "" || state == null) {
        errorMessage("state", "Please Enter state");
        returnInput = false;
    }

    // Select Box Validation
    let bba = document.getElementById("bba");
    let mba = document.getElementById("mba");
    let bcom = document.getElementById("bcom");
    let mcom = document.getElementById("mcom");
    if (
        bba.selected != true &&
        mba.selected != true &&
        bcom.selected != true &&
        mcom.selected != true
    ) {
        errorMessage("stream", "please select a course");
        returnInput = false;
    }
    return returnInput;
}




// // FOR COUNTRY, STATE AND DISTRICT SELECTION 
// const apiEndpoint = 'https://api.countrystatecity.in/v1/';
// const apiKey = 'aWNiRmI3Sll2TklmVDFZV2VvSjBBZGd4OEH6cWk3Q2hQZms5ZzdzMw==';

// // Function to fetch countries and populate the country dropdown
// async function fetchCountries() {
//     const countrySelect = document.getElementById('country');
//     // ... other select elements ...

//     countrySelect.innerHTML = '<option value="">Select Country</option>';

//     try {
//         const response = await fetch(apiEndpoint + 'countries', {
//             headers: {
//                 'X-CSCAPI-KEY': apiKey,
//             },
//         });
//         const data = await response.json();
//         data.forEach(country => {
//             const option = document.createElement('option');
//             option.value = country.iso2;
//             option.textContent = country.name;
//             countrySelect.appendChild(option);
//         });
//         // Set the selected option based on saved data
//         countrySelect.value = '<?php echo $row_address['country']; ?>';
//         // Trigger fetching states based on the selected country
//         fetchStates();
//     } catch (error) {
//         console.error('Error fetching countries:', error);
//     }
// }

// // Function to fetch states based on the selected country
// async function fetchStates() {
//     const countrySelect = document.getElementById('country');
//     const stateSelect = document.getElementById('state');
//     // ... other select elements ...

//     stateSelect.innerHTML = '<option value="">Select State</option>';

//     const selectedCountry = countrySelect.value;

//     if (selectedCountry) {
//         try {
//             const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states`, {
//                 headers: {
//                     'X-CSCAPI-KEY': apiKey,
//                 },
//             });
//             const data = await response.json();

//             stateSelect.innerHTML = '<option value="">Select State</option>';
//             data.forEach(state => {
//                 const option = document.createElement('option');
//                 option.value = state.iso2;
//                 option.textContent = state.name;
//                 stateSelect.appendChild(option);
//             });
//             // Set the selected option based on saved data
//             stateSelect.value = '<?php echo $row_address['state']; ?>';
//             // Trigger fetching cities based on the selected state
//             fetchCities();
//         } catch (error) {
//             console.error('Error fetching states:', error);
//         }
//     } else {
//         stateSelect.innerHTML = '<option value="">Select State</option>';
//         // Clear city dropdown when country is changed
//         citySelect.innerHTML = '<option value="">Select District/City</option>';
//     }
// }

// // Function to fetch cities based on the selected state
// async function fetchCities() {
//     const countrySelect = document.getElementById('country');
//     const stateSelect = document.getElementById('state');
//     const citySelect = document.getElementById('city');

//     citySelect.innerHTML = '<option value="">Select District/City</option>';

//     const selectedCountry = countrySelect.value;
//     const selectedState = stateSelect.value;

//     if (selectedCountry && selectedState) {
//         try {
//             const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states/${selectedState}/cities`, {
//                 headers: {
//                     'X-CSCAPI-KEY': apiKey,
//                 },
//             });
//             const data = await response.json();

//             citySelect.innerHTML = '<option value="">Select District/City</option>';
//             data.forEach(city => {
//                 const option = document.createElement('option');
//                 option.value = city.name;
//                 option.textContent = city.name;
//                 citySelect.appendChild(option);
//             });
//             // Set the selected option based on saved data
//             citySelect.value = '<?php echo $row_address['district']; ?>';
//         } catch (error) {
//             console.error('Error fetching cities:', error);
//         }
//     } else {
//         citySelect.innerHTML = '<option value="">Select District/City</option>';
//     }
// }

// // Initial population of the country dropdown
// fetchCountries();






// $(document).ready(function () {
//     $("#country").on('change', function () {
//         var countryId = $(this).val();
//         $.ajax({
//             method: "POST",
//             URL: "ajax.php",
//             data: { id: countryId },
//             dataType: "html",
//             success: function (data) {
//                 $("#state").html(data);
//             }
//         });
//     });
// });