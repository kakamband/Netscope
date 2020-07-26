<!-- RED NAVIGATION BAR -->

<nav class="navbar navbar-custom navbar-expand-md fixed-top p-0 shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $home_url; ?>admin/index.php"><img src="../NetImages/NetScopeLogoReSize2White.png" alt="NetScope Logo"></a>
        <!--Create Navbar Toggler-->
        <button id="nav-toggle-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
        <i class="fas fa-bars"></i>
        </button>
            <!--List of items within toggler-->
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a id="admin" class="nav-link" href="#"><i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['uname']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a id="logout" class="nav-link" href="<?php echo $home_url; ?>logout.php">Logout</a>
                    </li>
            </ul>
            </div>
        </div>
    </div>
</nav>
