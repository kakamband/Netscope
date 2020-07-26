<!-- SIDE NAVIGATION BAR -->
<nav class="col-md-3 bg-light sidebar">
    <div class="sidebar-sticky">
        <ul  class="nav flex-column">
            <li class="nav-item active">
                <a id="dash" class="nav-link active" href="#"><i class="fas fa-home"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#movieFn"><i class="fas fa-film"></i>&nbsp;&nbsp;Movies</a>
            </li>
            <div id="movieFn" class="collapse">
                <a class="mItem" href="add_movies" >Add</a>
                <a class="mItem" href="#">Delete</a>
                <a class="mItem" href="#">Modifie</a>    
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#userFn"><i class="fas fa-users"></i></i>&nbsp;Cutomers</a>
            </li>
            <div id="userFn" class="collapse">
                <a class="uItem" href="approval">Payments</a>
                <a class="uItem" href="#">Delete</a>
                <a class="uItem" href="#">Modifie</a>    
            </div>
        </ul>
        <p class="copy">&copy; NetScope.com</p>
    </div>
    
</nav>