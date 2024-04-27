<link rel="stylesheet" href="css/review.css">
<?php

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if review data is present
    if(isset($_POST['review'])) {
        // Process the review data 
        
        // Redirect back to review page 
        header("Location: review.php?review_submitted=true");
        exit();
    } else {

        echo "Review data not found.";
    }
} else {

    echo "Form not submitted.";
}
?>
