 <!DOCTYPE html>
<html>
<head>
    <title>Update Gallery</title>
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

input[type=text], input[type=text], input[type=password]
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

input[type=text]:focus, input[type=text]:focus, input[type=password]:focus {
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
    width: 15%; opacity: 0.7; align-content: center;
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
   $id=$_SESSION['GID'];
   // echo $id;
   $gnameErr = $locationErr = $phone2Err = $mailid2Err = $pw2Err = "";
   $gname = $location = $phone2 = $mailid2 = $pw2 = "";
 $n=0;

//   if (empty($_POST["GID"])) {
//     $gidErr = "GID is required";
//   } else {
//     $gid = $_POST["GID"];
//     if (!preg_match("/^[G][0-9a-zA-Z]*$/",$gid)) {
//       $gidErr = "Enter proper gid(Starting with G---...)";
//     }
//     else {
//         $n++;}
// }

    // $gname = $_POST['GNAME'];
    if (empty($_POST["GNAME"])) {
    $gnameErr = "Name is required";
  } else {
    $gname = $_POST["GNAME"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$gname)) {
      $gnameErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

    // $location = $_POST['LOCATION'];
    if (empty($_POST["LOCATION"])) {
    $locationErr = "Location is required";
  } else {
    $location = ($_POST["LOCATION"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$location)) {
      $locationErr = "Only letters and white space allowed";
  }
  else {$n++;}
}

    // $phone2 = $_POST['PHONE2'];
    if (empty($_POST["PHONE2"])) {
    $phone2Err = "Phone2 is required";
  } else {
    $phone2 = $_POST["PHONE2"];
    if (!preg_match('/^[0-9]{10}+$/', $phone2)) {
      $phone2Err = "Enter 10-digit no";
  }
  else {$n++;}
}
    // $mailid2 = $_POST['MAILID2'];
    if (empty($_POST["MAILID2"])) {
    $mailid2Err = "Mailid2 is required";
  } else {
    $mailid2 = $_POST["MAILID2"];
    if (!filter_var($mailid2, FILTER_VALIDATE_EMAIL)) {
      $mailid2Err = "Invalid email format";
  }
  else {$n++;}
}
    if (empty($_POST["PW2"])) {
    $pw2Err = "Password is required";
  } else {
    // $pw2 = $_POST['PW2'];
    //create our salt
    $salt = 'XyZzy12*_';
    //store the filtered, salted, hashed version of the password
    $pw2 = sha1(filter_var($_POST['PW2'].$salt, FILTER_SANITIZE_STRING));
}

  ?>
<body>

<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">Update your gallery details</font></h1></center>
    <hr>
    <center><div style="font-weight: bold; font-size: 30px; font-family: 'verdana';">Your GALLARY ID is:<?php
         echo $id;
    ?>
    </div></center>
    <br>
    <br>
    <center>
    <!-- <label for="G_ID"><b>Gallery ID</b></label><br>
    <input type="text" placeholder="Enter G_ID" name="GID" required><br> -->

    <label for="GNAME"><b>GNAME</b></label><span class="error">* <?php echo $gnameErr;?></span><br>
    <input type="text" placeholder="Enter Gallery Name" name="GNAME" required value="<?= $gname; ?>"><br>

    <label for="LOCATION"><b>LOCATION</b></label><span class="error">* <?php echo $locationErr;?></span><br>
    <input type="text" placeholder="Enter GLOCATION" name="LOCATION" required value="<?= $location; ?>"><br>

    <label for="PHONE2"><b>PHONE NUMBER</b></label><span class="error">* <?php echo $phone2Err;?></span><br>
    <input type="text" placeholder="Enter PH_NO" name="PHONE2" required value="<?= $phone2; ?>"><br>

    <label for="MAILID2"><b>MAIL ID</b></label><span class="error">* <?php echo $mailid2Err;?></span><br>
    <input type="text" placeholder="Enter MAIL_ID" name="MAILID2" required value="<?= $mailid2; ?>"><br>

    <label for="PW2"><b>PASSWORD</b></label><span class="error">* <?php echo $pw2Err;?></span><br>
    <input type="password" placeholder="Enter PASSWORD" name="PW2" required><br>
    </hr>


    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial; "><a href="gallery.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>
 <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // if(isset($_POST['GNAME']) && isset($_POST['LOCATION'])):
    // // $gid = $_POST['G_ID'];
    // $gname = $_POST['GNAME'];
    // $location = $_POST['LOCATION'];
    // $phone2 = $_POST['PHONE2'];
    // $mailid2 = $_POST['MAILID2'];
    // // $pw2 = $_POST['PW2'];
    // //create our salt
    // $salt = 'XyZzy12*_';
    // //store the filtered, salted, hashed version of the password
    // $pw2 = sha1(filter_var($_POST['PW2'].$salt, FILTER_SANITIZE_STRING));

         if($n==4){

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "UPDATE GALLERY set gname='$gname', location='$location', mailid2='$mailid2', pw2='$pw2' WHERE gid='$id'";
    //  $result = mysqli_query($link, $sql3);

    // $row = mysqli_fetch_assoc($result);
    //  print_r($row);
    //  if($row['LOCATION']=='Bengaluru'){
    //     header('Location: http://localhost/art-gallery-database-management-master/gdisplay.php');
    //  }
    //  else{
    //     header('Location: http://localhost/art-gallery-database-management-master/gallery.php');
    //  }
      

    $result = $link->query($sql3); 

     $sql3 = "UPDATE gcontacts set phone2='$phone2' WHERE gid='$id'";
     $result = $link->query($sql3); 


    if($result > 0):
        echo 'Successfully updated GALLERY table.';
        // header('Location: http://localhost/art-gallery-database-management-master/gdisplay.php');
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    // endif; 

}
}
?>
