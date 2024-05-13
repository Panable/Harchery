<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>

        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <?php
                require APPROOT . '/views/archer/inc/enter_score_helper.php';
                generate_form($data);
            ?>
        </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select the form
    var form = document.querySelector("form");

    // Add a submit event listener to the form
    form.addEventListener("submit", function(event) {
        // Validate the input fields
        var inputs = document.querySelectorAll("input[type='text']");
        var isValid = true;
        inputs.forEach(function(input) {
            // Split the input value by commas and trim each part
            var numbers = input.value.trim().split(",");
            var numCount = 0;
            // Loop through each number entered
            for (var i = 0; i < numbers.length; i++) {
                var num = parseFloat(numbers[i].trim()); // Convert to number
                // Check if it's a valid number between 0 and 10
                if (!isNaN(num) && num >= 0 && num <= 10) {
                    numCount++;
                } else {
                    isValid = false;
                    // Highlight the current input field to indicate an error
                    input.style.border = "2px solid red";
                    break; // Exit loop if invalid number found
                }
            }

            // If the number count is not 6, set isValid to false
            if (numCount !== 6) {
                isValid = false;
                // Highlight the current input field to indicate an error
                input.style.border = "2px solid red";
            } else {
                // Reset the border style if the input is valid
                input.style.border = "";
            }
        });

        // If all inputs are valid, submit the form via AJAX
        if (!isValid) {
            // Show an error message
            alert("Please make sure you enter exactly 6 valid numbers between 0 and 10 in each input field.");
            // Prevent the default form submission
            event.preventDefault();
        }
    });
});
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
