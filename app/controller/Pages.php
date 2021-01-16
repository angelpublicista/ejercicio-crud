<?php

class Pages extends Controller{
    public function __construct(){
    }

    public function index(){

        $data = [
            "title" => "Inicio"
        ];
        // Cargamos métodos del modelo
        $this->view("pages/home", $data);
    }

}