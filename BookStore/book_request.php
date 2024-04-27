<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Request</title>
    <link rel="stylesheet" href="css/book.css">
</head>
<body>
    <div class="container">
        <h1>Book Request</h1>
        <p>Dear visitors, we are sorry if you can't find your favorite books.</p>
        <p><strong>Before requesting any book, please make sure it doesn't already exist on our website.</strong></p>
        <p>Fill in the below form with the book title and author name:</p>
        <form action="home.php" method="POST" >
            <label for="book_title">Book Title:</label>
            <input type="text" id="book_title" name="book_title" required><br><br>
            <label for="author_name">Author Name:</label>
            <input type="text" id="author_name" name="author_name" required><br><br>
            <button type="submit">Submit Request</button>
           
            
        </form>
    </div>
</body>
</html>