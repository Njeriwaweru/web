<?php

include 'conn.php';

if(isset($_POST['submit'])){
    $code = $_POST['code'];
    $name = $_POST['name'];
    $quantity = $_POST['quant'];
    $supplier = $_POST['supplier'];

    if(!empty($code) && !empty($name) && !empty($quantity) && !empty($supplier)){
        $sql = "INSERT INTO drugs(MedicineName, Quantity, MedicineCode, supplier) VALUES(?, ?, ?, ?)";
        $prep_sql = $con->prepare($sql);
        $prep_sql->bind_param('siss', $name, $quantity, $code, $supplier);
        $prep_sql->execute();
        $prep_sql->close();

        header("Location: ../add_med.php?msg=success");
        exit();
    }else{
        header("Location: ../add_med.php?error=empty");
        exit();
    }
}