
$(document).ready(function(){

});

function approve(uid){
    alert("Approving payment of customer Customer ID:"+uid+"");
    $.ajax({
        type: 'post',
        url: 'app_process.php',
        data:{uid:uid},
        success:function(data){
            alert(data);
        }
    });
}