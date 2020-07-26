
var key ='8adf15f17b7d21935edf01b08cd99968';
var poster_url = "https://image.tmdb.org/t/p/original";
var uid;
var mid;
var mov_data;

$(document).ready(function(){
    uid = $('#u_in').val();
    //alert(uid);
    $.ajax({
        type: 'post',
        url: 'getUserMovies.php',
        data:{uid:uid},
        success:function(data){
            $('#userMovies').html(data);
        }
    });
});

function findMovieData(id,mid,type){
    async function getMovieData(){
        var search_url = 'https://api.themoviedb.org/3/movie/'+mid+'?api_key='+key+'&language=en-US';
        var response = await fetch(search_url);
        mov_data = await response.json();
        mtitle = mov_data.title;
        var mback = mov_data.backdrop_path;
        var mposter = mov_data.poster_path;
        var mrelease = mov_data.release_date;
        var mratings = mov_data.vote_average;
        var moverview = mov_data.overview;
        var mtime = mov_data.runtime;
        var num_genres = mov_data.genres.length -1;
        document.getElementById('genres'+id).innerHTML="Genres: ";
        while(0<=num_genres){
            var genres = mov_data.genres[num_genres].name;
            if(num_genres==0){
                var node = document.createTextNode(genres);
            }
            else{
                var node = document.createTextNode(genres+" / ");
            }
            
            document.getElementById('genres'+id).appendChild(node);
            num_genres--;
        }
        $('#div'+id).css("background-image","url(https://image.tmdb.org/t/p/w1280"+mback+")");
        document.getElementById('title'+id).innerHTML = mtitle;
        document.getElementById('pos'+id).src = poster_url+mposter;
        document.getElementById('over'+id).innerHTML = moverview;
        document.getElementById('year'+id).innerHTML = "Year:&nbsp;&nbsp;"+mrelease.toString().slice(0,4);
        document.getElementById('rate'+id).innerHTML = "Ratings:&nbsp;&nbsp;"+mratings;
        document.getElementById('time'+id).innerHTML = mtime+"&nbsp;mins";
        if(type==3){
            document.getElementById('type'+id).innerHTML = "Permenet Viewing";
        }
        else if(type==2){
            document.getElementById('type'+id).innerHTML = "<i class='far fa-clock'></i>&nbsp;&nbsp;7day Viewing ";
        }
        else{
            document.getElementById('type'+id).innerHTML = "<i class='far fa-clock'></i>&nbsp;&nbsp;1 day Viewing ";
        }
    
    }
    getMovieData();
    
    
}


