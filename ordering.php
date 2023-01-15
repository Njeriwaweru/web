<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="medicines.php">Medicines</a></li>
                <li><a href="ordering.php" class="active">Order</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="prescription.php">Prescribe</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>

        <h1>Ordering</h1>
        <form class="form" action="logic/order.php" method = "POST">
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'empty'){
                    echo '<div class="error">Please fill in all fields</div>';
                }
            }
            ?>
            <div class="inputs">
                <label for="name"><b>Medicine Name</b></label>
                <input type="text" id="name" name="name">
            </div>
            <div class="inputs">
                <label for="supplier"><b>Supplier</b></label>
                <input type="text" id="supplier" name="supplier">
            </div>
            <div class="inputs">
                <label for="quantity"><b>Desired Quantity</b></label>
                <input type="number" id="quantity" name="quantity">
            </div>
    
            <button class="button" type="submit" name="submit">Order</button>
        </form>

    </div>
</body>
</html>