// Profile image preview
const fileInput = document.getElementById("profile_image");
fileInput.addEventListener("change", function (el) {
    const profileImage = document.querySelector(".profile_image-update");
    if (fileInput['files'].length > 0) {
        profileImage.src = URL.createObjectURL(fileInput.files[0]);
    }
})






// UPDATE FORM HANDLE
function errorMessageProfile(id, message) {
    const element = document.querySelector('.' + id);
    if (element) {
        element.innerText = message;
    }
}
function validateProfileUpdateForm() {
    let returnInput = true;

    // Name Validation
    const name = document.getElementById("username").value;
    if (name === "") {
        errorMessageProfile("username", "Please Enter Name");
        returnInput = false;
    } else {
        errorMessageProfile("username", "");
    }

    // Email Validation
    const email = document.getElementById("email").value;
    if (email === "" || !isValidEmail(email)) {
        errorMessageProfile("email", "Please Enter a valid email");
        returnInput = false;
    } else {
        errorMessageProfile("email", "");
    }

    // Age Validation
    const age = document.getElementById("age").value;
    if (age === "" || !isValidAge(age)) {
        errorMessageProfile("age", "Please Enter a valid age");
        returnInput = false;
    } else {
        errorMessageProfile("age", "");
    }

    // Address Validation
    const address = document.getElementById("address").value;
    if (address === "") {
        errorMessageProfile("address", "Please Enter Address");
        returnInput = false;
    } else {
        errorMessageProfile("address", "");
    }

    // Date of Birth Validation
    const dob = document.getElementById("dob").value;
    if (dob === "") {
        errorMessageProfile("dob", "Please Enter Date of Birth");
        returnInput = false;
    } else {
        errorMessageProfile("dob", "");
    }

    // Hobbies Validation
    const hobbies = document.getElementById("hobbies").value;
    if (hobbies === "") {
        errorMessageProfile("hobbies", "Please Enter Hobbies");
        returnInput = false;
    } else {
        errorMessageProfile("hobbies", "");
    }


    // Pin Code Validation
    const pin_code = document.getElementById("pin_code").value;
    if (pin_code === "" || pin_code.length !== 6 || isNaN(pin_code)) {
        errorMessageProfile("pin_code", "Please Enter Valid Pin Code");
        returnInput = false;
    } else {
        errorMessageProfile("pin_code", "");
    }

    // Country Validation
    const country = document.getElementById("country").value;
    if (country === "") {
        errorMessageProfile("country", "Please Select Country");
        returnInput = false;
    } else {
        errorMessageProfile("country", "");
    }

    // State Validation
    const state = document.getElementById("state").value;
    if (state === "") {
        errorMessageProfile("state", "Please Select State");
        returnInput = false;
    } else {
        errorMessageProfile("state", "");
    }

    // District Validation
    const district = document.getElementById("city").value;
    if (district === "") {
        errorMessageProfile("district", "Please Select District/City");
        returnInput = false;
    } else {
        errorMessageProfile("district", "");
    }
    return returnInput;
}
function isValidEmail(email) {
    const emailRegex = /\S+@\S+\.\S+/;
    return emailRegex.test(email);
}
function isValidAge(age) {
    return !isNaN(age) && age >= 18;
}
// UPDATE FORM ENDS