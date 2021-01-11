<?php

function insertData($data){
    $data_explode = explode(',', $data);
    
    $values_data = "";

    foreach($data_explode as $data_exp){
        $values_data .= ":" .$data_exp . ", ";
    }

    var_dump($values_data);

    // // $sql = "INSERT INTO $table($data) VALUES ($values_data)";
    // // $stm = $connect_db->prepare($sql);
    // // $stm->execute();   
}