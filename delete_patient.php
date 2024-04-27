<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `tbl_patient` WHERE patient_id = $id";
        $conn->query($sql);
    }
    header('location:./patient.php');
    exit;
?>
