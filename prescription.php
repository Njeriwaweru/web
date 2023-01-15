<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
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
                <li><a href="#" class="active">Prescribe</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>
        <h1>Prescription</h1>
        <form class="form" action="logic/prescribe.php" method="POST">
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
            <div class="namesInputs">
                <div class="prescInput">                
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" id="fname" name="fname">
                </div>
                <div class="prescInput">                
                    <label for="lname"><b>Last Name</b></label>
                    <input type="text" id="lname" name="lname">
                </div>
            </div>
            <div class="prescInput">                
                <label for="ailment"><b>Ailment</b></label>
                <input type="text" id="ailment" name="ailment">
            </div>
            <div class="prescInput">
                <label for="gender"><b>Gender</b></label>
                <select id="gender" name="gender">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="prescInput">
                <label for="pstate"><b>Patient State</b></label>
                <select id="pstate" name="pstate">
                    <option value="inpatient">Inpatient</option>
                    <option value="outpatient">Outpatient</option>
                </select>
            </div>
            <div class="prescInput">
                <label for="phone"><b>Phone Number</b> </label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="prescInput">                
                <label for="drug"><b>Drug</b></label>
                <input type="text" id="drug" name="drug">
            </div>
            <div class="prescInput">                
                <label for="med"><b>Prescription</b></label>
                <input type="text" id="med" name="med">
            </div>
            <div class="prescInput">                
                <label for="quantity"><b>Quantity</b></label>
                <input type="number" id="quantity" name="quantity">
            </div>

            <button class="button" name="submit" type="submit" style="margin-bottom: 120px;">Prescribe</button>
        </form>
    </div>
    </body>
</html>