<?php include 'dbconnect.php';
if(isset($_POST["add_book"])){
    $product_name=$_POST['Book_name'];
    $product_price=$_POST['Book_price'];
    $product_image=$_FILES['Book_image']['name'];
    $product_image_temp_name=$_FILES['Book_image']['tmp_name'];
    $product_image_folder='images/'.$product_image;

    $insert_query=mysqli_query($conn, "insert into product (name,price,image) values('$product_name','$product_price', '$product_image')")or die('Insert query failed');
    if($insert_query){
        move_uploaded_file($product_image_temp_name, $product_image_folder);
        $display_message= 'Book inserted successfully';
    }else{
        $display_message= 'There is some error!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv= "X-UA-Compatible" content= "IE=edge">
    <title> Cart </title>
    <!-- css file-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php include('header.php') ?>

<!-- form part-->
<div class="container">
<?php
if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='fas fa-times' onclick=\"this.parentElement.style.display='none';\"></i>
</div>";
}
?>


    <section>
        <h3 class="heading">Add Books</h3>
        <form action="" class="add_book" method= "post" enctype="multipart/form-data">
            <input type="text" name="Book_name" placeholder= "Enter Book Name" class="input_f" required>
            <input type="text" name="Book_genre" placeholder= "Enter Book Genre" class="input_f" required>
            <input type="number" name="Book_price" min="0" placeholder= "Enter Book Price" class="input_f" required>
            <input type="file" name="Book_image" class="input_f" required accept="image/png, image/jpg, image/jpeg">
            <input type="submit" name="add_book" class="submit_btn" value= "Add Books">
        </form>
    </section>
</div>

<!-- js-->
<script src="js/script.js"></script>
</body>
</html>