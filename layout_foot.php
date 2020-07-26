<!-- </div> -->
    <!-- end of head container -->
<!--Footer-->
<?php
    // if given page title is 'Login', do not display the footer
    if($page_title!="Login"){
        ?>
        <footer>
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 footcol"><img src="NetImages/NetScopeLogoReSize2.png" alt="NetScope Logo"></div>
            
            <div class="col-md-3 footcol"><p><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;011-2729729</p></div>
            
            <div class="col-md-3 footcol"><p><i class="far fa-envelope"></i>&nbsp;&nbsp;Requests: helpdesk@netscope.com</p></div>
            
            <div class="col-md-3 footcol"><p><i class="far fa-clock"></i>&nbsp;&nbsp; Bank & eZ-Cash Payments</p></div>
            </div>
            
            <hr class="light-100">
            <h6>&copy; NetScope.com 2019</h6>
            </div>
        </footer>
        <?php
    }
?>
<!-- end HTML page -->
</body>
<script src="quick_search.js" type="text/javascript"></script>
<script>

    

    var $cus_url = "http://dev.netscope.com/";

    function loadUser(){
        var load = $('#load').load($cus_url+'user_page.php');
    }

    $('#cart1').ready(function(){
    uid  = $('#index_in').val();
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

    function checkout(){
        uid  = $('#index_in').val();
        var load = $('#load').load($cus_url+'checkout.php?id='+uid);
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
    

</script>

</html>