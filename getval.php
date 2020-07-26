<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $priceT1;
    $priceT7;
    $priceP;
    
    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        //GET PRICES FROM DB
        $output="";
        $mid = $_POST["mid"];
        if($mid !=""){
            $search_query = "SELECT * FROM movieinfo WHERE mid=".$mid."";
            $results = mysqli_query($conn,$search_query);
            if(mysqli_num_rows($results)>0){
                while($row = mysqli_fetch_array($results)){
                    $priceT1=$row['priceT1'];
                    $priceT7=$row['priceT7'];
                    $priceP=$row['priceP'];
                    $output .= "<h5>Get Permanent:</h5>
                                <button class='btn btn-primary btnPrice btn lg' onclick='sendCartP(".$priceP.")'>LKR. ".$priceP."</button>
                                <h5 class='days'><i class='fas fa-history'></i>&nbsp;&nbsp;7-day Rental:</h5>
                                <button class='btn btn-primary btnPrice btn lg' onclick='sendCart7(".$priceT7.")'>LKR. ".$row['priceT7']."</button>
                                <h5 class='days'><i class='fas fa-history'></i>&nbsp;&nbsp;1-day Rental:</h5>
                                <button class='btn btn-primary btnPrice btn lg' onclick='sendCart1(".$priceT1.")'>LKR. ".$row['priceT1']."</button>
                                ";
                }
                echo $output;
            }
        }else{
            echo "<h3>No Pricing Yet</h3>";
        }
        
    }
?>