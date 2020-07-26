<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Register";

// include login checker
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once 'objects/user.php';
include_once "libs/php/utils.php";

// include page header HTML
include_once "layout_head.php";
echo "<p id='pjoin' align='middle'><span id='join'>Join </span><span id='name'>NetScope</span></p> ";
echo "<div class='col-md-12'>";

    // if form was posted
    if($_POST){

        if(empty($_POST['uname'])||empty($_POST['email'])||empty($_POST['password'])){
            //Empty fields
            echo "<div class='alert alert-danger' role='alert'>Please fill all fields</div>";
        }
        else{
            //Fileds are filled
            if ($_POST["password"] === $_POST["cpassword"]) {
                // success!
                // get database connection
                $database = new Database();
                $db = $database->getConnection();
            
                // initialize objects
                $user = new User($db);
                $utils = new Utils();
    
                // set user email to detect if it already exists
                $user->email=$_POST['email'];
                // check if email already exists
                if($user->emailExists()){
                    echo "<div class='alert alert-danger'>";
                        echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
                    echo "</div>";
                }
                else{
                    // create user will be here
                    // set values to object properties
                    $user->uname=$_POST['uname'];
                    $user->password=$_POST['password'];
                    $user->access_level='0';
                    
                    // create the user
                    if($user->create()){
                    
                        echo "<div class='alert alert-success'>";
                            echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
                        echo "</div>";
                    
                        // empty posted values
                        $_POST=array();
                    
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
                    }
                }
            }
            else {
                // passwords do not match :(
                    echo "<div class='alert altLogin alert-danger ' role='alert'><i class='fas fa-exclamation-triangle'></i> Passwords do not match</div>";
                    
            }
        }

        
    
        
    }
?>
<form class="form-join" action='register.php' method='post' id='register'>
<!-- <img class="mb-4" src="NetImages/NetScopeLogoReSize5.png"> -->
    <table id='jtable' class='table table-responsive container'>
        <!-- <caption>Join NetScope</caption> -->
        <tr>
            <td class='jtname'>Username:</td>
            <td><input type='text' name='uname' class='form-control' required value="<?php echo isset($_POST['uname']) ? htmlspecialchars($_POST['uname'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
            <td class='jtname'>Email:</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
        <tr>
            <td class='jtname'>Password:</td>
            <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
        </tr>
        <tr>
            <td class='jtname'>Confirm Password:</td>
            <td><input type='password' name='cpassword' class='form-control' required id='cpasswordInput'></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Register</button>
            </td>
        </tr>

    </table>
</form>
<?php

echo "</div>";

// include page footer HTML
include_once "layout_foot.php";
?>