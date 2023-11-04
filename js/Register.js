$(document).ready(function() {
    $("#myForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Serialize the form data into a format suitable for AJAX
        var formData = $(this).serialize();

        // Send an AJAX POST request to the server
        $.ajax({
            type: "POST",
            url: "/MKCE/php/Register.php", // Replace with the URL to your server-side script
            data: formData,
            success: function(response) {
                // Display the response from the server
                $("#response").html(response);
            }
        });
    });
});
