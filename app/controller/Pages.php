<?php

class Pages extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->articuloModel = $this->model("Articulo");

    }

    public function index(){
        // Cargamos métodos del modelo
        $articulos = $this->articuloModel->obtenerArticulos();

        $data = [
            'articulos' => $articulos
        ];

        $this->view("pages/home", $data);
    }

    public function articulo(){
        echo "articulo";
    }

    public function actualizar($num_id){
        echo $num_id;
    }
}