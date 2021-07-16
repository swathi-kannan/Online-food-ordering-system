<?php
$conn = new mysqli("localhost", "root","","db") or die ("Failed to connect");
 $userid = $_GET['userid'];
$sql="select * from cart where (userid='$userid');";//  check id is already copied 
      $res= $conn->query($sql);
      if (mysqli_num_rows($res) > 0) 
      {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if($userid==$row['userid'])
        {
			echo "Already copied"; //error message if already copied      
        }

      } 
      else
      {
		$query=mysqli_query($conn,"INSERT INTO orders
		SELECT * FROM  cart WHERE userid =$userid");// copy one table to another 
		echo "Successfully copied"; 
     }     
?>