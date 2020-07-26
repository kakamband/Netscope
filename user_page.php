<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://kit.fontawesome.com/569046a3ca.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="userDet.js" type="text/javascript"></script>
    <title>User Profile</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,700');
        h1,h2,h3,h4,h5,h6,p{
            color:white;
        }
        body{
            font-family: 'Poppins',sans-serif;
            background-color: #242424;
        }
        div#load {
            position: relative;
            top: 2em;
            width: 98.8%;
        } 
        .moviedata{
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
        }
        .pos{
            max-width: 45%;
            
        }
        .mdetPos{
            border: 8px solid #e50914;
            border-radius: 10px;
            display: block;
            margin-left: 60%;
            margin-right: 0;
            margin-top: 0.6em;
        }
        .mdetTitle{
            font-size: 2.5em;
            color:  #F40009;
            font-weight: 600;
        }
        .mdetRate {
            color: chartreuse;
        }
        .btnWatch{
            background-color: #E50914;
            border: 1px solid #E50914;
        }
        .btnWatch:hover{
            background-color:  #F40009;
            border: 1px solid #8b0000;
            color: black;
        }
        .detm {
            backdrop-filter:blur(5px) opacity(.4);
        }
        hr{
            border-color:silver;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $uid = $_SESSION['user_id'];
        $uname = $_SESSION['uname'];
        echo "<h1>".$uname."'s Movie Library</h1>";
        echo "<h6>User ID: ".$uid."</h1>";
        echo "<input id='u_in' type='hidden' value='".$uid."'>";
    ?>
    <div id="userMovies">
    </div>
    <br><br><br>
</body>
<script>

    var $cus_url = "http://dev.netscope.com/";

    function loadTheater(midd){
        var midd;
        var load = $('#load').load($cus_url+'Theater.php?id='+midd);
    }
    $('#cart1').ready(function(){
    uid  = $('#index_in').val();
        showCart();
        total();
    });

    function total(){
        $.ajax({
            type:'post',
            url: 'getTotal.php',
            data: {uid:uid},
            success:function(data){
                $('#total').html(data);
            }
        });
        setTimeout(total,500);
    }

    function showCart(){
        $.ajax({
            type: 'post',
            url: 'showCart.php',
            data: {uid:uid},
            success:function(data){
                $('#cart1').html(data);
            }
        });
        setTimeout(showCart,500);
    }

    function checkout(){
        uid  = $('#index_in').val();
        var load = $('#load').load($cus_url+'checkout.php?id='+uid);
    }
    function delItem(btn,del_id){
        console.log("delete clicked");
        
        $.ajax({
            type: 'post',
            url: 'cartDel.php',
            data:{del_id:del_id},
            success:function(data){
                alert(data);
        }
        });
        btn.parentNode.remove();
}
</script>
</html>