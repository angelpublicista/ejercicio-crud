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

    public function importUsers($data){
        $allowed_extension = array('xls', 'csv', 'xlsx');
        $file_array = explode(".", $data['file']['name']);
        $file_ext = end($file_array);
        $file_dir = ROUTE_APP . "/uploads";


        if(in_array($file_ext, $allowed_extension)){
            # Crear si no existe
            if (!is_dir($file_dir)) {
                mkdir($file_dir, 0777, true);
            }

            $file_info = $data['file'];
            $file_tmp = $file_info['tmp_name'];
            $file_name = "import_" . date('Y-m-d'). "_" .date('H-i-s');

            $file_location = $file_dir . "/" . $file_name . "." . $file_ext;

            $res = move_uploaded_file($file_tmp, $file_location);

            if($res == true){
                $doc = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_location);
                $info = $doc->getActivesheet()->toArray();
                $counter = 0;

                $return = false;

                foreach($info as $info_row){
                    // Omitimos la primera fila
                    $counter++;
                    $pass_hash = password_hash($info_row[6], PASSWORD_BCRYPT);
                    
                    if($counter > 1){

                        $query_user = 'SELECT email FROM gn_user WHERE email = :email';

                        $this->db->query($query_user);

                        $this->db->bind(":email", $info_row[1]);

                        // Comprobar si hay un usuario duplicado
                        if(!$this->db->register()){
                            $query = 'INSERT INTO gn_user(email, name, last_name, phone, id_role, password) VALUES (:email, :name, :last_name, :phone, :id_role, :password)';
                            $this->db->query($query);

                            $this->db->bind(":email", $info_row[1]);
                            $this->db->bind(":name", $info_row[2]);
                            $this->db->bind(":last_name", $info_row[3]);
                            $this->db->bind(":phone", $info_row[4]);
                            $this->db->bind(":id_role", $info_row[5]);
                            $this->db->bind(":password", $pass_hash);

                            if($this->db->execute()){
                               $return = true;
                            } else {
                               $return = false;
                            }
                        } 

                    }
                }

                return $return;

            } else {
                echo "Ocurrió algo";
            }
            // $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($data['file']['name']);
            // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

            // $spreadsheet = $reader->load($data['file']['tmp_name']);

            // $info = $spreadsheet->getActivesheet()->toArray();
        }
    }
}