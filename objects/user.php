<?php
// Creat user objects
class User{

    // Database connection and table name
    private $conn;
    private $table_name = "users";
    // Object/User properties
    public $id;
    public $uname;
    public $email;
    public $password;
    public $access_level;
    public $created;
    // user constructor
    public function __construct($db){
        $this->conn = $db;
    }
    public function emailExists(){
        // query to check if email exists
        $query = "SELECT id, uname, access_level, password
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";
    
        
        $stmt = $this->conn->prepare( $query ); // prepare the query
        $this->email=htmlspecialchars(strip_tags($this->email)); // sanitize
        $stmt->bindParam(1, $this->email);// bind given email value
        $stmt->execute();// execute the query
        $num = $stmt->rowCount();// get number of rows
    
        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // assign values to object properties
            $this->id = $row['id'];
            $this->uname = $row['uname'];
            $this->access_level = $row['access_level'];
            $this->password = $row['password'];
            // return true because email exists in the database
            return true;
        }
        // return false if email does not exist in the database
        return false;
    }

    public function create(){

        // to get time stamp for 'created' field
        $this->created=date('Y-m-d H:i:s');

        // insert query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    uname = :uname,
                    email = :email,
                    password = :password,
                    access_level = :access_level,
                    created = :created";

        // prepare the query for binding
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->uname=htmlspecialchars(strip_tags($this->uname));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->access_level=htmlspecialchars(strip_tags($this->access_level));

        // bind the values
        $stmt->bindParam(':uname', $this->uname);
        $stmt->bindParam(':email', $this->email);

        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        $stmt->bindParam(':access_level', $this->access_level);
        $stmt->bindParam(':created', $this->created);

        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }else{
            $this->showError($stmt);
            return false;
        }

    }
    public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }
}