<?php
// core configuration
    include_once "config/core.php";

// set page title
    $page_title = "Login";

// include login checker
    $require_login=false;
    include_once "login_checker.php";

// default to false
    $access_denied=false;

// post code
    if($_POST){
        // include user class and database class
        include_once "config/database.php";
        include_once "objects/user.php";
        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        // initialize objects
        $user = new User($db);
        // check if email and password are in the database
        $user->email=$_POST['email'];
        // check if email exists, also get user details using this emailExists() method
        $email_exists = $user->emailExists();

        // login validation
        if ($email_exists && password_verify($_POST['password'], $user->password)){
        
            // if it is true, set the session value to true
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['access_level'] = $user->access_level;
            $_SESSION['uname'] = htmlspecialchars($user->uname, ENT_QUOTES, 'UTF-8') ;
        
            // if access level is 1, redirect to admin section
            if($user->access_level=='1'){
                header("Location: {$home_url}admin/index.php?action=login_success");
            }
        
            // else, redirect only to 'Customer' section
            else{
                header("Location: {$home_url}index.php?action=login_success");
            }
        }
        
        // if username does not exist or password is wrong
        else{
            $access_denied=true;
        }

//////////////////////////////////////////////////////////////////////

        // check if given email exist in the database
        function emailExists(){
            // query to check if email exists
            $query = "SELECT id, uname, access_level, password
                    FROM " . $this->table_name . "
                    WHERE email = ?
                    LIMIT 0,1";
        
            
            $stmt = $this->conn->prepare( $query ); // prepare the query
            $this->email=htmlspecialchars(strip_tags($this->email)); // sanitize
            $stmt->bindParam(1, $this->email);// bind given email value
            $stmt->execute();// execute the query
            $num = $stmt->rowCount();// get number of rows
        
            // if email exists, assign values to object properties for easy access and use for php sessions
            if($num>0){
                // get record details / values
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                // assign values to object properties
                $this->id = $row['id'];
                $this->uname = $row['uname'];
                $this->access_level = $row['access_level'];
                $this->password = $row['password'];
                // return true if email exists in the database
                return true;
            }
            // return false if email does not exist in the database
            return false;
        }
    }

// login html here
include_once "layout_head.php";
            echo "<style>body {
                width: 95%;
                height: 90vh;
                color: #fff;
                background: linear-gradient(-45deg, #4b0000, #131313, #131313, #4b0000);
                background-size: 400% 400%;
                animation: gradientBG 15s ease infinite;
            }
        
        
            @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
            }</style>";
            
            echo "<img class='mb-4 logo' src='NetImages/NetScopeLogoReSize5.png' align='middle'>";
            echo "<div class='logstart'>";
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<h1 class='h3 mb-3 font-weight-normal'>Please Sign in</h1>";
                    echo "<input type='email' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Password' required />";
                    echo "<p id='logLead' class='lead'>Don't have an account? </p><a href='{$home_url}register'>Create account.</a>";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                echo "</form>";
            echo "</div>";
// get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";

// tell the user he is not yet logged in
    if($action =='not_yet_logged_in'){
        echo "<div class='alert altLogin alert-danger ' role='alert'><i class='fas fa-exclamation-triangle'></i> Please login.</div>";
    }
    // tell the user to login
    else if($action=='please_login'){
        // echo "<div class='alert altLogin alert-info'><i class='fas fa-exclamation-triangle'></i>
        //         <strong> Please login to proceed.</strong>
        //     </div>";
    }

    // tell the user email is verified
    else if($action=='email_verified'){
        echo "<div class='alert altLogin alert-success altLogin'><i class='fas fa-exclamation-triangle'></i>
            <strong> Your email address have been validated.</strong>
        </div>";
    }

    // tell the user if access denied
    if($access_denied){
        echo "<div class='alert alert-danger altLogin' role='alert'><i class='fas fa-exclamation-triangle'></i>
                &nbsp;Access Denied.<br /><br />
                Your username or password maybe incorrect
            </div>";
    }
// footer HTML and JavaScript codes
include_once "layout_foot.php";

?>