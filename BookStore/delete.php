<?php
include 'dbconnect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query= mysqli_query($conn,"DELETE FROM product WHERE id=$delete_id") or die("Query Failed");
    if($delete_query){
        echo 'Book Removed';
        header('Location: view_books.php');
        exit; 
    } else {
        echo 'Book Not Removed';
        header('Location: view_books.php');
        exit; // Added exit to stop further execution
    }
}
?>
