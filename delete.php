<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `tbl_admin` where id=$id";
        $conn->query($sql);
    }
    header('location:./panel.php');
    exit;
?>