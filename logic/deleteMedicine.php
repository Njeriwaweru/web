<?php

include 'conn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM drugs WHERE ID = ?";
    $prep_sql = $con->prepare($sql);
    $prep_sql->bind_param('i', $id);
    $prep_sql->execute();
    $prep_sql->close();

    echo json_encode(['msg' => "done"]);
}