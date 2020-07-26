var search = document.getElementById('search_text');
var result = document.getElementById('search_results');
var $cus_url = "http://dev.netscope.com/";
var text;
var opt;
var mid;

$(document).ready(function(){
    $('#search_text').keyup(function(){
        text = $(this).val();
        if(text==""){
            text ="";
        }
        console.log('Search for: '+ text);
            event.preventDefault();
            $.ajax({
                type: 'post',
                url: 'quick_search.php',
                data: {search:text},
                success:function(data){
                    $('#load').html(data);
                }
            });
    })
});

function showID(mid){
    console.log(mid);
    var load = $('#load').load($cus_url+'movie.php?id='+mid);
}
