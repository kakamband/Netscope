<?php
//mysql database connection
class Database{

    // Database credentials
    private $host = "localhost";
    private $db_name = "netscopedb";
    private $username = "root";
    private $password = "root";
    public $conn;

    // connect to database
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>