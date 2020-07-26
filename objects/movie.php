<?php

    class Movie{
    // Database connection and table name
    private $conn;
    private $table_name = "movieinfo";

    // Object/movie properties
    public $mid;
    public $mtitle;
    public $src;
    public $priceT1;
    public $priceT7;
    public $priceP;
    public $created;

    // user constructor
    public function __construct($db){
        $this->conn = $db;
    }

    public function movieExists(){
        $query = "SELECT * FROM ".$this->$table_name."
                    WHERE mid = ?
                    LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $this->email=htmlspecialchars(strip_tags($this->mid));
        $stmt->bindParam(1, $this->mid);
        $stmt->execute();
        $num = $stmt->rowCount();

        if($num>0){
            return true;
        }
        return false;

    }
    
    public function addMovie(){
        $this->created=date('Y-m-d H:i:s');
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    mid = :mid,
                    mtitle = :mtitle,
                    src = :src,
                    priceT1 = :priceT1,
                    priceT7 = :priceT7,
                    priceP = :priceP
                    created = :created";
        
        $stmt = $this->conn->prepare($query);
        $this->mid=htmlspecialchars(strip_tags($this->mid));
        $this->mtitle=htmlspecialchars(strip_tags($this->mtitlr));
        $this->src=htmlspecialchars(strip_tags($this->src));
        $this->priceT1=htmlspecialchars(strip_tags($this->priceT1));
        $this->priceT7=htmlspecialchars(strip_tags($this->priceT7));
        $this->priceP=htmlspecialchars(strip_tags($this->priceP));

        $stmt->bindParam(':mid',$this->mid);
        $stmt->bindParam(':mtitle',$this->mtitle);
        $stmt->bindParam(':priceT1',$this->priceT1);
        $stmt->bindParam(':priceT7',$this->priceT7);
        $stmt->bindParam(':priceP',$this->priceP);
        $stmt->bindParam(':mid',$this->created);

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

?>