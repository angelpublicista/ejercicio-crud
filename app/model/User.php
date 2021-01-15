<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function allUsers(){
        $this->db->query("SELECT * FROM gn_user INNER JOIN gn_roles ON gn_user.id_role = gn_roles.id");

        return $this->db->registers();
    }

    public function addUser($data){
        $query = 'INSERT INTO gn_user(email, name, last_name, id_role, password) VALUES (:email, :name, :last_name, :id_role, :password)';

        $this->db->query($query);

        $pass_hash = password_hash($data["password"], PASSWORD_BCRYPT);

        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":name", $data["name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":id_role", $data["id_role"]);
        $this->db->bind(":password", $pass_hash);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}