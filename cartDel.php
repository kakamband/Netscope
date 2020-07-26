<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    $status=0;
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $del_id = $_POST["del_id"];
        $del_query = "SELECT title FROM cart WHERE id =".$del_id."";
        $del_query2 ="DELETE FROM cart WHERE id =".$del_id."";
        $del_results1 = mysqli_query($conn,$del_query);
        $row = mysqli_fetch_array($del_results1);
        $del_results2 =mysqli_query($conn,$del_query2);
        if($del_results2){
            echo "".$row['title']." removed from cart";
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
        }
        mysqli_close($conn);

    }
?>