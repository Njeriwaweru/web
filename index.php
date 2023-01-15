<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>
        <h1>Pharmarcy Management System</h1>

        <form class="form" action="logic/checklogin.php" method="GET">
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
            <div class="logInputs">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="logInputs">                
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" name = "submit" class="button">Log in</button>
        </form>

        <div class="getAccount">Don't have an account? <a href="register.php">Register</a></div>
    </div>
</body>
</html>