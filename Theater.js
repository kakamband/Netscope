var mid;
var uid;
var key ='8adf15f17b7d21935edf01b08cd99968';

$(document).ready(function(){
    mid = $('#theater_in').val();
    uid = $('#theater_uid').val();
    document.getElementById('netTheater').src="../NetMovie/"+mid+".mp4";
    async function getTitle(){
        var search_url = 'https://api.themoviedb.org/3/movie/'+mid+'?api_key='+key+'&language=en-US';
        var response = await fetch(search_url);
        mov_data = await response.json();
        mtitle = mov_data.title;
        document.getElementById('theaterTitle').innerHTML = "Now Playing: "+mtitle;
    }
    getTitle();
});


