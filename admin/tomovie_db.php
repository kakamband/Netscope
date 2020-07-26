
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    
    <script src="https://kit.fontawesome.com/569046a3ca.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="to_db.js" type="text/javascript"></script>
    <title>toMovie DB</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,700');
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        body{
            
            font-family: 'Poppins',sans-serif;
            background-color: black;
        }
        #title{
            color:white;
            text-align:center;
        }
        #library{
            color:white;
            transition:300ms ease-in-out;
        }
        #library:hover{
            color:#F40009 ;
        }
        .preview{
            max-width: 592px;
        }
        .container{
            max-width: 592px;
        }
        #posterdiv{
            max-width: 342px;
        }
        #postero{
            border-radius: 20px 0px 0px 20px;
            max-width: 342px;
            box-shadow: 0 0 12px 1px #090909;
        }
        h1{
            color:white;
            /* font-family: 'Roboto', sans-serif; */
        }
        .details{
            color:black;
            /* padding-left: 50px; */
            padding-right: 0px;
            margin-left: 0;
            background-color:#F40009;
            border-radius: 0px 20px 20px 0px;
            box-shadow: 0 0 12px 1px #090909;
            padding-left: 2.2em;
            padding-top: 10px;
            max-width: 250px;
            padding-left: 0px;
            left: 15px;

        }

        .mCard{
            padding-right: 0px;
            padding-left: 0px;
            max-width: 215px;
            margin-left: 10px;
            margin-right: 0em;
            min-width: 215px;
        }
        .caro{
            padding-right: 0px;
            padding-left: 0px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .context{
            
            margin-left: 0px;
            padding-left: 10px;
            max-width: 200px;
            margin-right: 8px;

        }

        #plus{
            position:absolute;
            bottom: 20px;
            font-size: 2em;
            left: 155px;
            transition:300ms ease-in-out;
        }
        #plus:hover{
            color:#F40009 ;
            
        }

        #moverview{
            padding-right: 2em;
            padding-left: 0em;
            
            text-align: justify;
            max-width: 420px;
        }
        #syn{
            padding-top: 1.5em;
        }
        #moverview2{
            margin-bottom: 0px;
            max-width: 342px;
            min-width: 200px;
        }
        .carousel-caption{
            opacity: 0;
            transition:200ms ease-in-out;
            border-radius: 20px 0px 0px 20px;
            background-color: #000000d6;
            min-width: 342px;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 14px;

        }
        .carousel-caption:hover{
            opacity: 1;
        }
        #priceLabel{
            margin-right: 0em;
            margin-left: 10px;
        }
        .pricing{
            max-width: 450px;
            margin-left: 0px;
            /* border-radius: 0px 0px 20px 0px */
        }
        #midd{
            color:red;
        }

        /* FORM CSS */
        .input-group{
            margin-bottom: 0.5em;
            max-width: 250px;
        }
        input:hover .input-group-addon{
            background-color: rgb(126, 0, 0);
        }
        .input-group-addon{
            background-color: black;
            color: white;
            padding-left: 0.4em;
            padding-right: 0.4em;
            padding-top: 0.45em;
            border-radius: 5px 0px 0px 5px;
            min-width: 43px;
            text-align: right;
        }

        /* TOGGLE SWITCH */
        .form-check-label{
            margin-top: 0.5em;
            
        }
        .form-check-inline{
            margin-right: 0px;
        }
        #btnAdd{
            position:absolute;
            bottom: 120px;
            font-weight: bold;
            width: 215px;
        }
        #btnAdd:hover{
            background-color: #c20000;
            border: 1px solid #490000;
            color: #490000;
        }
        </style>

</head>
<body>
<h1 id="title">Add to NetScope Library  <i id="library"class="fas fa-film"></i></h1>
<div class="mdetails">
</div>
<form action="" method="post" id="addmovie" onsubmit = "return formSubmit();">
<div class="container">
    <div class="row preview">
        <div class="col-4 poster" id="posterdiv">
            <img id="postero" src="../NetImages/posterDefault-01.png">
            <input id="postero2" name="postero2" type="hidden">
            <div class="carousel-caption text-center">
                    <div class="container-fluid caro">
                        <h2 id="mtitle">Avengers: Infinity War</h2>
                        <input id="mtitle2" name ="mtitle2" type='hidden'>
                    </div>
                    <div class="container-fluid caro">
                        <h5 id="myear">Year:&nbsp;2018</h5> 
                    </div>
                    <div class="container-fluid caro">
                        <h5 id="mratings">Ratings: 9.2</h5>
                    </div>
                    <div class="container-fluid  caro">
                        <h6 id="mgenres">Adventure/Action/Sci-Fi</h6>
                    </div>
                    <div class="container-fluid  caro">
                        <h6 id="mtime">Run time:&nbsp;149mins</h6>
                    </div>
                    <div class="container-fluid  caro">
                        <h6 id="midLabel">Movie Id:</h6>
                        <?php
                            $midd = isset($_GET['id']) ? $_GET['id'] : "";
                            echo "<h5 id='midd' value=".$midd.">".$midd."</h5>";
                            echo "<input name='mid' type='hidden' value=".$midd.">";
                        ?>
                    </div>
                    <div class="container-fluid caro">
                        <i id="plus" class="far fa-plus-square"></i>
                    </div>
            </div>
        </div>
        <div class="col-8 details">
            <div class="row context">
                <div class="container-fluid mCard">
                    <h1 id="mdb">Pricing:</h1>
                </div>
                <div class="container-fluid mCard">
                    <h5 id="mratings">Permanent:</h5>
                </div>
                <div class="input-group container-fluid mCard">
                    <span class="input-group-addon" id="basic-addon1">LKR.</span>
                    <input id="price_p" name="price_p" type="number" class="form-control" placeholder="Permanent Price" aria-describedby="basic-addon1">
                </div>
                <div class="container-fluid mCard">
                    
                    <div class="form-check form-check-inline">
                        
                        <label for="inlineCheckbox7" class="form-check-label"><h5 id="dayCheck7"><i class="far fa-clock"></i>&nbsp;7-day Rental:&nbsp;</h5></label>
                        <!-- <input id="inlineCheckbox7" class="form-check-input" type="checkbox" data-toggle="toggle" data-size="xs" data-onstyle="primary" data-offstyle="secondary" > -->
                    </div>
                </div>
                <div class="input-group container-fluid mCard">
                    <span class="input-group-addon" id="basic-addon1">LKR.</span>
                    <input id="price_7" name="price_7" type="number" class="form-control" placeholder="7 Day Price" aria-describedby="basic-addon1">
                </div>

                <div class="container-fluid mCard">
                    <div class="form-check form-check-inline">
                        
                        <label for="inlineCheckbox1" class="form-check-label"><h5 id="dayCheck3"><i class="far fa-clock"></i>&nbsp;1-day Rental:&nbsp;</h5></label>
                        <!-- <input id="inlineCheckbox1" class="form-check-input" type="checkbox" data-toggle="toggle" data-size="xs" data-onstyle="primary" data-offstyle="secondary"> -->
                    </div>
                </div>
                <div class="input-group container-fluid mCard">
                    <span class="input-group-addon" id="basic-addon1">LKR.</span>
                    <input id="price_1" name="price_1" type="number" class="form-control" placeholder="1 Day Price" aria-describedby="basic-addon1">
                </div>
                <div class="container-fluid mCard">
                <button id="btnAdd" name="btnAdd" class="btn btn-primary btn lg" type="submit">Add Movie</button>
                </div>
                <h3 id="success"></h3>
                
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
event.preventDefault();
    function formSubmit(){
        $.ajax({
            type: 'post',
            url : 'handle.php',
            data: $('#addmovie').serialize(),
            success:function(response){
                console.log(response);
                alert(response);
            }

        });
    }
</script>
</body>
</html>