<!DOCTYPE html>
<html>
<head>
 <title>Customer Display</title>
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
     color: black;
     border: 9px solid grey;
     border-radius: 17px;
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
  $id = $_SESSION['AID'];

  ?>
<body style="background-color: lavender">
  <h1><center><font style="border:9px solid grey">DISPLAY CONTENTS /\/ CUSTOMER TABLE</font></center></h1>
 <table>
 <tr>
  <th><br>Cust ID<br><br></th> 
  <th><br>Gallery ID<br><br></th> 
  <th><br>First Name<br><br></th>
  <th><br>Last Name<br><br></th>
  <th><br>Date of Birth<br><br></th>
  <th><br>Age<br><br></th>
  <!-- <th><br>Address<br><br></th>
  <th><br>Phone<br><br></th>
  <th><br>Mail ID<br><br></th>
 -->
  <br><br>
 </tr>
  <?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");
// echo " <b><center>Creating Stored Procedure...</center></b>";

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  // $sql = "SELECT * from CUSTOMER c, contacts cc where c.cid = cc.cid and c.cid='$id'";
  $sql = "CREATE PROCEDURE GetAge() SELECT *, year(current_date())-year(dob) as AGE from CUSTOMER"; 
  mysqli_query($con,$sql);
  // echo "<b><center>Procedure  Created Successfully.</center></b>";
  // echo "<b><center>Calling Stored Procedure for finding age!!!</center></b>";

  // if ($result = mysqli_query($con,"$sql"))
  if ($result = mysqli_query($con,"CALL GetAge()"))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["CID"]. "</td><td>" . $row["GID"]. "</td><td>" . $row["FNAME1"]. "</td><td>" . $row["LNAME1"]. "</td><td>" . $row["DOB"]. "</td><td>" . $row["AGE"]. "</td></tr>";
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
<p style="font-family: arial"><a href="artist.php"><font style="color:brown">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>