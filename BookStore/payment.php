<?php
session_start();

if(isset($_POST['payment_method'])) {
    // Process payment method selection
    $payment_method = $_POST['payment_method'];

    if ($payment_method === "cash_on_delivery") {
        echo "You've chosen Cash on Delivery. Please wait for your order to arrive.";
    } elseif ($payment_method === "online_payment") {

        header("Location: payment_information.php");
        exit();
    }
}
?>
<!-- Payment Method Selection HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/pay.css">
</head>
<body>

    <h1>Payment</h1>


    <div class="container">
    <form action="" method="POST">
        <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery" required>
        <label for="cash_on_delivery">Cash on Delivery</label><br>
        <input type="radio" id="online_payment" name="payment_method" value="online_payment" required>
        <label for="online_payment">Online Payment</label><br><br>
        <input type="submit" value="Proceed to Pay">
    </form>
    </div>
    
</body>
</html>

