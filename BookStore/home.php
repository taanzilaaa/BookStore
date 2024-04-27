<?php
session_start();
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER profile_dashboard</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h2>HOME</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Add Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="view_books.php">View Books</a> </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="review.php">Write Review</a>
                    </li>
            
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="search.php">Search<i class="fas fa-search"></i></a>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="login.php">LogIn/Logout</a>
            
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        if (isset($_SESSION['name']) && isset($_SESSION['email'])):
        ?>
        <h1 class="head1">WELCOME to Your Profile!!</h1>
        <p style="color: green;">You are logged in <h2><?=($_SESSION['name']) ?></h2></p>
        <p><b>Email:</b> <?=($_SESSION['email']) ?></p>
        <p><b>UserID:</b> <?=($_SESSION['id']) ?></p>
        <p><b>User's Phone no:</b><?=($_SESSION['number']) ?></p>
        <p><a href="logout.php">Logout</p>
        <?php endif; ?>

        <!-- Display Books Section -->
        <section class="display_books">
            <table>
                <thead>

                </thead>
                <tbody>
                    <?php
                    $display_product = mysqli_query($conn, "SELECT * FROM product");
                    $num = 1;
                    if (mysqli_num_rows($display_product) > 0):
                        while ($row = mysqli_fetch_assoc($display_product)):
                    ?>
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><img src="images/<?php echo $row['Image'] ?>" alt=<?php echo $row['Name'] ?>></td>
                        <td><?php echo $row['Name'] ?></td>
                         
                    
                    </tr>
                    <?php
                        $num++;
                        endwhile;
                    else:
                        echo "<tr><td colspan='5'>No Books Available</td></tr>";
                    endif;
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
