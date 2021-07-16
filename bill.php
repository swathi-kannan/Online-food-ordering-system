<?php
session_start();
include_once('connection.php');
?>
<html>
<head>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="footer.css">
</head>
<style>
body{
    height: 100vh;
    background-image: url(bill.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
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
    			<a href="waiting.php">BACK</a>
  			</div>
		  </div>
      <form>
       <font size="4"><b><center><br>
      <table  style="height:400px;width:800px;">
              <thead>
                <tr>
                  <td>ITEM_NO</td>&nbsp;&nbsp;&nbsp;
                  <td>ITEM</td>&nbsp;
                  <td>PRICE</td>&nbsp;
                  <td>QUANTITY</td>&nbsp;&nbsp;
                  <td>ITEM TOTAL</td>&nbsp;&nbsp;
                </tr>
              </thead>
              <tbody>
               <?php
        $query = "SELECT * FROM cart where userid='".$_SESSION['userid']."' ORDER BY item_no ASC";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
          $total = 0;
          while($row = mysqli_fetch_array($result))
          {
        ?>
<form method="POST" action="cart.php">
<tr>
            <td><?php echo $row["item_no"]; ?></td>
            <td><?php echo $row["item"]; ?></td>
            <td>$ <?php echo $row["price"]; ?></td>
            <td><?php echo $row["quantity"]; ?></td>
            <?php $row["item_total"]=$row["quantity"] * $row["price"]  ?>
             <td>$<?php echo number_format($row["item_total"], 2);?></td>
            <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>" />
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
             <input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>" />
             <input type="hidden" name="hidden_item_total" value="<?php echo $row["item_total"]; ?>" />
</tr>
 <?php
      $total = $total + $row["item_total"];
}
}
          ?>
<tr>
            <td colspan="3" align="right">Total</td>
            <td colspan="1"align="right">$ <?php echo number_format($total, 2); ?></td>
            
</tr>
        </form>
        
              </tbody>
      </table>
      </font>
    </form>
      <div class="footer">
        <button class="button1" type="submit" onclick="myalert()" name="submit"><a href="thankyou.html">PAY</a></button>
      </div>
    </body>
     <script>
      function myalert() {
alert("PAYMENT WAS SUCCESSFULL");
}
</script>
</html>