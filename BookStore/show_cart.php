<?php include 'dbconnect.php';
if(isset($_POST['update_cart_quantity'])){
    $update_value= $_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    $update_quantity_query=mysqli_query($conn, "update cart set quantity=$update_value where id=$update_id");
    if($update_quantity_query){
        header('location:show_cart.php');
    }
}

if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    mysqli_query($conn,"DELETE FROM cart WHERE id=$remove_id");
    header('Location: show_cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php include('header.php') ?>
<div class="container">
    <section class="shopping_cart">
        <h1 class="heading">My Cart</h1>
        <table>
            <?php
            $select_cart_products=mysqli_query($conn, "Select * from cart");
            $num=1;
            $grand_total=0;
            if(mysqli_num_rows($select_cart_products)>0){
                echo "<thead>
                <th>Sl No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>";
            while($fetch_cart_product=mysqli_fetch_assoc($select_cart_products)){
                ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $fetch_cart_product['name'] ?> </td>
                    <td><img src="images/<?php echo $fetch_cart_product['image']; ?>"></td>

                    <td><?php echo $fetch_cart_product['price'] ?>/- </td>
                    <td>
                        <form action="" method= "post">
                            <input type="hidden" value="<?php echo $fetch_cart_product['id'] ?>" name="update_quantity_id">
                        <div class="quantity_box">
                        
                        <input type="number" min="1" value="<?php echo $fetch_cart_product['quantity'] ?>" name= "update_quantity">
                        <input type="submit" class="update_quantity" value="Update" name="update_cart_quantity">


                        </div>
                        </form>
                    </td>
                    <td><?php echo $subtotal=($fetch_cart_product['price']*$fetch_cart_product['quantity'] )?>/- </td>
                    <td>
                        <a href="show_cart.php?remove=<?php echo $fetch_cart_product['id']?>" onclick="return confirm('Are You Sure?')">
                            <i class= "fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

            <?php
            $grand_total= $grand_total+($fetch_cart_product['price']*$fetch_cart_product['quantity']);
            $num++;
            }
            }else{
                echo 'No Product';
            }
            




?>

            <tbody>
                
            </tbody>
        </table>

        <div class="table_bottom">
            <a href="cart.php" class="bottom_btn">Continue Shopping</a>
            <h3 class="bottom_btn">Grand Total: <span><?php echo $grand_total ?></span></h3>
            <a href="checkout.php" class="bottom_btn">Proceed To Checkout</a>
        </div>

        <a href="" class= "delete_all_btn">
            <i class="fas fa-trash"></i>Delete All
        </a>
    </section>
</div>
    
</body>
</html>