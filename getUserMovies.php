<?php
    $host = "localhost";
    $db_name = "netscopedb";
    $username = "root";
    $password = "root";
    $uid;
    $mid;
    
    $conn=mysqli_connect($host,$username,$password,$db_name);
    if(!$conn){
        die("Could Not Connect".mysqli_connect_error());
    }
    else{
        $type;
        $uid = $_POST["uid"];
        $movies_query = "SELECT * FROM usermovie WHERE cusid=".$uid."";
        $movie_results = mysqli_query($conn,$movies_query);
        if(mysqli_num_rows($movie_results)>0){
            $num_rows = mysqli_num_rows($movie_results);
            while($row = mysqli_fetch_array($movie_results)){
                $output .= "<br/><div id='div".$row['id']."' class='row moviedata'>
                                <script type='text/javascript'>
                                    findMovieData(".$row['id'].",".$row['mid'].",".$row['type'].");
                                </script>
                                <div class='col-6 pos'>
                                    <img id='pos".$row['id']."' class='mdetPos' src='../NetImages/posterDefault-01.png' height='300' width='200'>
                                </div>
                                <div class='col-6 detm'>
                                    <h4 id='title".$row['id']."' class='mdetTitle'>".$row['title']."</h4>
                                    <h5 id='year".$row['id']."' class='mdetRelease'></h5>
                                    <h5 id='rate".$row['id']."' class='mdetRate'></h5>
                                    <h6 id='genres".$row['id']."' class='mdetGenres'>Not Specified</h6>
                                    <h6 id='time".$row['id']."' class='mdetTime'></h6>
                                    <p id='over".$row['id']."' class='mdetOver'></p>
                                    <h5 id='type".$row['id']."' class='mdetType".$row['type']."'></h5>
                                    <h6 id='date'>[Purchased on: ".$row['created']."]</h6>
                                    <button id='btnLoadTheater' class='btn btn-primary btnWatch btn lg' onclick='loadTheater(".$row['mid'].")'>Watch Now <i class='far fa-play-circle'></i></button>
                                </div>
                            </div>";
            }
            echo $output;
        }
        else{
            echo ("ERROR:\n".mysqli_error($conn));
            echo "No movies in your library";
        }
        mysqli_close($conn);
    }
?>