<!-- HEADER -->
<?php include_once '../includes/header.php' ?>

<!-- NAVIGATION BAR -->
<?php include_once '../includes/navigation.php' ?>

<div class="container">
    <div class="row data_forms">
        <h1 class="text-center my-4">Contact Us</h1>
        <div class="col-lg-6">
            <form action="../config/model/contactFormHandle.php" method="POST" class="my-5" onsubmit="return validateContactForm()">
                <div class="form-group">
                    <label class="my-2"><i class="fa-solid fa-user"></i><span class="mx-2">Enter Name</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                    <div class="error mt-1 username"></div>
                </div>

                <div class="form-group mt-3">
                    <label class="my-2"><i class="fa-regular fa-envelope"></i><span class="mx-2">Email</span></label>
                    <input type="email" class = "form-control" name="email" id="email" placeholder="Enter Email">
                    <div class="error mt-1 email"></div>
                </div>

                <div class="form-group mt-3">
                    <label class="my-2"><i class="fa-solid fa-message"></i><span class="mx-2">Enter Message</span></label>
                    <textarea class="form-control" name="textarea" id="textarea" rows="5"></textarea>
                    <div class="error mt-1 textarea"></div>
                </div>

                <button type="submit" class="btn btn-light mt-5">Submit</button>
            </form>
        </div>
        <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.31784765278!2d76.68604817631275!3d30.709463674595433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fef14829cd74d%3A0x2e82a0ccfea177ea!2sMind2Web!5e0!3m2!1sen!2sin!4v1695364703394!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" class="img-fluid rounded h-100 w-100" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<!-- alert after contact form submission -->
<script>
    <?php
    if (isset($_SESSION['contact_success_message'])) {
        echo 'alert("' . $_SESSION['contact_success_message'] . '");';
        unset($_SESSION['contact_success_message']);
    }
    ?>
</script>

<script>
    function validateContactForm() {
        let returnInput = true;

        // Name Validation
        const name = document.getElementById("name").value;
        if (name.trim() === "") {
            errorMessageContact("username", "Please Enter Name");
            returnInput = false;
        } else {
            errorMessageContact("username", "");
        }

        // Email Validation
        const email = document.getElementById("email").value;
        if (email.trim() === "" || !isValidEmail(email)) {
            errorMessageContact("email", "Please Enter a valid email");
            returnInput = false;
        } else {
            errorMessageContact("email", "");
        }

        // Textarea Validation
        const textarea = document.getElementById("textarea").value;
        if (textarea.trim().length < 15) {
            errorMessageContact("textarea", "Characters must be greater than 15");
            returnInput = false;
        } else {
            errorMessageContact("textarea", "");
        }

        return returnInput;
    }

    function isValidEmail(email) {
        const emailRegex = /^\S+@\S+\.\S+$/;
        return emailRegex.test(email);
    }

    function errorMessageContact(elementId, message) {
        const errorElement = document.querySelector(`.${elementId}`);
        if (message) {
            errorElement.innerText = message;
        } else {
            errorElement.innerText = "";
        }
    }
</script>

<!-- FOOTER -->
<?php include_once '../includes/footer.php' ?>
