<?php

class Users extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->userModel = $this->model('User');
    }

    public function index(){
        $users = $this->userModel->allUsers();

        $data = [
            "users" => $users,
            "title" => "Usuarios"
        ];
        // Cargamos métodos del modelo
        $this->view("pages/users", $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = [
                'email' => $_POST['email'],
                'name'  => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'password' => $_POST['password'],
                'id_role' => intval($_POST['role']),
                'title' => 'Agregar usuario'
            ];

            if($this->userModel->addUser($data)){
                redirectTo('/users');
                echo "Exitoso";
            }else {
                die('Algo salió mal');
            }   
        } else {
           $data = [
            'email' => '',
            'name'  => '',
            'last_name' => '',
            'password' => '',
            'id_role' => '',
            'title' => 'Agregar usuario'
           ];

           $this->view('/pages/add', $data);
        }

    }

}