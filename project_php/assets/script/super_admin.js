// FOR J QUERY TABLE
$(document).ready(function () {
    $('#table_id').DataTable({
        "paging": true,
        "pageLength": 10,
        "order": [[0, 'asc']],
    });
});


// FOR MODAL
document.querySelectorAll('.btn-view').forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        var modalId = button.getAttribute('data-target');

        $(modalId).modal('show');
    });
});



// FOR FORM SUBMISSION
$(document).ready(function () {
    $("#userUpdateForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function (response) {
                console.log("Form submitted successfully.");
            },
            error: function (xhr, status, error) {
                console.error("Error submitting the form: " + error);
            }
        });
    });
});
