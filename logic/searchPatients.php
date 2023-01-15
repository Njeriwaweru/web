<?php
include 'conn.php';

$search = $_GET['search'];
$search = "%$search%";

$sql = "SELECT * FROM prescription WHERE FirstName LIKE ? OR LastName = ?";
$prep_sql = $con->prepare($sql);
$prep_sql->bind_param('ss', $search, $search);
$prep_sql->execute();
if ($result = $prep_sql->get_result()) {
    $patients = array();
    while ($row = $result->fetch_assoc()) {
        array_push($patients, $row);
    }
    echo json_encode(['patients' => $patients]);  
}