<?php

class Plan{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function allplans(){
        $query = "SELECT * FROM gn_plan_hosting";
        $this->db->query($query);
        
        $res = [
            'plan_data' => $this->db->registers(),
            'data_count' => $this->db->rowCount()
        ];

        return $res;
    }

    public function plansPagination($params){
        $init =  intval(($params["current_page"] - 1) * $params["post_per_page"]);
        $end = intval($params["post_per_page"]);

        $query = "SELECT * FROM gn_plan_hosting LIMIT :init, :end";
        $this->db->query($query);

        $this->db->bind(":init", $init);
        $this->db->bind(":end", $end);

        $this->db->execute();
        
        $res = [
            'plan_data' => $this->db->registers(),
            'data_count' => $this->db->rowCount()
        ];

        return $res;
    }

    public function planById($id){
        $this->db->query("SELECT * FROM gn_plan_hosting WHERE id = :id");

        $this->db->bind(":id", $id);

        return $this->db->register();
    }

    public function addPlan($data){

        $query_plan = 'SELECT email FROM gn_plan_hosting WHERE plan_name = :plan_name';

        $this->db->query($query_plan);

        $this->db->bind(":email", $data["plan_name"]);

        if(!$this->db->register()){
            $query = 'INSERT INTO gn_plan_hosting(plan_name, plan_value_base_month, plan_discount_base_year_customer, plan_discount_base_year_ally, plan_disk_space, plan_bandwidth, plan_num_db, plan_num_domains, plan_num_subdomains) VALUES (:plan_name, :plan_value_base_month, :plan_discount_base_year_customer, :plan_discount_base_year_ally, :plan_disk_space, :plan_bandwidth, :plan_num_db, :plan_num_domains, :plan_num_subdomains)';

            $this->db->query($query);

            $this->db->bind(":plan_name", $data["plan_name"]);
            $this->db->bind(":plan_value_base_month", $data["plan_value_base_month"]);
            $this->db->bind(":plan_discount_base_year_customer", $data["plan_discount_base_year_customer"]);
            $this->db->bind(":plan_discount_base_year_ally", $data["plan_discount_base_year_ally"]);
            $this->db->bind(":plan_disk_space", $data["plan_disk_space"]);
            $this->db->bind(":plan_bandwidth", $data["plan_bandwidth"]);
            $this->db->bind(":plan_num_db", $data["plan_num_db"]);
            $this->db->bind(":plan_num_domains", $data["plan_num_domains"]);
            $this->db->bind(":plan_num_subdomains", $data["plan_num_subdomains"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updatePlan($data){
        $query = 'UPDATE gn_plan_hosting SET email=:email, name=:name, last_name=:last_name, phone=:phone, id_role=:id_role, password=:password WHERE id=:id';

        $this->db->query($query);

        $pass_hash = password_hash($data["password"], PASSWORD_BCRYPT);

        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":name", $data["name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":phone", $data["phone"]);
        $this->db->bind(":id_role", $data["id_role"]);
        $this->db->bind(":password", $pass_hash);
        $this->db->bind(":id", $data["id_plan"]);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deletePlan($id){
        $query = 'DELETE FROM gn_plan_hosting WHERE id = :id';
        $this->db->query($query);

        $this->db->bind(":id", $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

}