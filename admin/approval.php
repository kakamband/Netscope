<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $uid;
    $status=0;
    
    $conn=mysqli_connect($host,$username,$password,$db_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="approvals.js" type="text/javascript"></script>
    <title>Payment Approval</title>
</head>
    <style>
        tr{
            color:white;
        }
    </style>
<body>
    <h1 style="color:white">Payment Approval</h1>
    <div id="pay_details">
        <?php
            if(!$conn){
                die("Could Not Connect".mysqli_connect_error());
            }
            else{
                $orders_query="SELECT * FROM orders WHERE status=0";
                $orders = mysqli_query($conn,$orders_query);
                if(mysqli_num_rows($orders)>0){
                    $output = "<table>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Payment (LKR)</th>
                                        <th>Payemnt Method</th>
                                        <th>Payment Date</th>
                                        <th>Approval</th>
                                    </tr>
                                ";
                    while($row = mysqli_fetch_array($orders)){
                        $output .= "<tr>
                                        <td>".$row["orderid"]."</td>
                                        <td>".$row["cusid"]."</td>
                                        <td>".$row["uname"]."</td>
                                        <td>".$row["address"]."</td>
                                        <td>".$row["total"]."</td>
                                        <td>".$row["method"]."</td>
                                        <td>".$row["created"]."</td>
                                        <td><button class='btn btn-primary btn lg' onclick='approve(".$row["cusid"].")'>Approve</button></td>
                                    </tr>";
                    }
                }
                echo $output;
            }
        ?>
    </div>
</body>
</html>