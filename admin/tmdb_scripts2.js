$dash_url = 'http://dev.netscope.com/admin/';
var key ='8adf15f17b7d21935edf01b08cd99968';
//const api_url='https://api.themoviedb.org/3/search/movie?api_key='+key+'&language=en-US&query='+name+'&page=1&include_adult=false';
var page2_data;
var init_data;
var ul = document.getElementById('results');
var no_pages=1;
var page1_length,page2_length;//number of elements with 0
var mid;

function logDone(){
    var items = document.querySelectorAll('.res li');
    for(i=0;i<items.length;i++){
        console.log('ID of '+i+'th list item: '+items[i].id);
    }
}
function showID(){
    var n = $(this).attr('id');
    mid = n.match(/\d+/g).map(Number);
    var load = $('#dashmini').load($dash_url+'tomovie_db.php?id='+mid);
}



async function getData2(){
    var search = document.getElementById('addsearch').value;
    document.getElementById('searchin').innerHTML=search;
    async function searchMovie(){
        var search_url ='https://api.themoviedb.org/3/search/movie?api_key='+key+'&language=en-US&query='+search+'&page=1&include_adult=false';
        var response = await fetch(search_url);
        init_data = await response.json();
        const total_pages=init_data.total_pages;
        console.log('Total # pages with '+search+': '+total_pages);
        if(total_pages>1){
            no_pages=2;
            //1 Page consists of 20 titles therefore, 2 pages are enough for a basic search
            async function gatherDataP2(){
                var page2_url='https://api.themoviedb.org/3/search/movie?api_key='+key+'&language=en-US&query='+search+'&page=2&include_adult=false';
                var page2_response = await fetch(page2_url);
                page2_data= await page2_response.json();
                console.log('Data on page 2');
                var page2_size=page2_data.results.length - 1;
                page2_length = page2_size; //Since arrays, lists, objects start with 0
                while(0<=page2_size){
                    var page2_title = page2_data.results[page2_size].title;
                    var page2_rating = page2_data.results[page2_size].vote_average;
                    var page2_overview = page2_data.results[page2_size].overview;
                    console.log(20+page2_size+' Title: '+page2_title); //Second page starts from 20th result
                    page2_size--;
                }
            }
            await gatherDataP2(); //wait for gatheDataP2 to finish
        }
        var page1_size = init_data.results.length - 1;
        page1_length = page1_size;
        while(0<=page1_size){
            var page1_title = init_data.results[page1_size].title;
            var page1_ratings = init_data.results[page1_size].vote_average;
            var page1_overview = init_data.results[page1_size].overview;
            console.log(page1_size+' Title: '+page1_title); //First page starts from 0th result
            page1_size--;
        }
        

    }
    await searchMovie(); // wait for searchMovie to finish

    console.log('init_data: '+init_data);
    console.log('page1_size: '+page1_length);
    console.log('page2_data: '+page2_data);
    console.log('page2_size: '+page2_length);
    console.log('Number of pages: '+no_pages);
    
    async function makelist(){

        $("#results").empty();

        var li = createNode('li');
        var title_h5 = createNode('h5');
        var rating_h6 = createNode('h6');
        var overview_p = createNode('p');

        var list1_count =0;
        while(list1_count<=page1_length){
            var li = createNode('li');
            var title_h5 = createNode('h5');
            var rating_h6 = createNode('h6');
            var overview_p = createNode('p');
            var real_id = init_data.results[list1_count].id;
            li.id='result'+real_id;
            li.addEventListener("click", showID);
            title_h5.innerHTML = init_data.results[list1_count].title;
            rating_h6.innerHTML ="Rating:&nbsp;&nbsp;"+ init_data.results[list1_count].vote_average;
            overview_p.innerHTML = init_data.results[list1_count].overview;
            
            append(li,title_h5);
            append(li,rating_h6);
            append(li,overview_p);
            append(ul,li);
            console.log('Given ID: '+real_id);
            list1_count++;
        }
        var list2_count = 0;
        if (no_pages > 1 ){
            while(list2_count<=page2_length){
                var li = createNode('li');
                var title_h5 = createNode('h5');
                var rating_h6 = createNode('h6');
                var overview_p = createNode('p');
                var real_id2 = page2_data.results[list2_count].id;
                li.id='result'+real_id2;
                li.addEventListener("click", showID);
                title_h5.innerHTML = page2_data.results[list2_count].title;
                rating_h6.innerHTML ="Rating:&nbsp;&nbsp;" + page2_data.results[list2_count].vote_average;
                overview_p.innerHTML = page2_data.results[list2_count].overview;
                
                append(li,title_h5);
                append(li,rating_h6);
                append(li,overview_p);
                append(ul,li);
                console.log('Given ID: '+real_id2);
                list2_count++;
            }
        }
        var total_results = list1_count+list2_count;
    console.log('Total Results Shown: '+total_results);
    }
    
    await makelist();
    logDone();
    

}

function createNode(element) {
    return document.createElement(element); // Create the type of element passed as the parameters
}

function append(parent, el) {
    return parent.appendChild(el); // Append the second parameter(element) to the first one
}
