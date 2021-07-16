<?php
session_start();

if (isset($_POST['submit'])) 
{
  include_once('connection.php');
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  $sql = "SELECT * FROM admin where username = '$username' and password='$password' ";
  $query= $conn->query($sql);
  if($query) {
    $row = mysqli_fetch_row($query);
    $adminid= $row[0];
        $dbusername= $row[1];
        $dbpassword= $row[2];
       }
  if($username == $dbusername && $password == $dbpassword) {
    $_SESSION['id'] = $adminid;
        $_SESSION['if'] = $dbusername;
        $_SESSION['il'] = $dbpassword;
    header('Location: admin_home.php');
  }
  else {
   // echo "<b><i>username/password incorrect </i><b>";
     echo"<script>
    alert('username/password incorrect , Re-enter.');
    </script>";


  }
}

?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
      body{
    height: 100vh;
    background-image: url(adminlogin.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
    </style>
    <body>
        <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
  			<div class="topnav-right">
          <a href="userlogin.php">BACK</a>
  			</div>
		</div>
        <div class="container">
           <h1>ADMIN LOGIN</h1>
          <form method="post" action="admin_login.php">
			     <div class="row">
            <label for="uname">User name</label><br>
				    <input type="text" name="username" required><br><br>
				    <label for="pwd">Password</label><br>
				    <input type="password"  name="password" required><br><br>
			     </div>	
			     <button type="submit" name="submit" value="submit">LOGIN</button>
          </form>
        </div>
        </div>
    </body>  
</html>