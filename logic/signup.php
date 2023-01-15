<?php      
include 'conn.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($username) && !empty($password)){
        $sql = "INSERT INTO employee(name, email, phone, username, password) VALUES(?, ? ,?, ?, ?)";
        $prep_sql = $con->prepare($sql);
        $prep_sql->bind_param('ssiss', $name, $email, $phone, $username, $password);
        $prep_sql->execute();
        $prep_sql->close();

        session_start();
        $_SESSION['name'] = $name;

        header("Location: ../patients.php");
        exit();
    }else{
        header("Location: ../register.php?error=empty");
        exit();
    }
}