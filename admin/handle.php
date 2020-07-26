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

    echo "Connected to DB\n";

    date_default_timezone_set('Asia/Colombo');

    $src=($_POST["postero2"]);
    $mtitle=addslashes(($_POST["mtitle2"]));
    $mid=($_POST["mid"]);
    $price_p=($_POST["price_p"]);
    $price_7=($_POST["price_7"]);
    $price_1=($_POST["price_1"]);
    $created=date('Y-m-d H:i:s');

    $mquery="INSERT INTO movieinfo(mid,mtitle,src,pricep,priceT7,priceT1,created)VALUES('$mid','$mtitle','$src','$price_p','$price_7','$price_1','$created')";
    $result = mysqli_query($conn,$mquery);
    if($result){
        echo "Movie added";
    }
    else{
        echo ("ERROR:\n".mysqli_error($conn));
        echo "\nAdding failed";
    }
    mysqli_close($conn);

}
// function add_input($data){
//     $data = htmlspecialchars($data);
//     return $data;
// }

?>