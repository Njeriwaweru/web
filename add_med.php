<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add medicine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="medicines.php">Medicines</a></li>
                <li><a href="ordering.php">Orders</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="prescription.php">Prescribe</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>

        <h1>Add Medicine</h1>
        <form class="form" action="logic/med.php" method="POST">
             <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'empty'){
                    echo '<div class="error">Please fill in all fields</div>';
                }
            }
            ?>
            <?php
            if(isset($_GET['msg'])){
                if($_GET['msg'] == 'success'){
                    echo '<div class="success">The data has been entered</div>';
                }
            }
            ?>
            <label for="code"><b>Medicine Code</b></label>
            <input type="text" id="code" name="code">

            <label for="name"><b>Medicine Name</b></label>
            <input type="text" id="name" name="name">

            <label for="quant"><b>Quantity</b></label>
            <input type="number" id="quant" name="quant">

            <label for="supplier"><b>Supplier</b></label>
            <input type="text" id="supplier" name="supplier">

            <button name="submit" type="submit" class="button">Add</button>
        </form>
    </body>
</html>