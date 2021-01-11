<?php

class Pages extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->userModel = $this->model('User');
    }

    public function index(){
        $users = $this->userModel->allUsers();

        $data = [
            "users" => $users
        ];
        // Cargamos métodos del modelo
        $this->view("pages/home", $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = [
                'email' => $_POST['email'],
                'name'  => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'password' => $_POST['password']
            ];

            if($this->userModel->addUser($data)){
                redirectTo('pages');
            }else {
                die('Algo salió mal');
            }   
        } else {
           $data = [
            'email' => '',
            'name'  => '',
            'last_name' => '',
            'password' => ''
           ];

           $this->view('pages/add', $data);
        }

    }

}