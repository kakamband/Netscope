<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $mtitle =($_POST("search"));
        $squery = "SELECT * FROM movieinfo WHERE mtitle=$mtitle";
        $result = mysqli_query($conn,$squery);
        if(mysqli_num_rows($results)>0){
            while($row = mysqli_fetch_array($results)){
                $outputn .= '<h1 style="color:red">'.$row["mtitle"].'</h1>';
            }
            echo $outputn;
        }
        else{
            echo "Movie not found";
        }
    }
?>