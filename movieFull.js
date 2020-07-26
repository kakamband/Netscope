var mid;
var uid;
var mtitle;
var key ='8adf15f17b7d21935edf01b08cd99968';
var poster_url = "https://image.tmdb.org/t/p/w780";
var $cus_url = "http://dev.netscope.com/";
var mov_data;

$(document).ready(function(){
    mid  = $('#mid_in').val();
    uid  = $('#uid_in').val();

    console.log('Search for: '+ mid);
    $.ajax({
        type: 'post',
        url: 'getval.php',
        data: {mid:mid},
        success:function(data){
                $('#buttons').html(data);
        }
    });
    async function getMovie(){
        var search_url = 'https://api.themoviedb.org/3/movie/'+mid+'?api_key='+key+'&language=en-US';
        var response = await fetch(search_url);
        mov_data = await response.json();
        console.log(mov_data);
        mtitle = mov_data.title;
        var mposter = mov_data.poster_path;
        var mrelease = mov_data.release_date;
        var mratings = mov_data.vote_average;
        var moverview = mov_data.overview;
        var mtime = mov_data.runtime;
        var backdrop = mov_data.backdrop_path;
        var num_genres = mov_data.genres.length -1;
        document.getElementById('genres').innerHTML="";
        while(0<=num_genres){
            var genres = mov_data.genres[num_genres].name;
            if(num_genres==0){
                var node = document.createTextNode(genres);
            }
            else{
                var node = document.createTextNode(genres+" / ");
            }
            
            document.getElementById('genres').appendChild(node);
            num_genres--;
        }
        //$('body').css('background-image','url('+poster_url+backdrop+')');
        document.getElementById('mtitle').innerHTML = mtitle;
        document.getElementById('poster').src = poster_url+mposter;
        document.getElementById('over').innerHTML = moverview;
        document.getElementById('year').innerHTML = "Year: "+mrelease.toString().slice(0,4);
        document.getElementById('ratings').innerHTML = "Ratings: "+mratings;
        document.getElementById('time').innerHTML = mtime+"mins";
    }
    getMovie();
    getRevs();

    
});

$('#cart1').ready(function(){
    uid  = $('#uid_in').val();
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

function sendCartP(price){
    var mtype = 3;
    console.log("Price:"+price);
    console.log("Movie ID: "+mid);
    console.log("User ID: "+uid);
    $.ajax({
        type: 'post',
        url: 'cartTemp.php',
        data: {mid:mid,uid:uid,price:price,mtype:mtype,mtitle:mtitle},
        success:function(data){
                $('#cart1').html(data);
                alert(data);
        }
    });
    $('#cartico').css('color','red');

}
function sendCart7(price){
    var mtype = 2;
    console.log("Price:"+price);
    console.log("Movie ID: "+mid);
    console.log("User ID: "+uid);
    $.ajax({
        type: 'post',
        url: 'cartTemp.php',
        data: {mid:mid,uid:uid,price:price,mtype:mtype,mtitle:mtitle},
        success:function(data){
                $('#cart1').html(data);
                alert(data);
        }
    });
    $('#cartico').css('color','red');
}
function sendCart1(price){
    var mtype = 1;
    console.log("price:"+price);
    console.log("Movie ID: "+mid);
    console.log("User ID: "+uid);
    $.ajax({
        type: 'post',
        url: 'cartTemp.php',
        data: {mid:mid,uid:uid,price:price,mtype:mtype,mtitle:mtitle},
        success:function(data){
                $('#cart1').html(data);
                alert(data);
        }
    });
    $('#cartico').css('color','red');
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

function checkout(){
    uid  = $('#uid_in').val();
    var load = $('#load').load($cus_url+'checkout.php?id='+uid);
}

function getRevs(){
    $.ajax({
        type: 'post',
        url: 'getRevs.php',
        data:{mid:mid},
        success:function(data){
            $('#userRevs').html(data);
            
    }
    });
}
