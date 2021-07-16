<?php
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = '<span style="color:red;">Please enter a username.</span>';
    } else{
        // Prepare a select statement
        $sql = "SELECT userid FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = '<span style="color:red;">This username is already taken.</span>';
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo '<span style="color:red;">Oops! Something went wrong. Please try again later.</span>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = '<span style="color:red;">Please enter a password.</span>';     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = '<span style="color:red;">Password must have atleast 8 characters.</span>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $cconfirm_password_err = '<span style="color:red;">Please confirm password.</span>';     
    } 
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = '<span style="color:red;">Password and re-enter password did not match.</span>';  
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo '<script>alert("Account created successfully");</script>';
                header("location: userlogin.php");
            } 
            else{
                echo '<span style="color:red;">Something went wrong. Please try again later.</span>';
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
	<style>
	@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
*{
    margin: 0;
    padding: 0;
    outline: 0;
    font-family: 'Open Sans', sans-serif;
}
.topnav {
  background-color: rgba(0,0,0,.8);
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #f2f2f2;
  color: black;
}
.topnav-right {
  float: right;
}
body{
    height: 100vh;
    background-image: url(food.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
/*.filter{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(0,0,0,.7);
}*/
.container{
    position: absolute;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 20px 25px;
    width: 450px;
	 height:350px;
    background-color: rgba(0,0,0,.8);
    box-shadow: 0 0 10px rgba(255,255,255,.8);
}
.container h1{
    text-align: center;
    color: #fafafa;
    margin-bottom: 25px;
    border-bottom: 4px solid #2979ff;
}

.container form input{
    text-align: left;
    padding: 8px 30px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #2979ff;
    color: #fff;
    font-size: 20px;
}
#area{
   padding: 25px 30px;

}
.container label{
    color: #90caf9;
}
.container form button{
    width: 100%;
    padding: 5px 0;
    border: none;
    background-color:#2979ff;
    font-size: 18px;
    color: #fafafa;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
   font-size: 8px;
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
	</style>
    <body>
        <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
  			<div class="topnav-right">
    			<a href="userlogin.php">LOGIN</a>
  			</div>
		</div>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br> 
        <div class="container">
         
           <h1>REGISTRATION</h1>
            <form method="post" action="register.php">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>&emsp;&emsp;&emsp;&emsp;
                <input type="text" name="username" value="<?php echo $username; ?>"><br>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>&emsp;&emsp;&emsp;&emsp;&nbsp;
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>"><br>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>&nbsp;
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"><br>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="Submit">REGISTER</button>
            </div>
        </form>
        </div>
        </div>
    </body>  
</html>




