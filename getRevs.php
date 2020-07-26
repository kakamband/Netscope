<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    $mid;

    $status=0;
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $mid = $_POST["mid"];
        $rev_query="SELECT * FROM reviews WHERE mid=".$mid." LIMIT 5";
        $rev_results = mysqli_query($conn,$rev_query);
        if(mysqli_num_rows($rev_results)>0){
            while($row = mysqli_fetch_array($rev_results)){
                $review .="<h6>@".$row["cusname"]." -</h6>
                            <p>".$row["review"]."</p>
                            <hr>";
            }
            echo $review;
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
        }
        mysqli_close($conn);
    }
?>