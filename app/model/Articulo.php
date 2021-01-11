<?php

class Articulo{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function obtenerArticulos(){
        $this->db->query("SELECT * FROM task");

        return $this->db->registers();
    }
}