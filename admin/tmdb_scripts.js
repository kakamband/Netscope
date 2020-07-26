const api_key ='8adf15f17b7d21935edf01b08cd99968';
const api_url='https://api.themoviedb.org/3/search/movie?api_key='+api_key+'&language=en-US&query='+name+'&page=1&include_adult=false';


//GET TITLES OF MOVIES FROM TMDB BASED ON SEARCH 
function getData(){
    var name;
    name= document.getElementById('addsearch').value;
    document.getElementById('searchin').innerHTML=name;
    var table = document.getElementById("data-table");
    table.innerHTML = "";
    async function seeMovie(){
    var check_url ='https://api.themoviedb.org/3/search/movie?api_key='+api_key+'&language=en-US&query='+name+'&include_adult=false';
    const response = await fetch(check_url);
    var data = await response.json();
    var no_pages=data.total_pages; //Total number of pages available for the request
    //Length of results array on 1st page - 1
    console.log('Number of pages: '+no_pages);
    //First log 2nd Page
    if(no_pages>1){
        var count=2; //Page number =2
        async function see(){
            var url2 ='https://api.themoviedb.org/3/search/movie?api_key='+api_key+'&language=en-US&&page='+count+'&query='+name+'&include_adult=false';
            const response2 = await fetch(url2);
            var data2 = await response2.json();
            console.log('Checking for page: '+count);
            var results2 = data2.results.length-1;
            console.log('Number of results in this page: '+results2);
            var results2 = results2-1; //since arrays, lists, objects start with 0
            while(0<=results2){
                var titles2 = data2.results[results2].title;
                var popularity2 = data1.results[results2].popularity;
                var overview2 = data1.results[results2].overview;
                console.log(20+results2+' Title: '+titles2);
                // var row_page2 = table.insertRow(0);
                // var cell_page2 = row_page2.insertCell(0);
                // cell_page2.innerHTML=data2.results[results2].title+'<span class="pop" id="cell1'+results2+'">  [Popularity: '+data2.results[results2].popularity+']</span><br><p class="over">'+data2.results[results2].overview+'</p>';
                var markup2 = "<tr><td id='cell2"+results2+"'>"+titles2+"<p class='pop'> [Popularity: "+popularity2+"</p><br><p class='over'>"+overview2+"</p></td></tr>";
                table.innerHTML(markup2);
                results2--;
            }
        }
        see();
    }
    //After 2nd page has been log 1st page
    var url1 ='https://api.themoviedb.org/3/search/movie?api_key='+api_key+'&language=en-US&&page=1&query='+name+'&include_adult=false';
    const response1 = await fetch(url1);
    var data1 = await response1.json();
    var results1 = data1.results.length-1;
    while(0<=results1){
    //log titles on 1st page
    var titles1 = data1.results[results1].title;
    var popularity1 = data1.results[results1].popularity;
    var overview1 = data1.results[results1].overview;
    console.log(results1+' Title: '+titles1);
    //var row_page1 = table.insertRow(0);
    //var cell_page1 = row_page1.insertCell(0);
    // cell_page1.innerHTML=data1.results[results1].title+'<span style="color:cyan">  [Popularity: '+data1.results[results1].popularity+']</span><br><p style="color:white">'+data1.results[results1].overview+'</p>';
    //cell_page1.innerHTML=data1.results[results1].title+'<span class="pop" id="cell1'+results1+'">  [Popularity: '+data1.results[results1].popularity+']</span><br><p class="over">'+data1.results[results1].overview+'</p>';
    var markup1 = "<tr><td id='cell1"+results1+"'>"+titles1+"<p class='pop'> [Popularity: "+popularity1+"</p><br><p class='over'>"+overview1+"</p></td></tr>";
    table.innerHTML(markup1);
    results1--;
    }
    }
            seeMovie();

}
