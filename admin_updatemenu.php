<?php
session_start();
include_once('connection.php');
if(isset($_POST['delete_from_disp'])){
        $del = "DELETE FROM dispmenu WHERE item_no='".$_POST["hidden_id"]."'";
          $result = mysqli_query($conn,$del);
    }
if(isset($_POST['add_to_disp'])){
        $sql = "INSERT INTO dispmenu (item_no, item, price)
        VALUES ('".$_POST["hidden_id"]."','".$_POST["hidden_name"]."','".$_POST["hidden_price"]."')";
          $result1 = mysqli_query($conn,$sql);
    }    
?>
<html>
<head>
        <link rel="stylesheet" href="navbar.css">
</head>
<style>
body{
    height: 100vh;
    background-image: url(updatemenu.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 1300px 1500px;
}
.btn {
  background-color:black; 
  outline:none;
  border:0px;
  border-radius: 16px;
  color: white;
  padding: 10px 16px;
  width:150px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
    <body>
      <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
  			<div class="topnav-right">
    			<a href="admin_home.php">MY HOME</a>
  			</div>
		  </div>
      <font color="black" size="4"><b><center><br>
      <table  style="height:900px;width:850px;font-weight: bold">
              <thead>
                <tr>
                  <td>ITEM_NO</td>&nbsp;&nbsp;&nbsp;
                  <td>ITEM</td>&nbsp;
                  <td>PRICE</td>&nbsp;&nbsp;
                  <td>ADD MENU</td>&nbsp;&nbsp;
                  <td>DELETE MENU</td>
                </tr>
              </thead>
              <tbody>
<?php
       $sql = "SELECT * FROM menu";
       $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
<form method="POST" action="admin_updatemenu.php">
<tr>
            <td><?php echo $row["item_no"]; ?></td>
            <td><?php echo $row["item"]; ?></td>

            <td>$ <?php echo $row["price"]; ?></td>

            <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

            <td><input type="submit" name="add_to_disp" class="btn" value="Add" /></td>
            <td><input type="submit" name="delete_from_disp" class="btn" value="Delete" /></td>
</tr>
        </form>

        <?php
          }
        }
      ?>
              </tbody>
      </table>
      </font>
    </body>
</html>
