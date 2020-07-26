<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://kit.fontawesome.com/569046a3ca.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="sidebar.js"></script>   
    <link rel="stylesheet" href="../libs/css/admin.css" type="text/css">

    <title><?php echo isset($page_title) ? strip_tags($page_title) : "NetScope Admin"; ?></title>
    <link rel="shortcut icon" href="../NetImages/NetScopeFav.png" type="image/png"/>
</head>
<body>
<div class="row">
    <?php
        // include top navigation bar
        include_once "navigation_red.php";
    ?>
</div>
    <div class="row2">
    <div class="content">
        
            <?php
                // include top navigation bar
                include_once "navigation_side.php";
            ?>