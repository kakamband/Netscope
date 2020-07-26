<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    $mid;
    $uid;
    $mtitle;
    $price;
    $mtype;
    $status=0;
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{

        date_default_timezone_set('Asia/Colombo');
        
        //ADD and VIEW CART

        $mid = $_POST["mid"];
        $uid = $_POST["uid"];
        $price = $_POST["price"];
        $mtype = $_POST["mtype"];
        $mtitle = addslashes($_POST["mtitle"]);
        $created=date('Y-m-d H:i:s');
        $check_table_query="SELECT * FROM cart WHERE cusid=".$uid." AND mid=".$mid." AND type=".$mtype." AND status=".$status."";
        $check_results=mysqli_query($conn,$check_table_query);
        if($row = mysqli_num_rows($check_results)>0){
            echo "Movie is already in your cart";
        }
        else{
            $insert_query="INSERT INTO cart(cusid, mid, type, price, title,created)
                        VALUES ('$uid','$mid','$mtype','$price','$mtitle','$created')";
            $insert_results = mysqli_query($conn,$insert_query);
            if($insert_results){
                echo "".$mtitle." was added to your cart";
            }
            else{
                echo ("ERROR:\n".mysqli_error($conn));
                echo "\nAdding failed";
            }
        }
        mysqli_close($conn);

    }
?>