<?php

//common variables

    // Show ERRORS
    error_reporting(E_ALL);

    // Start php session
    session_start();

    // Set Timezone
    date_default_timezone_set('Asia/Colombo');

    // Home url
    $home_url="http://dev.netscope.com/";

    // page given in URL parameter, default page is one
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // set number of records per page
    $records_per_page = 5;

    // calculate for the query LIMIT clause
    $from_record_num = ($records_per_page * $page) - $records_per_page;
?>