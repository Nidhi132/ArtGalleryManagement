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

<body style="background-color: lavender">
  <h1><center>The table contents are Displayed below</center></h1>
 <table>
 <tr>
  <th><br>Artwork ID<br><br></th> 
  <th><br>Title<br><br></th> 
  <!-- <th><br>Year<br><br></th> -->
  <th><br>Type of Art<br><br></th>
  <th><br>Initial Price<br><br></th>
  <!-- <th><br>Bid Start time<br><br></th>
  <th><br>Bid End time<br><br></th> -->
  <th><br>Artist ID<br><br></th>
  <th><br>Top bidder ID<br><br></th>
   <th><br>Top bidder first name<br><br></th>
   <th><br>Top bidder last name<br><br></th>
  <th><br>Selling price<br><br></th>
  <!-- <th><br>Image<br><br></th> -->
  <br><br>
 </tr>
 <?php

  include "bstatus.php";

$conn = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
//   $result=null;
//   $sql = "select * from artwork a, bid b where a.artid=b.artid and b.stat='finished' and b.cid is not null";
//   $result = $conn->query($sql) or die($conn->error);
//   if ($result->num_rows > 0)
//    {

//    while(($row = $result->fetch_assoc())!==null)
//     {
//       // echo "number of rows: " . $result->num_rows;
//       // print_r($row);
//        // $folder = "C:\xampp\htdocs\art-gallery-database-management-master\image\\".$row["IMAGE"];
//        // $cfolder = "C:\xampp\htdocs\art-gallery-database-management-master\afterimg\\".$row["IMAGE"];
       
//        // rename( $folder , $cfolder.$row["IMAGE"] );
//       $img=$row['IMAGE'];
//       echo $img;

//       if (file_exists($img)) {

//      // last resort setting
//      // chmod($oldPicture, 0777);
//      chmod($img, 0644);
//      unlink($img);
//    }
// }
// }

       // unlink(__DIR__.'\\'.$img);

      // $sql3 = "INSERT INTO artwork(artid, title, type, initialprice, aid, topbid, cid) VALUES('".$row['ARTID']."', '".$row['TITLE']."', '".$row['TYPE']."', '".$row['INITIALPRICE']."', '".$row['AID']."', '".$row['TOPBID']."', '".$row['CID']."'')";

    include "./image/del.php";


     $sql3 = "INSERT INTO afterbid(artid, title, type, initialprice, aid, topbid, cid) select a.artid, a.title, a.type, a.initialprice, b.aid, b.topbid, b.cid from artwork a inner join bid b on a.artid=b.artid where b.stat='finished' and b.cid is not null";
     $result = $conn->query($sql3); 


 // $sql = "CREATE trigger afterbid_insert after insert on afterbid for each row begin delete from artwork where artid in (select artid from afterbid) end";
 //  mysqli_query($conn,$sql);


  //    }
  // }

  // $sql = "delete from artwork where exists (select * from artwork a, bid b where a.artid=b.artid and b.cid is not null and b.stat='finished')";

  $sql = "delete from artwork where artid in (select artid from afterbid) ";
  $result = $conn->query($sql); 

  
 // require "./image/del.php";

  // $sql = "select * from afterimage a, afterbid b, customer c where a.artid=b.artid and b.cid=c.cid";
  $sql = "select * from afterbid a, customer c where a.cid=c.cid";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
      // $folder = "image/".$row["IMAGE"];
    echo "<tr><td>" . $row["ARTID"]. "</td><td>" . $row["TITLE"]. "</td><td>" . $row["TYPE"]. "</td><td>" . $row["INITIALPRICE"]. "</td><td>". $row["AID"]. "</td><td>" . $row["CID"]. "</td><td>" . $row["FNAME1"]. "</td><td>" . $row["LNAME1"]. "</td><td>" . $row["TOPBID"]. "</td></tr>";
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
<p style="font-family: arial; "><a href="FrontEnd.html"><font style="color:gold">GO BACK</font></a></p>
<!-- <p style="font-family: arial"><a href="artwork.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p> -->
</body>
</html>