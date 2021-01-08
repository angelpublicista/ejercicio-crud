<?php
include "db.php";

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES (?,?)";
    $sentence = $connect_db->prepare($query);
    $sentence->execute([$title, $description]);

    if(!$sentence){
        die("Ha fallado");
    }

    $_SESSION["message"] = "Task save succesfully";
    $_SESSION["message_type"] = "success";

    header("Location: index.php");
    
}