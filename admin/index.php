<?php
// core configuration
include_once "../config/core.php";
// check if logged in as admin
include_once "login_checker.php";

// set page title
$page_title="Admin Index";

// include page header HTML
include 'layout_head.php';

    echo "<div id='dashmini'>";
            //sidebar.js will load each option on the side bar w/o refreshing the page. dash_page has been set to default
    echo "</div>";


// include page footer HTML
include_once 'layout_foot.php';
?>