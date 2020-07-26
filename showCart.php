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
        $uid = $_POST["uid"];
        $items_query ="SELECT * FROM cart WHERE cusid=".$uid." AND status=".$status."";
        $item_results = mysqli_query($conn,$items_query);
        if(mysqli_num_rows($item_results)>0){
            $items = "<script type='text/javascript'>
                        $('#cartico').css('color','red');
                        </script>";
            while($row = mysqli_fetch_array($item_results)){

                $items .="<li class='item' style='background-color:azure;padding: 0.5em'>
                            <div class='row'>
                                <div class='col-10'>
                                    <h5 class='cartItemName' style='color:black'><strong>".$row['title']."</strong></h5>
                                    <h6 class='catItemPrice' style='color:black'>Price: ".$row['price']."</h6>
                                </div>
                                <div class='col-2'>
                                    <button class='btnDel' style='color:red' onclick='delItem(this,".$row['id'].")'><i class='fas fa-window-close' style='color:red'></i></button>
                                </div>
                            </div>
                            </li>";
            }
            echo $items;
        }
        else{
            echo "No items in cart";
        }
        mysqli_close($conn);
    }
?>