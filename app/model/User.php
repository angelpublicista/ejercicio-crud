<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function allUsers(){
        $query = "SELECT * FROM gn_user INNER JOIN gn_roles ON gn_user.id_role = gn_roles.id_role";
        $this->db->query($query);
        
        $res = [
            'user_data' => $this->db->registers(),
            'data_count' => $this->db->rowCount()
        ];

        return $res;
    }

    public function usersPagination($params){
        $init =  intval(($params["current_page"] - 1) * $params["post_per_page"]);
        $end = intval($params["post_per_page"]);

        $query = "SELECT * FROM gn_user INNER JOIN gn_roles ON gn_user.id_role = gn_roles.id_role LIMIT :init, :end";
        $this->db->query($query);

        $this->db->bind(":init", $init);
        $this->db->bind(":end", $end);

        $this->db->execute();
        
        $res = [
            'user_data' => $this->db->registers(),
            'data_count' => $this->db->rowCount()
        ];

        return $res;
    }

    public function userById($id){
        $this->db->query("SELECT * FROM gn_user WHERE id = :id");

        $this->db->bind(":id", $id);

        return $this->db->register();
    }

    public function addUser($data){
        $query = 'INSERT INTO gn_user(email, name, last_name, phone, id_role, password) VALUES (:email, :name, :last_name, :phone, :id_role, :password)';

        $this->db->query($query);

        $pass_hash = password_hash($data["password"], PASSWORD_BCRYPT);

        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":name", $data["name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":phone", $data["phone"]);
        $this->db->bind(":id_role", $data["id_role"]);
        $this->db->bind(":password", $pass_hash);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($data){
        $query = 'UPDATE gn_user SET email=:email, name=:name, last_name=:last_name, phone=:phone, id_role=:id_role, password=:password WHERE id=:id';

        $this->db->query($query);

        $pass_hash = password_hash($data["password"], PASSWORD_BCRYPT);

        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":name", $data["name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":phone", $data["phone"]);
        $this->db->bind(":id_role", $data["id_role"]);
        $this->db->bind(":password", $pass_hash);
        $this->db->bind(":id", $data["id_user"]);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id){
        $query = 'DELETE FROM gn_user WHERE id = :id';
        $this->db->query($query);

        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    public function sendMailUser($data){
        $from = $data['from'];
        $to = $data['to'];
        $affair = $data['affair'];
        $message = $data['message'];
        $headers = 'From: '.$from.'' . "\r\n" .
        'Reply-To: '.$from.'' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        if(mail($to, $affair, $message, $headers)){
            return true;
        } else {
            return false;
        }
    }
}