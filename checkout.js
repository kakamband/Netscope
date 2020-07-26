var uid;
$(document).ready(function(){
    uid  = $('#uid_in').val();
    getDetails();
    total();

});

function getDetails(){
    $.ajax({
        type: 'post',
        url: 'showCart.php',
        data: {uid:uid},
        success:function(data){
            $('#orderDet').html(data);
        }
    });
}

function total(){
    $.ajax({
        type:'post',
        url: 'getTotal.php',
        data: {uid:uid},
        success:function(data){
            $('#orderTot').html(data);
        }
    });
}

function fincheckout(){
    if($('#in_name').val().trim()=="" || $('#in_add').val().trim()=="" || $('#in_pay').val().trim()==""){
        alert("EMPTY FIELDS");
    }
    else{
        var name= $('#in_name').val().trim();
        var address = $('#in_add').val().trim();
        var method = $('#in_pay').val().trim();
        $.ajax({
            type:'post',
            url: 'orders.php',
            data: {uid:uid,name:name,address:address,method:method},
            success:function(data){
                alert(data);
            }
        });
    }
}