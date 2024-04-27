<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Review</title>
    <link rel="stylesheet" href="css/review.css">
</head>
<body>
    <h1>Write Review</h1>
    <form action="process_review.php" method="POST">
        <label for="review">Your Review:</label><br>
        <textarea id="review" name="review" required></textarea><br>
        <button type="submit">Submit Review</button>
    </form>

    <?php
    // Check if review is submitted and show thank you message
    if(isset($_GET['review_submitted']) && $_GET['review_submitted'] == 'true') {
        echo "<p>Thank you for your feedback</p>";
    }
    ?>
</body>
</html>

