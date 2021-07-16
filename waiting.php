<html>
<head>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="footer.css">
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
body{
    height: 100vh;
    background-image: url(food.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.carousel-inner img {
  left:17%;
  top:17%;
    width: 100%;
    height: 84%;
  }
    </style>
    <body>
      <div class="topnav">
  			<img src="logo.jpg" height='50' width='70' alt="Logo">
        <div class="topnav-right">
          <a href="userhome.php">HUNGRY AGAIN ?</a>
        </div>
		  </div>
      <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slide1.jpg" alt="Los Angeles" >
    </div>
    <div class="carousel-item">
      <img src="slide2.jpg" alt="Chicago" >
    </div>
    <div class="carousel-item">
      <img src="slide3.jpg" alt="New York" >
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="footer">
        <button class="button1" type="submit" name="submit"><a href="bill.php">CHECKOUT</a></button>
      </div>
    </body>
</html>