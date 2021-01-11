<?php

class Database {
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        // Configurar conexión
        $dsn = "mysql:host" . $this->db_host . ";dbname" . $this->db_name;
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Creando instancia PDO
        try{
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $opciones);
            $this->dbh->exec('set names utf8');
        } catch(PDOException $e) {
            $this->error = $e->get_message();
            echo $this->error;
        }
    }

}