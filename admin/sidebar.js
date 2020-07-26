$dash_url = 'http://dev.netscope.com/admin/';

$(document).ready(function(){
    //Initial dash page
    $('#dashmini').load($dash_url+'dash_page.php');
   //Handle Menu clicks
    $('#movieFn a').click(function(){
        var mpage =$(this).attr('href');
        $('#dashmini').load($dash_url+mpage+'.php'); console.log($dash_url+mpage);
        return false;
    });
    $('#userFn a').click(function(){
        var upage =$(this).attr('href');
        $('#dashmini').load($dash_url+upage+'.php'); console.log($dash_url+upage);
        return false;
    });
    $('#dash').click(function(){
        $('#dashmini').load($dash_url+'dash_page.php'); console.log($dash_url+'dash_page.php');
    });
});