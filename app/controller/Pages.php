<?php

class Pages extends Controller{
    public function __construct(){
        // echo "Controlador Páginas";
    }

    public function index(){
        $this->view("pages/home");
    }

    public function articulo(){
        echo "articulo";
    }

    public function actualizar($num_id){
        echo $num_id;
    }
}