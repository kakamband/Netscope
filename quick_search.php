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
    $output ='';
    if($_POST["search"] !=""){
        $search_query = "SELECT * FROM movieinfo WHERE mtitle LIKE '%".$_POST["search"]."%'";
        $results = mysqli_query($conn,$search_query);
        if(mysqli_num_rows($results)>0){

            $output .='<div class="table-responsive">
                        <table class="table">';

        while($row = mysqli_fetch_array($results)){
            $output .='
                        <tr>
                        <td><img src='.$row["src"].' height="300" width="200" title='.$row["mtitle"].'></td>
                        <td><h2 id="result'.$row["mid"].'" class="searchRes" style="color:red;cursor: pointer" onclick="showID('.$row["mid"].')">'.$row["mtitle"].'</h2></td>
                        </tr>';
        }
        echo $output;
        }
        else{
            echo "Movie not found";
        }
    }
    
}

?>