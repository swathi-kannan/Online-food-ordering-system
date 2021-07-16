<?php
session_start();
include_once('connection.php');
if (isset($_SESSION['userid']))
{
    if(isset($_POST['add_to_cart'])){
        $sql = "INSERT INTO cart (userid,item_no, item, price,quantity)
        VALUES ('".$_POST["hidden_uid"]."','".$_POST["hidden_id"]."','".$_POST["hidden_name"]."','".$_POST["hidden_price"]."','".$_POST["quantity"]."')";
          $result = mysqli_query($conn,$sql);
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    *{
    margin: 0;
    padding: 0;
    outline: 0;
  }
  .btn {
  background-color:black; 
  outline:none;
  border:0px;
  border-radius: 16px;
  color: white;
  padding: 2px 14px;
  width:150px;
  height:50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  .jumbotron {
    background-color:#FE0002;
    color: #fff;
    padding: 30px 10px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 2px 2px;
  }
  .bg-yellow {
    background-color: #FFC72C;
  }
  .navbar {
    margin-bottom: 0;
    background-color: rgba(0,0,0,.8);
    overflow: hidden;
    z-index: 9999;
    border: 0;
    right:0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar  {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #000000 !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }  
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="logo.jpg" height='50' width='70' alt="Logo">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cart.php">MY CART</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>FOOD MENU</h1> 
  <p>People who loves food are the best !</p> 
   <p>
    USER ID : <?php echo $_SESSION['userid']; ?> &emsp;
    Hi&nbsp;<?php echo $_SESSION['username']; ?>!
   </p>
</div>

<!-- Container (About Section) -->
<div class="container-fluid text-center bg-yellow">
  <div class="row slideanim">
    <div class="col-sm-12" style="height:895px">
       <h2>MENU</h2>
      <font size="4"><b><center><br>
      <table  style="height:1550px;width:1200px;">
              <thead>
                <tr>
                  <td>ITEM_NO</td>&nbsp;&nbsp;&nbsp;
                  <td>ITEM</td>&nbsp;
                  <td>PRICE</td>&nbsp;&nbsp;
                  <td>QUANTITY</td>&nbsp;&nbsp;
                  <td>ADD TO CART</td>&nbsp;&nbsp;
                </tr>
              </thead>
              <tbody>
                <?php
        $query = "SELECT * FROM dispmenu ORDER BY item_no ASC";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
<form method="POST" action="userhome.php">
<tr>
            <td><?php echo $row["item_no"]; ?></td>
            <td><?php echo $row["item"]; ?></td>

            <td>$ <?php echo $row["price"]; ?></td>

            <td><input type="number" name="quantity" min="1" value="1"  /></td>
             <input type="hidden" name="hidden_uid" value="<?php echo $_SESSION['userid']; ?>" />
            <input type="hidden" name="hidden_id" value="<?php echo $row["item_no"]; ?>" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
            <td><input type="submit" name="add_to_cart" class="btn" value="Add to Cart" /></td>
</tr>

        </form>
        <?php
          }
        }
      ?>
              </tbody>
      </table>
      </font>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->



<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
<script>
          var name=var name="<?php  session_start();  echo "Hi ".$_SESSION['username'];?>"
          document.getElementById("username").innerHTML=name;
</script>
</body>
</html>

      
        
    
      