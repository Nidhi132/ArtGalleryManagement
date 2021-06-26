<!DOCTYPE html>
<html>
<head>
 <title>Bid details Display</title>
 <style>
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   text-align: center;
   border-radius: 14px;
  } 
  th 
  {
   background-color: mediumpurple;
   color: white;
   border-radius: 14px;
  }
  h1{
    font-family: "Arial";
    font-size: 50px;
     color: slategrey;
  }
  td{
    padding: 12px;
    border-radius: 14px;
  }
  tr:nth-child(even) {background-color: #f2f2f2; 
    border-radius: 14px;}
 </style>
</head>
<?php

   session_start();
   $id=$_SESSION['AID'];
   // echo $id;


  ?>
<body style="background-color: lavender">
  <h1><center>The table contents are Displayed below</center></h1>
  <div>Change the bid time and keep it again for bidding</div>
  <div>Best of Luck!!</div>
 <table>
 <tr>
  <th><br>Artwork ID<br><br></th> 
  <th><br>Title<br><br></th> 
  <th><br>Year<br><br></th>
  <th><br>Type of Art<br><br></th>
  <th><br>Initial Price<br><br></th>
  <th><br>Bid Start time<br><br></th>
  <th><br>Bid End time<br><br></th>
  <th><br>Artist ID<br><br></th>
  <th><br>Status<br><br></th>
 <!--  <th><br>Top bidder ID<br><br></th>
   <th><br>Top bidder first name<br><br></th>
   <th><br>Top bidder last name<br><br></th>
  <th><br>Selling price<br><br></th> -->
  <th><br>Image<br><br></th>
  <br><br>
 </tr>
 <?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "select * from artwork a, bid b where a.artid=b.artid and b.endtime < sysdate() and b.stat='finished' and b.cid is null";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
      $folder = "image/".$row["IMAGE"];
    echo "<tr><td>" . $row["ARTID"]. "</td><td>" . $row["TITLE"]. "</td><td>" . $row["YEAR"]. "</td><td>" . $row["TYPE"]. "</td><td>" . $row["INITIALPRICE"]. "</td><td>". $row["STARTTIME"]. "</td><td>" . $row["ENDTIME"]. "</td><td>" . $row["AID"]. "</td><td>" . $row["STAT"]. "</td><td><a href= ".$folder." >".$row["IMAGE"]."</td></tr>";
    }
    echo "</table>";
   
    }
else 
  { 
    echo "0 results"; 
  }
$conn->close();
?>
</table>
<p style="font-family: arial"><a href="artist.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>