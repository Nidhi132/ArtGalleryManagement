<!DOCTYPE html>
<html>
<head>
    <title>Update Artwork</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h1{
    border: 10px solid grey;
    border-radius: 28px;
    padding: 19px;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
}

* {
    box-sizing: border-box;
}

.container {
    padding: 19px;
    background-color: snow;
}

/* Full-width input fields */
input[type=text], input[type=year], input[type=DateTime-local],  input[type=file]
 {
    width: 50%;
    padding: 19px;
    margin: 5px 0 32px 0;
    display: inline-block;
    border-radius: 8px;
    border: 2px solid grey;
    background: #f1f1f0;
    font-weight: bold;
    font-size: 19px;
}

input[type=text]:focus, input[type=text]:focus, input[type=DateTime-local]:focus,  input[type=file]:focus {
    background-color: #ffffff;
    outline: none;
}

hr {
    border: 1.5px solid #f1f1f1;
    margin-bottom: 35px;
}

.error {color: #FF0000;}

.registerbtn{
    background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 15%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
   /* -webkit-box-shadow: 0px 6px 0px green;
    -moz-box-shadow: 0px 6px 0px green;
    box-shadow: 0px 6px 0px green;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)*/
    }
.registerbtn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}

.registerbtn1{
    background-color: red;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 15%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
    /*-webkit-box-shadow: 0px 6px 0px darkred;
    -moz-box-shadow: 0px 6px 0px darkred;
    box-shadow: 0px 6px 0px darkred;
    -webkit-transition: all .1s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: translate(0, 5px) rotateX(25deg);
    -moz-transform: translate(0, 4px);
    transform: translate(0, 4px)*/
    }
.registerbtn1:hover 
{
    opacity: 1;
    background-color:red;
}

label{
    font-weight: bold;
    font-size: 20px;
    font-family: 'verdana';
}
</style>
</head>
<?php

   session_start();
   $id=$_SESSION['AID'];
   // echo $id;

   $artidErr = $titleErr = $typeErr = $yearErr = $priceErr = $starttimeErr = $endtimeErr = $imageErr = "";
$artid = $title = $type = $year = $price = $starttime = $endtime = $filename = "";

 $n=0;

  if (empty($_POST["ARTID"])) {
    $artidErr = "ARTID is required";
  } else {
    $artid = $_POST["ARTID"];
    if (!preg_match("/^[A][0-9a-zA-Z]*$/",$artid)) {
      $artidErr = "Enter proper artid(Starting with A---...)";
    }
    else {
        $n++;}
}

if (empty($_POST["TITLE"])) {
    $titleErr = "Title is required";
  } else {
    $title = $_POST["TITLE"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
      $titleErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

  if (empty($_POST["TYPE"])) {
    $typeErr = "Type is required";
  } else {
    $type = $_POST["TYPE"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$type)) {
      $typeErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

  if (empty($_POST["YEAR"])) {
    $yearErr = "Year is required";
  } else {
    $year = $_POST["YEAR"];
    if (!preg_match("/^[012][0-9]{3}+$/",$year)) {
      $yearErr = "Enter a valid year-yyyy";
    }
    else {$n++;}
  }

   if (empty($_POST["INITIALPRICE"])) {
    $priceErr = "Price is required";
  } else {
    $price = $_POST["INITIALPRICE"];
    if (!preg_match("/^[0-9]*$/",$price)) {
      $priceErr = "Enter a valid price";
    }
    else {$n++;}
  }

   // if (empty($_POST["IMAGE"])) {
   //  $imageErr = "Image is required";
   //  } 
   //  else{
   // $filename = $_FILES["IMAGE"]["name"]; 
   //  $tempname = $_FILES["IMAGE"]["tmp_name"];
   //  $folder = "image/".$filename;
//     $f=0;
//     $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));

//     if (file_exists($folder)) {
//   $imageErr="Sorry, file already exists.";
//   $f++;
//   }

// // Check file size
// if ($_FILES["IMAGE"]["size"] > 500000) {
//   $imageErr="Sorry, your file is too large.";
//   $f++;
// }

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   $imageErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// $f++;
// }

// if($f==0){
//     $n++;
// }
// }


  ?>
<body>

<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST" enctype="multipart/form-data">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center>
    <!-- <label for="E_ID"><b>Exhibition ID</b></label><br>
    <input type="text" placeholder="Enter Exhibition ID" name="E_ID" required><br>

    <label for="G_ID"><b>Gallery ID</b></label><br>
    <input type="text" placeholder="Enter Gallery ID" name="G_ID" required><br> -->

    <label for="artid"><b>Artwork ID (ARTID under your AID only!)</b></label><span class="error">* <?php echo $artidErr;?></span><br>
    <input type="text" placeholder="Enter Art ID" name="ARTID" required value="<?= $artid;?>"><br>

    <!-- <label for="artistid"><b>Artist ID</b></label><br>
    <input type="text" placeholder="Enter Artist ID" name="artistid" required><br> -->

    <label for="title"><b>Title of Art</b></label><span class="error">* <?php echo $titleErr;?></span><br>
    <input type="text" placeholder="Enter Title of Art" name="TITLE" required value="<?= $title;?>"><br>

    <label for="type_of_art"><b>Type of Art</b></label><span class="error">* <?php echo $typeErr;?></span><br>
    <input type="text" placeholder="Enter Type of Art" name="TYPE" required value="<?= $type;?>"><br>

    <label for="year"><b>Published Year</b></label><span class="error">* <?php echo $yearErr;?></span><br>
    <input type="year" placeholder="Enter Published Year" name="YEAR" required value="<?= $year;?>"><br>

    <label for="price"><b>Initial Price of Art</b></label><span class="error">* <?php echo $priceErr;?></span><br>
    <input type="text" placeholder="Enter Price of Art" name="INITIALPRICE" required value="<?= $price;?>"><br>

    <label for="price"><b>Bid Start time(0000-00-00 00:00:00)</b></label><span class="error">* <?php echo "";?></span><br>
    <input type="DateTime-local" placeholder="Enter Price of Art" name="STARTTIME" required><br>
     <br>
     <br>
    <label for="price"><b>Bid End time(0000-00-00 00:00:00)</b></label><span class="error">* <?php echo "";?></span><br>
    <input type="DateTime-local" placeholder="Enter Price of Art" name="ENDTIME" required><br>
    <br>
    <br>
    <br>
    
    <label for="price"><b>Image</b></label><span class="error">* <?php echo $imageErr;?></span><br>
    <input type="file" name="IMAGE" value="" required value="<?= $filename;?>">
    <hr>

    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial"><a href="artwork.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>

<?php
error_reporting(0); 
?> 
 
 <?php
    // if(isset($_POST['ARTID'])):
    // // isset($_POST['title']) && isset($_POST['type_of_art']) && isset($_POST['year']) && isset($_POST['price'])):
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if($n==5){


    // // $eid = $_POST['E_ID'];
    // // $gid = $_POST['G_ID'];
    // $artid = $_POST['ARTID'];
    // // $artistid = $_POST['artistid'];
    // $title = $_POST['TITLE'];
    // $type = $_POST['TYPE'];
    // $year = $_POST['YEAR'];
    // $price = $_POST['INITIALPRICE'];
    $starttime=$_POST['STARTTIME'];
    $endtime=$_POST['ENDTIME'];
    $filename = $_FILES["IMAGE"]["name"]; 
    $tempname = $_FILES["IMAGE"]["tmp_name"];
    $folder = "image/".$filename;

    // echo $artid,$title;
    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    


    $sql3 = "UPDATE artwork set title='$title', type='$type', initialprice='$price', year='$year', image='$filename' where aid='$id' and artid='$artid'";

     $result = $link->query($sql3); 
     // echo !$result;

//      if ($f == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
     if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully";
            echo $msg; 
        }else{ 
            $msg = "Failed to upload image";
            echo $msg;
        }
    // }


    $nt = new DateTime($starttime);
    $stime = $nt->getTimestamp();
    
    $nt = new DateTime($endtime);
    $etime = $nt->getTimestamp();
    
    $date = time();
    
    // echo "$starttime"." "."$endtime "."$date"."<br>";
    if($stime > $date)
    {
        $status = "yet to bid";
    }
    else if($stime <= $date && $etime >= $date)
    {
        $status = "ongoing";
    }
    else if($stime < $date)
    {
        $status = "finished";
    }

    $sql = "UPDATE bid set stat='$status', starttime='$starttime', endtime='$endtime' where aid='$id' and artid='$artid'";

    $result1 = $link->query($sql);
    // echo !$result1;

    if($result > 0 && $result1 > 0):
        echo 'Successfully updated Artwork';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    // endif; 

}
}
?>