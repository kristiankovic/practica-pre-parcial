<?php

//clase para la conexion
class Database{

    private $host = "db";
    private $db_name = "test";
    private $username = "root";
    private $password = "rootpass";
    public $conn;

    public function getConn(){

        $this->conn = null;

        try{

            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

            $this->conn->exec("set names utf8");

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Conexión Establecida";
        }

        catch(PDOException $excep){

            echo "Error: " . $excep->getMessage();
        }

        return $this->conn;
    }
}

?>