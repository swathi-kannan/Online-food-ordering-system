<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: userhome.php");
  exit;
}
// Include config file
require_once "connection.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = '<span style="color:red;">Please enter username.</span>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = '<span style="color:red;">Please enter password.</span>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT userid, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $userid, $username, $dbpassword);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password==$dbpassword){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userid"] = $userid;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: userhome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = '<span style="color:red;">The password you entered was not valid.</span>';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = '<span style="color:red;">No account found with that username.</span>';
                }
            } else{
                echo '<span style="color:red;">Oops! Something went wrong. Please try again later.</span>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }  
    // Close connection
    mysqli_close($conn);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
        <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
  			<div class="topnav-right">
  				<a href="admin_login.php">ADMIN</a>
    			<a href="register.php">REGISTER</a>
  			</div>
		</div>
        <div class="container">
          <h1>LOGIN</h1>
            <form class="myForm" method="post" action="userlogin.php">
			<div class="row">
         <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label for="uname">User name</label><br>
				<input type="text" id="username" name="username" value="<?php echo $username; ?>" ><br><br>
         <span class="help-block"><?php echo $username_err; ?></span>
       </div>
       <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
				<label for="pwd">Password</label><br>
				<input type="password" id="password" name="password" value="<?php echo $password; ?>" >
        <span class="help-block"><?php echo $password_err; ?></span>
        </div>
			</div>	
			<button type="submit"  name="submit" value="login">LOGIN</button>
            </form>
        </div>
        </div>
    </body>  
</html>