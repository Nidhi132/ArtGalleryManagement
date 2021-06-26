<?php
$conn = mysqli_connect("127.0.0.1:3307", "root", "", "art_gallery");

  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

  $sql = "select * from artwork a, bid b where a.artid=b.artid and b.cid is not null and b.stat='finished'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {
   
   while($row = $result->fetch_assoc())
    {
       $folder = "C:\xampp\htdocs\art-gallery-database-management-master\image\\".$row["IMAGE"];
       // $cfolder = "C:\xampp\htdocs\art-gallery-database-management-master\afterimg\\".$row["IMAGE"];
       
       // rename( $folder , $cfolder.$row["IMAGE"] );
      
      $img=$row['IMAGE'];
      $fol =dirname( __DIR__).'\\'.$img;
      $id=$row['ARTID'];
      // if (file_exists($folder)) {
      // if ($img) {
     // last resort setting
     // chmod($img, 0777);
     // chmod($fol, 0644);
     unlink(__DIR__.'\\'.$img);
   // }

       // unlink(__DIR__.'\\'.$img);


  // $sql = "update artwork set IMAGE=null where artid='$id'";
  // $result = $conn->query($sql); 
}
}

?>