<?php

include 'conn.php';

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $ailment = $_POST['ailment'];
    $prescription = $_POST['med'];
    $drug = $_POST['drug'];
    $pstate = $_POST['pstate'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];

    if(!empty($fname) && !empty($gender) && !empty($lname) && !empty($ailment) && !empty($pstate) && !empty($phone) && !empty($prescription)  && !empty($drug) && !empty($quantity)){
        $sql = "INSERT INTO prescription(FirstName, LastName, gender, Ailment, drug ,phone, pstate, Prescription, Quantity) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $prep_sql = $con->prepare($sql);
        $prep_sql->bind_param('ssssssssi', $fname, $lname, $gender, $ailment, $drug, $phone, $pstate, $prescription, $quantity);
        $prep_sql->execute();
        $prep_sql->close();

        header("Location: ../prescription.php?msg=success");
        exit();
    }else{
        header("Location: ../prescription.php?error=empty");
        exit();
    }
}