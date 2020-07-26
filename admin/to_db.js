var key ='8adf15f17b7d21935edf01b08cd99968';
const myform = document.getElementById('addmovie');

// if(document.readyState=='interactive'){
//     console.log('huuuuuu');
// }
var mid,init_data;
var m_psize="original";
var poster_url = "https://image.tmdb.org/t/p/original";

$(document).ready(function(){
    console.log('###############################');
    mid = document.getElementById('midd').textContent;
    console.log('ID of movie:'+mid);
    async function searchDetail(){
        var search_url = 'https://api.themoviedb.org/3/movie/'+mid+'?api_key='+key+'&language=en-US';
        var response = await fetch(search_url);
        init_data = await response.json();
        var mtitle = init_data.title;
        var mposter = init_data.poster_path;
        var mrelease = init_data.release_date;
        var mratings = init_data.vote_average;
        var mtime = init_data.runtime;
        var num_genres = init_data.genres.length -1;
        document.getElementById('mgenres').innerHTML="";
        while(0<=num_genres){
            var genres = init_data.genres[num_genres].name;
            if(num_genres==0){
                var node = document.createTextNode(genres);
            }
            else{
                var node = document.createTextNode(genres+" / ");
            }
            
            document.getElementById('mgenres').appendChild(node);
            num_genres--;
        }
        console.log(mtime);
        
        document.getElementById('mtitle').innerHTML = mtitle;
        document.getElementById('mtitle2').value = mtitle;
        document.getElementById('myear').innerHTML =  "Year: "+mrelease.toString().slice(0,4);
        document.getElementById('mratings').innerHTML = "Ratings: "+mratings;
        document.getElementById('mtime').innerHTML = mtime+"mins";
        document.getElementById('postero').src= poster_url+mposter;
        document.getElementById('postero2').value=poster_url+mposter;
        

    }
    searchDetail();
    
    
});

// myform.addEventListener("submit",(e)=>{
//     e.preventDefault();
// });


