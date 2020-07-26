<?php
// Login checker for 'customer' access level

//####### Customer access_level = 0
//####### Admin access_level = 1

// If access_level is not '1', redirect user to login page
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']=='1'){
        header("Location: {$home_url}admin/index.php?action=logged_in_as_admin");
    }
    // If $require_login was set and value is 'true'
    else if(isset($require_login) && $require_login==true){
        // If user hasn't logged in yet, redirect to login page
        if(!isset($_SESSION['access_level'])){
            header("Location: {$home_url}login.php?action=please_login");
        }
    }
    // if it was the 'login' or 'register' or 'sign up' page but the customer was already logged in
    else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
        // if user not yet logged in, redirect to login page
        if(isset($_SESSION['access_level']) && $_SESSION['access_level']=='0'){
            header("Location: {$home_url}index.php?action=already_logged_in");
        }
    }
    else{
        // no problem, stay on current page uba ohommama hitapan
    }
?>