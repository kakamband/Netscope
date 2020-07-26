<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://kit.fontawesome.com/569046a3ca.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="checkout.js" type="text/javascript"></script>
    <title>Checkout</title>
    <style type="text/css">
        h1, h2, h3, h4,h5,h6{
            color:white;
        }
        p{
            color:white;
        }
        div#load {
            position: relative;
            top: 2em;
            width: 98.8%;
            margin-left:1em;
            margin-right:2em;
        } 
        body{
            font-family: 'Poppins',sans-serif;
            background-color: #242424;
        }
        .payInfo{
            /* text-align:right; */
        }
        #finCheckout{
            margin-top:1em;
        }
        #orderDet{
            color:white;
        }
    </style>
</head>
<body>
<?php
        //session_start();
        $uid = isset($_GET['id']) ? $_GET['id'] : "";
        
        echo "<input id='uid_in' type='hidden' value='".$uid."'>";
?>
    <h1 style="color:white">CHECKOUT</h1>
    <div id="orderDet">
    </div>
    <div class="row payDet">
    <div class='col-6 payMethods'>
        <h3>Payment Options</h3><br/>
        <h6 style="color:yellowgreen;">Bank Payments:</h6>
        <p>Direct payments can be done to NetScope Acc No:7707785 BoC Mihintale Branch and email the recipt to payments@netscope.com along with your username and Id. Mention Bank as payment method</p>
        <h6 style="color:yellowgreen;">eZ-Cash Payments:</h6>
        <p>eZ-Cash No: 077-2729729. Mention EZ along with the eZ-Cash reference number, username and id as payment method.</p>
    </div>
    <div class='col-6 payInfo'>
        <h4 id="orderTot"></h4>
        <h6>Name:</h6>
        <input id="in_name" type="text" size="35"><br><br>
        <h6>Billing Address:</h6>
        <input id="in_add" type="text" size="35"><br><br>
        <h6>Payment Method:</h6>
        <input id="in_pay" type="text" placeholder="Bank/ eZ-Cash Payment"size="35"><br><br>
        <button id="finCheckout" class="btn btn-primary btn lg" onclick="fincheckout()">Checkout</button>
    </div>
    </div>
    <br><br><br><br>
</body>
</html>