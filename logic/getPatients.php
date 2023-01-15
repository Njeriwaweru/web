<?php
include 'conn.php';

$sql = "SELECT * FROM prescription";
if ($result = $con->query($sql)) {
    $patients = array();
    while ($row = $result->fetch_assoc()) {
        array_push($patients, $row);
    }
    echo json_encode(['patients' => $patients]);  
}