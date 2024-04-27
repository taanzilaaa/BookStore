<?php 
include 'dbconnect.php';

if(isset($_GET['query'])) {
    $search_query = $_GET['query'];

    $sql = "SELECT * FROM product WHERE 
            name LIKE '%$search_query%' OR 
            genre LIKE '%$search_query%'";


    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<a href='cart.php?name=" . urlencode($row['Name']) . "'>" . $row['Name'] . "</a>";
            echo  $row["Genre"]; 
            echo "<img src='images/" . $row["Image"] . "' alt='" . $row["Name"] . "'>";
        }
    } else {
        echo "No results found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">

    <title>Search Books</title>
</head>
<body>
    <h1>Search Books</h1>
    <form action="" method="GET">
        <label for="query">Search:</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
