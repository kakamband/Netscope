<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $uid;
    $statuso=0;
    $status=1;
    
    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $uid = $_POST["uid"];
        $approve_query="UPDATE orders SET status=".$status." WHERE cusid=".$uid." ";
        $cart_query="UPDATE cart SET status=".$status." WHERE cusid=".$uid." ";
        $migrate_query="INSERT usermovie(cusid,mid,title,type)
                        SELECT cusid,mid,title,type
                        FROM cart
                        WHERE cusid=".$uid." AND status=".$statuso."";
        $migrate_result=mysqli_query($conn,$migrate_query);
        if($migrate_result){
            $cart_results=mysqli_query($conn,$cart_query);
            if($cart_results){
                $approve_results=mysqli_query($conn,$approve_query);
                if($approve_results){
                    echo "Payment of User: ".$uid." has been approved";
                }
            }
            else{
                echo ("ERROR Migrate:\n".mysqli_error($conn));
            }
        }
        else{
            echo ("ERROR Cart UPDATE:\n".mysqli_error($conn));
        }
    }
?>