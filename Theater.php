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
    <script src="Theater.js" type="text/javascript"></script>
    <title>Theater</title>
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
            width: 100%;
        } 
        video{
            top: 0;
            left: 0;
            width: 100%; 
            height: 100%;
            outline:none;
            object-fit: cover;
        }
        textarea{
            background-color: black;
            border-color: none;
            border: 0;
            color: silver;
            position: relative;
            left: 3.5%;
        }
        button#btnURev {
            padding: relative;
            margin-left: 3.2em;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $uid = $_SESSION['user_id'];
        echo "<input id='theater_uid' type='hidden' value='".$uid."'>";
        $mid =isset($_GET['id']) ? $_GET['id'] : "";
        echo "<input id='theater_in' type='hidden' value='".$mid."'>";
    ?>
    <h1 id='theaterTitle'>THEATER</h1>
    <video id="netTheater" oncontextmenu="return false;" controls controlsList="nodownload">
    <source src="" type="video/mp4">
    </video>
    <br/>
    <br/>
    <div id="row userRev">
        <h3 style='margin-left: 2em;'>Your review about this movie:</h3>
        <textarea id="uRev" name="message" rows="5" cols="162" placeholder="Your review"></textarea><br/>
        <button id="btnURev" class="btn btn-primary btn lg" onclick="subRev()">Submit</button>
    </div>
    </br>
    </br>
    </br>
    </br>
</body>
<script type="text/javascript">
function subRev(){
    alert("Submiting...");
    mid = $('#theater_in').val();
    uid = $('#theater_uid').val();
    var rev = document.getElementById('uRev').value;
    $.ajax({
        type:'post',
        url: 'sendRev.php',
        data: {uid:uid,mid:mid,rev:rev},
        success:function(data){
            alert(data);
        }
    });

}
</script>
</html>