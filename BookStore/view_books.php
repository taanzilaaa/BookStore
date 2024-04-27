<?php include 'dbconnect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php include('header.php') ?>

    <div class="container">
        <section class="display_books">
            <table>
                <thead>
                    <th>Sl No</th>
                    <th>Book Image</th>
                    <th>Book Name</th>
                    <th>Book Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
$display_product= mysqli_query($conn, "Select * from product");
$num=1;
if(mysqli_num_rows($display_product)>0){
    // fetch data
    while($row= mysqli_fetch_assoc($display_product)){

    ?> 
     <tr>
                        <td><?php echo $num ?></td>
                        <td><img src="images/<?php echo $row['Image'] ?>" alt=<?php echo $row['Name'] ?>> </td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Price'] ?></td>
                        <td>
                            <a href="delete.php?delete=<?php echo $row['ID'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>
                        <a href="book_request.php?request=<?php echo $row['ID'] ?>" class="book_request_btn">
                    Request Book
                </a>
            </td>
                    </tr>
<?php
$num++;
    } 

}else{
    echo "No Books Available";
    
}

                    ?>
                   
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>