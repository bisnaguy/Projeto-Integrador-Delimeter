<?php

class Database {

    private $host = "localhost";
    private $port = '3306';
    private $user = "root";
    private $pass = "admin123";
    private $dbname = "delimeter";
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
//            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";unix_socket=/var/run/mysqld/mysqld.sock", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }
}