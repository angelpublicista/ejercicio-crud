<?php

class Plans extends Controller{
    public function __construct(){
        // Cargamos los modelos a usar
        $this->userModel = $this->model('Plan');
    }

    public function index(){
        // Redirección a paginación
        redirectTo('/plans/page/1');
    }

    public function page($num){
        if($num < 1){
            redirectTo('/plans/page/1');
        }

        $plans = $this->userModel->allplans();
        $post_per_page = 5;

        $data_query = [
            "post_per_page" => $post_per_page,
            "current_page" => $num
        ];

        $plans_pagination = $this->userModel->plansPagination($data_query);
        

        $data = [
            "plans" => $plans_pagination['plan_data'],
            "title" => "Usuarios",
            "rows"  => $plans['data_count'],
            "post_per_page" => $post_per_page,
            "pages" => ceil(intval($plans['data_count']) / $post_per_page),
            "current_page" => $num,
            "show_results" => $plans_pagination['data_count']
        ];

        if($num > $data['pages']){
            redirectTo('/plans/page/1');
        }
        // Cargamos métodos del modelo
        $this->view("pages/plans", $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = [
                'plan_name' => $_POST['plan_name'],
                'plan_value_base_month'  => intval($_POST['plan_value_base_month']),
                'plan_discount_base_year_customer' => intval($_POST['plan_discount_base_year_customer']),
                'plan_discount_base_year_ally' => intval($_POST['plan_discount_base_year_ally']),
                'plan_disk_space' => $_POST['plan_disk_space'] . " MB",
                'plan_bandwidth' => $_POST['plan_bandwidth'] . " MB",
                'plan_num_db' => intval($_POST['plan_num_db']),
                'plan_num_domains' => intval($_POST['plan_num_domains']),
                'plan_num_subdomains' => intval($_POST['plan_num_subdomains']),
                'title' => 'Agregar plan'
            ];

            if($this->userModel->addPlan($data)){
                redirectTo('/plans/page/1');
            } else {
                $data = [
                    "message" => "No se pudo insertar el plan en la base de datos"
                ];
                $this->view('/pages/error', $data);
            }   
        } else {
           $data = [
            'plan_name' => '',
            'plan_value_base_month'  => '',
            'plan_discount_base_year_customer' => '',
            'plan_discount_base_year_ally' => '',
            'plan_disk_space' => '',
            'plan_bandwidth' => '',
            'plan_num_db' => '',
            'plan_num_domains' => '',
            'plan_num_subdomains' => '',
            'title' => 'Agregar plan'
           ];

           $this->view('/pages/addPlan', $data);
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
                redirectTo('/plans/page/1');
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
            redirectTo('/plans');
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
                redirectTo('/plans');
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

    public function import(){
       if($_SERVER['REQUEST_METHOD'] == "POST" && $_FILES['file_plans']['name'] != ''){
           $data = [
               'file' => $_FILES['file_plans']
           ];

           if($this->userModel->importplans($data)){
                redirectTo('/plans');
           } else {
                $data = [
                    "message" => "No se pudo importar el archivo"
                ];
                $this->view('/pages/error', $data);
           }
       } else {
            redirectTo('/plans');
       }
    }

}