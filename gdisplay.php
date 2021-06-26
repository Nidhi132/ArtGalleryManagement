<!DOCTYPE html>
<html>
<head>
 <title>Display Gallery</title>
 <style>
  b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 2px;
    text-align: center;
}
  table 
  {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
   font-family:"Verdana";
   font-weight: bold;
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
    border: 9px solid grey;
    border-radius: 17px;
     color: black;
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
  $id = $_SESSION['GID'];

  ?>
<body style="background-color: lavender">
  <h1><center><font style="border:9px solid grey"> DISPLAY CONTENTS /\/ GALLERY TABLE </font></center></h1>
 <table>
 <tr>
  <th><br>Gallery ID<br><br></th> 
  <th><br>GName<br><br></th> 
  <th><br>Location<br><br></th>
  <th><br>Phone<br><br></th>
  <th><br>Mail ID<br><br></th>
  <br><br>
 </tr>
  <?php
  
  // session_start();
  $id = $_SESSION['GID'];
  // echo $id;

$con = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "SELECT * from GALLERY g, gcontacts gc where g.gid = gc.gid and g.gid='$id'";
  mysqli_query($con,$sql);
  if ($result = mysqli_query($con, $sql))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["GID"]. "</td><td>" . $row["GNAME"]. "</td><td>". $row["LOCATION"]. "</td><td>" . $row["PHONE2"]. "</td><td>" . $row["MAILID2"]. "</td></tr>";
    }
    echo "</table>";
    }
else 
  { 
    echo "0 results"; 
  }
$con->close();
?>
</table>
<p style="font-family: arial; "><a href="gallery.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>