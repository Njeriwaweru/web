<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        <h1>Register</h1>
        <section id="register_container">
            <form class="form" action="logic/signup.php" method="POST">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'wrong'){
                        echo '<div class="error">Wrong username or password</div>';
                    }
                    elseif($_GET['error'] == 'empty'){
                        echo '<div class="error">Please fill in all fields</div>';
                    }
                }
                ?>
                <div class="regInputs">
                    <label for="name"><b>Name</b></label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="regInputs">                    
                    <label for="email"><b>Email</b> </label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="regInputs">                    
                    <label for="phone"><b>Tel_No</b></label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="regInputs">                    
                    <label for="username"><b>Username</b></label>
                    <input type="text" id="username" name="username">
                </div>

                <div class="regInputs">                    
                    <label for="password"><b>Password</b></label>
                    <input type="password" id="password" name="password">
                </div>

                <button class="button" style="margin-top: 20px;" type="submit" name="submit">Register</button>
            </form>

            <div class="getAccount" style="margin-bottom: 130px; margin-top: 50px; text-align: center;">Already have an account? <a href="index.php">Log in</a></div>
        </section>
    </div>
</body>
</html>