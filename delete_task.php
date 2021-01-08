<?php
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $sentence = $connect_db->query($query);

    if(!$sentence){
        die("Ha fallado");
    }

    $_SESSION["message"] = "Task delete succesfully";
    $_SESSION["message_type"] = "danger";

    header("Location: index.php");
}