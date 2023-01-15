<?php

include 'conn.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];

    if(!empty($name) && !empty($supplier) && !empty($quantity)){
        $sql = "INSERT INTO orders(Name, Quantity, supplier) VALUES(?, ?, ?)";
        $prep_sql = $con->prepare($sql);
        $prep_sql->bind_param('sis', $name, $quantity, $supplier);
        $prep_sql->execute();
        $prep_sql->close();

        header("Location: ../ordering.php?msg=success");
        exit();
    }else{
        header("Location: ../ordering.php?error=empty");
        exit();
    }
}