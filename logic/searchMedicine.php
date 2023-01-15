<?php
include 'conn.php';


if(isset($_GET['search'])){
    $search = $_GET['search'];
    $search = "%$search%";
    
    $sql = "SELECT * FROM drugs WHERE MedicineName LIKE ? OR MedicineCode LIKE ?";
    $prep_sql = $con->prepare($sql);
    $prep_sql->bind_param('ss', $search, $search);
    $prep_sql->execute();
    if ($result = $prep_sql->get_result()) {
        $medicine = array();
        while ($row = $result->fetch_assoc()) {
            array_push($medicine, $row);
        }
        echo json_encode(['medicine' => $medicine]);  
    }
}