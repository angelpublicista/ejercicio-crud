<?php

class Pages extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->userModel = $this->model('User');
    }

    public function index(){
        $users = $this->userModel->allUsers();

        $data = [
            "title" => "Inicio"
        ];
        // Cargamos métodos del modelo
        $this->view("pages/home", $data);
    }

}