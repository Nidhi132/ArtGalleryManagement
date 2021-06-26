<!DOCTYPE html>
<html>
<head>
 <title>Artist Display</title>
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
  <h1><center><font style="border:9px solid grey">DISPLAY CONTENTS /\/ ARTIST TABLE</font></center></h1>
 <table>
 <tr>
  <th><br>Artist ID<br><br></th> 
 <!--  <th><br>G ID<br><br></th> 
  <th><br>Cust ID<br><br></th> -->
  <th><br>EID<br><br></th>
  <th><br>FName<br><br></th>
  <th><br>LName<br><br></th>
  <th><br>Place<br><br></th>
  <th><br>Style<br><br></th>
  <th><br>Phone<br><br></th>
  <th><br>Mail ID<br><br></th>
  <br><br>
 </tr>
  <?php
$con = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  $sql = "SELECT * from artist a, acontacts ac where a.aid = ac.aid and a.aid='$id'";
  mysqli_query($con,$sql);

  if ($result = mysqli_query($con,$sql))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["AID"]. "</td><td>" . $row["EID"]. "</td><td>" . $row["FNAME"]. "</td><td>" . $row["LNAME"]. "</td><td>" .$row["PLACE"]. "</td><td>" . $row["STYLE"]. "</td><td>" . $row["PHONE1"]. "</td><td>" . $row["MAILID1"]. "</td></tr>";
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
<p style="font-family: arial; "><a href="artist.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>