<?php

class Users extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->userModel = $this->model('User');
    }

    public function index(){
        // Redirección a paginación
        redirectTo('/users/page/1');
    }

    public function page($num){
        if($num < 1){
            redirectTo('/users/page/1');
        }

        $users = $this->userModel->allUsers();
        $post_per_page = 5;

        $data_query = [
            "post_per_page" => $post_per_page,
            "current_page" => $num
        ];

        $users_pagination = $this->userModel->usersPagination($data_query);
        

        $data = [
            "users" => $users_pagination['user_data'],
            "title" => "Usuarios",
            "rows"  => $users['data_count'],
            "post_per_page" => $post_per_page,
            "pages" => ceil(intval($users['data_count']) / $post_per_page),
            "current_page" => $num,
            "show_results" => $users_pagination['data_count']
        ];

        if($num > $data['pages']){
            redirectTo('/users/page/1');
        }
        // Cargamos métodos del modelo
        $this->view("pages/users", $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = [
                'email' => $_POST['email'],
                'name'  => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'phone' => trim($_POST['phone']),
                'password' => $_POST['password'],
                'id_role' => intval($_POST['role']),
                'title' => 'Agregar usuario'
            ];

            if($this->userModel->addUser($data)){
                redirectTo('/users/page/1');
            }else {
                die('Algo salió mal');
            }   
        } else {
           $data = [
            'email' => '',
            'name'  => '',
            'last_name' => '',
            'phone' => '',
            'password' => '',
            'id_role' => '',
            'title' => 'Agregar usuario'
           ];

           $this->view('/pages/add', $data);
        }

    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'id_user' => $id,
                'email' => $_POST['email'],
                'name'  => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'phone' => trim($_POST['phone']),
                'password' => $_POST['password'],
                'id_role' => intval($_POST['role']),
                'title' => 'Actualizar usuario'
            ];

            if($this->userModel->updateUser($data)){
                redirectTo('/users/page/1');
            }else {
                die('Algo salió mal');
            }
        } else {
            $user = $this->userModel->userById($id);
            $data = [
                'id_user' => $id,
                'user'    => $user,
                'title'   => "Actualizar usuario"
            ];

            $this->view("pages/update", $data);
        }
    }


    public function delete($id){
        if($this->userModel->deleteUser($id)){
            redirectTo('/users');
        }else {
            die('Algo salió mal');
        }
    }

    public function sendMail($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                "title" => "Enviar email",
                "user"  => '',
                "id_user" => $id,
                'from' => trim($_POST['from']),
                'to'   => trim($_POST['to']),
                'message' => filter_var($_POST['message'],FILTER_SANITIZE_STRING),
                'affair' => filter_var($_POST['affair'],FILTER_SANITIZE_STRING)
            ];

            if($this->userModel->sendMailUser($data)){
                redirectTo('/users');
            } else {
                die('Algo salió mal');
            }
        } else {
            $user = $this->userModel->userById($id);

            $data = [
                "title" => "Enviar email",
                "user"  => $user,
                "id_user" => $id,
                'from' => '',
                'to'   => '',
                'message' => '',
                'affair' => ''
            ];

        }

        

        $this->view("pages/sendMail", $data);
    }

}