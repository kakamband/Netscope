<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    $uid;
    $mid;
    $rev;
    $uname;
    $status=0;
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        date_default_timezone_set('Asia/Colombo');
        $uid = $_POST["uid"];
        $mid = $_POST["mid"];
        $rev = $_POST["rev"];
        $created=date('Y-m-d H:i:s');
        $name_query="SELECT uname FROM users WHERE id=".$uid."";
        $name_results=mysqli_query($conn,$name_query);
        $row = mysqli_fetch_array($name_results);
        $uname = $row['uname'];
        $rev_query="INSERT INTO reviews(cusid,mid,cusname,review,created)
                    VALUES('$uid','$mid','$uname','$rev','$created')";

        $rev_results=mysqli_query($conn,$rev_query);
        if($rev_results){
            echo "Your has been added";
        }else{
            echo "Error review was not added";
            echo ("ERROR:\n".mysqli_error($conn));
        }
        mysqli_close($conn);

    }
?>