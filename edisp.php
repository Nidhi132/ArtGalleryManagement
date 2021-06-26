<!DOCTYPE html>
<html>
<head>
 <title>Exhibition Display</title>
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
   $id=$_SESSION['GID'];
   ?>
<body style="background-color: lavender">
  <h1><center><font style="border:9px solid grey">DISPLAY CONTENTS /\/ EXHIBITION TABLE</font></center></h1>
 <table>
 <tr>
  <th><br>Exhibition ID<br><br></th> 
  <th><br>Gallery ID<br><br></th> 
  <th><br>Start Date<br><br></th>
  <th><br>End Date<br><br></th>
  <th><br>Status<br><br></th>
  <br><br>
 </tr>
  <?php
   // session_start();
   // $id=$_SESSION['GID'];
$con = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");
// echo " <b><center>Creating Stored Procedure...</center></b>";

  if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
  } 

  // $sql = "SELECT * from Exhibition where gid='$id'";
   $sql = "CREATE procedure display1() SELECT *, case when (startdate <= sysdate() && enddate >= sysdate()) then 'Ongoing' when (startdate > sysdate()) then 'yet to bid' else 'Finished' end as stat from exhibition";
  mysqli_query($con,$sql);
   // echo "<b><center>Procedure  Created Successfully.</center></b>";
  // echo "<b><center>Calling Stored Procedure!!!</center></b>";
  if ($result = mysqli_query($con,"CALL display1()"))

  // if ($result = mysqli_query($con,$sql))
   {
   
   while($row = $result->fetch_assoc())
    {
    echo "<tr><td>" . $row["EID"]. "</td><td>" . $row["GID"]. "</td><td>" . $row["STARTDATE"]. "</td><td>". $row["ENDDATE"]. "</td><td>". $row["STAT"]. "</td></tr>";
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
<p style="font-family: arial; "><a href="exhibition.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>