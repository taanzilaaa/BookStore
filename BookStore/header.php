<header class="header">
<div class= "header_body">
    <a href="index.php" class="logo">Bookstore</a>
    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="index.php">Add Books</a>
        <a href="view_books.php">View Books</a>
        <a href="cart.php">Buy</a>
    </nav>
    <?php
    $select= mysqli_query($conn, 'Select * from cart') or die('Query failed');
    $count= mysqli_num_rows($select);

    ?>
    <!-- icon-->
    <a href="show_cart.php" class= "cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $count ?> </sup></span></a>
    <div id="menu-btn" class= "fas fa-bars"></div>
</div>
</header>