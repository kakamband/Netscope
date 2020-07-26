<!--Navigation Bar-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style='padding:0;'>
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $home_url; ?>"><img src="NetImages/NetScopeLogoReSize2.png" alt="NetScope Logo"></a>
            <!--Create Navbar Toggler-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--List of items within toggler-->
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Lists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Freebies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comming Soon..</a>
                    </li>
                </ul>
                <?php
                // check if users / customer was logged in
                // if user is logged in, show "Logout","Search Movie" and "Cart" options
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='0'){
                    ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active" style="cursor: pointer">
                                <a class="nav-link" onclick="loadUser()" ><i class="fas fa-user"></i>&nbsp;<?php echo $_SESSION['uname']; ?></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"href="" data-toggle="dropdown" role="button" aria-expanded="false"><i id='cartico' class="fas fa-shopping-cart"></i></a>
                                <ul id="cart2" class="dropdown-menu dropdown-cart" role="menu" style="padding-right: 1.5em;">
                                <strong>Movie Cart</strong>    
                                <div id="cart1"></div>
                                    <div id='cartCheck'>
                                        <h6 id="total"></h6>
                                        <button id="btnCheckout" class="btn btn-primary btn lg" onclick="checkout()">Checkout</button>
                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <form class="form-inline" action="" id="searchdb" method="post" onsubmit = "return sub();">
                                    <input class="form-control mr-sm-2" list="search_results"  id="search_text" name="search_text" type="text" placeholder="Quick Search Movies">
                                    <!-- <button id="btnSearch" class="btn btn-primary btn lg" type="submit">Search</button> -->
                                    <!-- <ul id="search_results"></ul> -->
                                    <datalist id="search_results" onchange="changeFunc(id)">
                                    </datalist>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a id="logout" class="nav-link" href="<?php echo $home_url; ?>logout.php">&nbsp;&nbsp;Logout</a>
                            </li>
                        </ul>
                    <?php
                }
                // if user isn't logged in, show the "Login","Register"options
                else{
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <li <?php echo $page_title=="Login" ? "class='nav-item'" : ""; ?>>
                            <a class="nav-link" href="<?php echo $home_url; ?>login">Login</a>
                        </li>
                        <li <?php echo $page_title=="Register" ? "class='nav-item'" : ""; ?>>
                            <a class="nav-link" href="<?php echo $home_url; ?>register">Register</a>
                        </li>
                    </ul>
                    <?php
                    }
                ?>
            </div>
        </div>
    </nav>