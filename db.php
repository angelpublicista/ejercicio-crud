<?php
require "config.php";

try{
    $connect_db = new PDO('mysql:host='.$database["db_host"].'; dbname='.$database["db_name"].'', $database["db_user"], $database["db_pass"]);
    $connect_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect_db->exec("SET CHARACTER SET utf8");
    // echo "Conexión OK";
} catch (Exception $e) {
    die("Error " . $e->GetMessage());
}



// var_dump($conect_db);