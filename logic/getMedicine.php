<?php
include 'conn.php';

$sql = "SELECT * FROM drugs";
if ($result = $con->query($sql)) {
    $medicine = array();
    while ($row = $result->fetch_assoc()) {
        array_push($medicine, $row);
    }
    echo json_encode(['medicine' => $medicine]);  
}