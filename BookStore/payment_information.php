<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>

    <h1>Enter Payment Information</h1>
    <div class="container">
    <form action="process_payment.php" method="POST">
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required><br><br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" required><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <input type="submit" value="Submit Payment">
    </form>
    </div>
</body>
</html>
