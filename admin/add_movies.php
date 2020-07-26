
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="tmdb_scripts2.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../libs/css/movies.css" type="text/css">
        <title>Search Movies</title>

        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);
            .search {
                width: 80vw;
                position: center;
                display: flex;
            }
            #addsearch {
                font-family: 'Open Sans', sans-serif;
                width: 40px;
                height: 2.2em;
                padding: 0;
                border: 0;
                border: 3px solid  #E50914;
                border-right-width: 0px;
                text-align: center;
                color: #fff;
                border-radius: 10px 0 0 10px;
                cursor: text;
                font-size: 1.3em;
                margin-left:4em;
                outline:none;
            }
            #addsearch:focus{
                color:  #E50914;
            }
            .searchbtn{
                width: 2.2em;
                height: 2.2em;
                padding: 0;
                border: 0;
                border: 3px solid #E50914;
                background: #E50914;
                text-align: center;
                color: #fff;
                border-radius: 0 5px 5px 0;
                cursor: pointer;
                font-size: 1.3em;
            }
            .fa-search{
                color:white;
            }
            .res {
                cursor: pointer;
            }
            @media screen and (max-width: 576px){
                #addsearch{
                    width: 80vw;
                }
            }

        </style>


    </head>
    <body>
    <h1 style="color:white;text-align:center">ADD MOVIES</h1>
    <div class="search container">
        <input id="addsearch" class="col-md-9 col-sm-3 searchbar" type="text"  placeholder="Search Movies">
        <button id="search" onclick="getData2()" class="searchbtn"><i class="fas fa-search"></i></button>
    </div>
    <p style="color:white;text-align:center">Search Text: <span id="searchin"></span></p>
    <ul id="results" class="res"></ul>
    </div>
    </body>
    </html>
