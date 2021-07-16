<?php
session_start();
include_once('connection.php');
if(isset($_POST['delete'])){
        $del = "DELETE FROM cart WHERE item_no='".$_POST["hidden_id"]."'";
          $result= mysqli_query($conn,$del);   
    }
    
    if(isset($_POST['cpy_orders'])){
  $itemno=$_POST["hidden_id"];
  $item=$_POST["hidden_name"];
  $price=$_POST["hidden_price"];
  $quantity=$_POST["hidden_quantity"];
        $sql = "INSERT INTO orders (item_no, item,price,quantity)
        SELECT $itemno,$item,$price,$quantity FROM cart";
          $result1 = mysqli_query($conn,$sql);
          if(mysqli_stmt_execute($result1)){
                header("location: waiting.php");
            } 
            else{
                echo '<span style="color:red;">Something went wrong. Please try again later.</span>';
            }
    }    

?>
<html>
<head>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="style.css">
</head>
<style>
body{
    height: 100vh;
    background-image: url(food.jpg);
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
  width:150px;
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
          <a href="userhome.php">HOME</a>
        </div>
      </div>
      <form>
      <font color="white" size="4"><b><center><br>
      <table  style="height:400px;width:800px;">
              <thead>
                <tr>
                  <td>ITEM_NO</td>&nbsp;&nbsp;
                  <td>ITEM</td>&nbsp;
                  <td>PRICE</td>&nbsp;&nbsp;
                   <td>QUANTITY</td>&nbsp;&nbsp;
                    <td>ITEM TOTAL</td>&nbsp;&nbsp;
                </tr>
              </thead>
              <tbody>
        <?php
        $query = "SELECT * FROM cart where userid='".$_SESSION['userid']."' ORDER BY item_no ASC";
        $result= mysqli_query($conn, $query);
          while($row = mysqli_fetch_assoc($result))
          {
        ?>
<form method="POST" action="cart.php">
<tr>
            <td><?php echo $row["item_no"]; ?></td>
            <td><?php echo $row["item"]; ?></td>
            <td>$ <?php echo $row["price"]; ?></td>
            <td><?php echo $row["quantity"]; ?></td>
            <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>" />
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
             <input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>" />
            <td><input type="submit" name="delete" class="btn" value="delete from cart"/>
            </td>
</tr>
        </form>
        <?php
          }
      ?>
              </tbody>
      </table>
      </font>
    </form>
      <div class="footer">
        <div class="row">
        <div class="column1">
          <button class="button1" type="submit" onclick="myalert()"  name="cpy_orders"><a href="waiting.php">DINE-IN CONFIRM</a></button>
        </div>
        <div class="column2">
          <button class="button1" type="submit" name="submit"><a href="parcelbill.php">TAKE AWAY CHECKOUT</a></button>
        </div>
      </div>
      </div>
    </body>
     <script>
      function myalert() {
alert("ORDER PLACED \n ORDER RECEIVED IN COOKING AREA");
}
</script>
</html>

  
      
          
            
        