<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $uid;
    $status=0;
    
    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $uid = $_POST["uid"];
        $total_query = "SELECT SUM(price) FROM cart WHERE cusid=".$uid." AND status=".$status."";
        $total = mysqli_query($conn,$total_query);
        if(mysqli_num_rows($total)>0){
            $row = mysqli_fetch_array($total);
            echo "<h4 class='cartTotal'><strong>Total: ".$row['SUM(price)']."</strong><h4>";
        }
        else{
            echo "Total: N/A";
        }
        mysqli_close($conn);
    }
    

?>