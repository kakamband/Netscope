<?php
// core configuration
include_once "config/core.php";
// set page title
$page_title="Index";
// include login checker
$require_login=true;
include_once "login_checker.php";
// include page header HTML
include_once 'layout_head.php';
echo "<div class='front col-md-12' style='padding:0;'>";

    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $uid = $_SESSION['user_id'];
    echo "<input id='index_in' type='hidden' value=".$uid.">";
    // if login was successful
    // if($action=='login_success'){
    //     echo "<div class='alert alert-info'>";
    //         echo "<strong>Hi " . $_SESSION['uname'] . ", welcome back!</strong>";
    //     echo "</div>";
    // }

    // // if user is already logged in, shown when user tries to access the login page
    // else if($action=='already_logged_in'){
    //     echo "<div class='alert alert-info'>";
    //         echo "<strong>You are already logged in.</strong>";
    //     echo "</div>";
    // }

    // content once logged in
    echo "<div class='upages' id='load'>";
            include_once "landing.php";
    // echo "<div class='alert alert-info'>";
    //     echo "Content when logged ";
    // echo "</div>";
    echo "</div>";
echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
?>