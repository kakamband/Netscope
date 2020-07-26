<div class="row container-fluid" style="padding:0;margin:0;">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,700');
        body{
            font-family: 'Poppins',sans-serif;
            background-color: #242424;
            color: #222;
        }
        .carousel-inner img{
            width: 100%;
            height: 100%;
        }
        .jumbotron{
            padding: 0;
            border-radius: 0;
            background-color: red;
        }
        .lead1{
            margin:0;
        }
        .btnjumbo{
            color:#f8f9fa;
        }
        .padding{
            padding-bottom: 2rem;
            color:white;
        }
        .fa-film,.fa-list,.fa-hand-holding-usd{
            font-size: 4em;
            margin: 1rem;
        }
        hr{
            border-color:silver;
        }
        .my-4{
            border-color:silver;
        }
        .welcome{
            width: 75%;
            margin: 0 auto;
        }
        .welcome hr{
            border-top: 2px solid #b4b4b4;
            width: 95%;
            margin-top: .3rem;
            margin-bottom: 1rem;
        }
        .card{
            color:#222;
        }
        .display-4{
            color:white;
        }
        .social a{
        font-size: 4.5em;
        padding: 3rem;
        }
        .fa-facebook{
        color: #3B5998;
        }
        .fa-twitter{
        color: #00ACED;
        }
        .fa-google-plus-g{
        color: #DD4B39;
        }
        .fa-instagram{
        color: #517FA8;
        }
        .fa-youtube{
        color: #BB0000;
        }
        .fa-facebook:hover, .fa-twitter:hover, .fa-google-plus-g:hover, .fa-instagram:hover, .fa-youtube:hover{
            color: #D5D5D5;
        }
        @media screen and (max-width: 992px) {
        .social a{
            font-size: 4em;
            padding: 2rem;
        }
        }
        @media screen and (max-width: 768px) {
        .carousel-caption{
            top: 45%;
        }
        .carousel-caption h1{
            font-size: 350%;
        }
        .carousel-caption h3{
            font-size: 140%;
            font-weight: 400;
            padding-bottom: .2rem;
        }
        .carousel-caption.btn{
            font-size: 95%;
            padding: 8px 14px;
        }
        .display-4{
            font-size: 200%;
        }
        .social a{
            font-size: 2.5em;
            padding: 1.2rem;
        }
        }
        @media screen and (max-width: 576px) {
        .carousel-caption{
            top: 40%;
        }
        .carousel-caption h1{
            font-size: 250%;
        }
        .carousel-caption h3{
            font-size: 110%;
        }
        .carousel-caption.btn{
            font-size: 90%;
            padding: 4px 8px;
        }
        .carousel-indicators{
            display: none;
        }
        .display-4{
            font-size: 160%;
        }
        .social a{
            font-size: 2em;
            padding: .7rem;
        }
        }
</style>
    <!-- CAROUSEL -->
    <div id='slides' class='carousel slide' data-ride='carousel'>
        <ul class='carousel-indicators'>
            <li data-target='#slides' data-slides-to='0' class='active'></li>
            <li data-target='#slides' data-slides-to='1'></li>
            <li data-target='#slides' data-slides-to='2'></li>
        </ul>
        <div class='carousel-item active' data-interval='5000'>
                <img class="d-block w-100" src='../NetBackDrops/spider-man.jpg'>
        </div>
        <div class='carousel-item' data-interval='5000'>
                <img class="d-block w-100" src='../NetBackDrops/irishman.jpg'>
        </div>
        <div class='carousel-item' data-interval='5000'>
                <img class="d-block w-100" src='NetBackDrops/endgame.png'>
        </div>
    </div>
    <!-- JUMBOTRON -->
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead1">Netscope allows you to enjoy your favourite movies anywhere, anytime</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#">
                    <button type="button" class="btn btn-outline-secondary btnjumbo btn lg">Start Watching Now</button>
                </a>
            </div>
        </div>
    </div>
    <!--Welcome Section-->
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display 4">The Best Experience</h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">Welcome to NetScope the best online streaming platform exprience</p>
            </div>
        </div>
    </div>
    <!-- 3COLUMN SECTION -->
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="fas fa-film"></i>
                <h3>HD Quality</h3>
                <p>Your favourite movies in the best quality ensuring the best viewing experience anywhere you go</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Lowest Rates</h3>
                <p>With 1 day renting you can watch your favourite movies for the lowest price anywhere you go</p>
            </div>
            <div class="col-xs-12 col-md-4">
                <i class="fas fa-list"></i>
                <h3>On Demand</h3>
                <p>Even when you are stuck in traffic you can still make it to your movie through your NetScope</p>
            </div>
        </div>
        <hr class="my-4">
    </div>
    <!-- ABOUT US -->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-lg-6">
                <h2>What is NetScope ?</h2>
                <p>NetScope is a movie streaming service that provides you a wide range of movies for the lowest price which originated at Faculty of Applied Sciences, Rajarata University of Sri Lanka as a simple e-commerce mini project to show movie data. Today it has evolved to become a main stream streaming platform</p>
                <br>
                <a href="#" class="btn btn-primary btn lg">Learn More</a>
            </div> 
            <div class="col-lg-6">
                <img src="../NetImages/tablet.jpg" class="img-fluid">
            </div>
        </div>
        <hr>
    </div>
    <!-- MEET THE TEAM -->
    <div class="container-fluid">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Meet the Team</h1>
            </div>
        </div>
        
    </div>
    <!-- THE TEAM -->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top rounded float-left" src="../NetImages/TeamGirl2.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Pavithra Nanayakkara</h4>
                        <p class="card-text">Talent wins games, but teamwork and intelligence wins the championship. Her motto as team leader</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top rounded mx-auto d-block" src="../NetImages/TeamGuy3.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">Pavithra Udara</h4>
                        <p class="card-text">Founder of NetScope.com Pavithra is a huge fan of movies himself with a watched list of 650+ movies.</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top rounded float-right" src="../NetImages/TeamGirl1.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Harini Kavinidi</h4>
                        <p class="card-text">The best content curator in the cinema industry Harini was awarded the Best Content Curator twice.</p>
                        <a href="#" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Two Column Section-->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-lg-6">
                <h2>Our Vision</h2>
                <p>At NetScope our vision is to give you the best of entertainment for the lowest price while keeping upto date with latest trends.</p>
                <p>At NetScope, there's a movie for everyone</p>                
            </div> 
            <div class="col-lg-6">
                <img src="../NetImages/NetScopeLogoReSize3.png" class="img-fluid">
            </div>
        </div>
        <hr class="my-4">
    </div>
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-12">
                <h2>Connect</h2>
            </div>
            <div class="col-12 social padding">
                <a href="#" alt="Facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="#" alt="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" alt="Google+"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" alt="Instergram"><i class="fab fa-instagram"></i></a>
                <a href="#" alt="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>