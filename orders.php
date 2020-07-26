<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    $uid;
    $status=0;
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        date_default_timezone_set('Asia/Colombo');
        $uid = $_POST["uid"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $method = $_POST["method"];
        $created=date('Y-m-d H:i:s');
        $total_amount;
        $total_query = "SELECT SUM(price) FROM cart WHERE cusid=".$uid." AND status=".$status."";
        $total = mysqli_query($conn,$total_query);
        if(mysqli_num_rows($total)>0){
            $row = mysqli_fetch_array($total);
            $total_amount=$row['SUM(price)'];
            $insert_query="INSERT INTO orders(cusid,uname,address,total,status,created,method)
                            VALUES('$uid','$name','$address','$total_amount','$status','$created','$method')";

            $insert_result=  mysqli_query($conn,$insert_query);
            if($insert_result){
                echo "Your payment of LKR ".$total_amount." is pending, The movies will be added to your library when the payment has been accepted";
            }
            else{
                echo "\nPayment Failed";
            }
        }
        mysqli_close($conn);
    }
?>