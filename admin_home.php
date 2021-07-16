<?php
session_start();
include_once('connection.php');
?>
<html>
<head>
        <link rel="stylesheet" href="navbar.css">
</head>
<style>
body{
    height: 100vh;
    background-image: url(adminhome.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.btn {
  background-color:black; 
  outline:none;
  border:0px;
  border-radius: 16px;
  color: white;
  padding: 10px 16px;
  width:170px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
form{
    position: absolute;
    top:80px;
    left:17%;
    border: 2px rgba(0,0,0,0.8);
    border-radius: 8px;
    width:850px;
    height:450px;
    background-color: white;
}
    </style>
    <body>
      <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
  			<div class="topnav-right">
          <a href="admin_updatemenu.php">UPDATE MENU</a>
    			<a href="admin_login.php">LOGOUT</a>
  			</div>
		  </div>
      <form>
      <font color="white" size="4"><b><center><br>
      <table  style="height:400px;width:800px;">
              <thead>
                <tr>
                  <td>USER ID</td>&nbsp;
                  <td>ITEM_NO</td>&nbsp;&nbsp;
                  <td>ITEM</td>&nbsp;
                   <td>QUANTITY</td>&nbsp;&nbsp;
                </tr>
              </thead>
              <tbody>
        <?php
        $query = "SELECT userid,item_no,item,quantity FROM cart ORDER BY userid ASC";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
<form method="POST" action="cart.php">
<tr>
             <td><?php echo $row["userid"]; ?></td>
            <td><?php echo $row["item_no"]; ?></td>
            <td><?php echo $row["item"]; ?></td>
            <td><?php echo $row["quantity"]; ?></td>
             <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />
            <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>" />
             <input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>" />
            
</tr>
        </form>
        <?php
          }
        }
      ?>
     <tr> <td><input type="submit" name="delete_from_orders" class="btn" value="ORDER DELIVERED"/>
            </td>
          </tr>
              </tbody>
      </table>
      </font>
    </form>
    </body>
</html>