
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
    <script src="movieFull.js" type="text/javascript"></script>
    <title>Movie Details</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,700');
        h1, h2, h3, h4, h5, h6{
            color:white;
        }
        #mtitle{
            color:#FE0009;
            font-weight: 600;
            font-size: 3em;
        }
        #ratings{
            color:yellowgreen;
        }
        #genres{
            color:silver;
        }
        div#load {
            position: relative;
            top: 2em;
            width: 98.8%;
        } 
        img#poster {
            position: relative;
            left: 2em;
            border-radius: 10px;
        
        }
        .detMov{
            padding-left: 2em;
        }
        .days{
            padding-top:0.5em;
        }
        p{
            color:white;
        }
        #over{
            margin-left:4em;
            text-align: justify;
            padding-right:2em;
        }
        /* body{
            font-family: 'Poppins',sans-serif;
            background-color: #242424;
        } */
        body {
                width: 95%;
                height: 90vh;
                color: #fff;
                background: linear-gradient(-45deg, #4b0000, #131313, #131313, #4b0000);
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
                font-family: 'Poppins',sans-serif;
            }
        
        
            @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
            }
        #userRevs h6{
            color:yellowgreen;
        }
        #userRevs p{
            font-size: small;
            text-align: justify;
            color:silver;
        }
        #userRevs hr{
            border-color:silver;
        }
    </style>
</head>

<body>
    <?php
        session_start();
        $uid = $_SESSION['user_id'];
        $mid = isset($_GET['id'])? $_GET['id'] : "";
        echo "<input id='mid_in' type='hidden' value='".$mid."'>";
        echo "<input id='uid_in' type='hidden' value='".$uid."'>";
    ?>
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-4">
                    <img id="poster" src="../NetImages/posterDefault-01.png" height="450" width="300">
                </div>
                <div class="col-8 detMov">
                    <h1 id="mtitle" class="mdetails"></h1>
                    <h3 id="year" class="mdetails"></h3>
                    <h5 id="genres" class="mdetails"></h2>
                    <h2 id="ratings" class="mdetails"></h2>
                    <h4 id="time" class="mdetails"></h4>
                    <div id="buttons"></div>
                </div>
            <div class="row" style='margin-bottom: 3em;'>
                <h4 style="margin-left:2.7em">Overview:</h4>
                <p id="over"></p>
            </div>
            </div>
            </div>
            <div class="col-3">
                <!-- Review SECTION -->
                <h3>REVIEWS</h3>
                <div id="userRevs"></div>
            </div>
        </div>
        
    </div>
</body>
</html>