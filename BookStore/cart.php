<?php include 'dbconnect.php';
if(isset($_POST["add_to_cart"])){
    
        $product_name=$_POST['book_name'];
        $product_price=$_POST['book_price'];
        $product_image=$_POST['book_image'];
        $product_quantity=1;
        $select_cart=mysqli_query($conn, "Select * from cart where name='$product_name'");
        if(mysqli_num_rows($select_cart)>0){
            $display_message= "Product is already added in the cart";

        }else{
            $insert_query=mysqli_query($conn, "insert into cart (name,price,quantity,image) values('$product_name','$product_price',$product_quantity, '$product_image')")or die('Insert query failed');
            $display_message= "Product added to cart";
        }



       
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include('header.php') ?>
    <?php
    if(isset($display_message)){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick=\"this.parentElement.style.display='none';\"></i>
    </div>";
    }
?>




    <div class="container">
        <section class="products">
            <div class="product_container">
                <?php
$select= mysqli_query($conn, "Select * from product");
if(mysqli_num_rows($select)>0){
    while($fetch=mysqli_fetch_assoc($select)){

        ?>
         <form method='post' action=''>
                <div class="edit_form">
                    <img src="images/<?php echo $fetch['Image'] ?>" alt="">
                    <h3> <?php echo $fetch['Name']?> </h3>
                    <div class="price">Price: <?php echo $fetch['Price'] ?>/- </div>
                        <input type="hidden" name='book_name' value="<?php echo $fetch['Name']?>">
                        <input type="hidden" name='book_price' value="<?php echo $fetch['Price'] ?>">
                        <input type="hidden" name='book_image' value="<?php echo $fetch['Image'] ?>">
                        <input type="Submit" class= "submit_btn cart_btn" value="Add To Cart" name='add_to_cart'>
                    </div>
</form>
<?php
    }
}else{
    echo "No Books";
}

?>
               
            </div>
        </section>
    </div>
    
</body>
</html>