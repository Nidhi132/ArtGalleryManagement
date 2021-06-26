<!DOCTYPE html>
<html>
<head>
    <title>
        Updation in Artist
    </title>
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
    width: 15%;
    opacity: 0.7;
    align-content: center;
    font-family: "verdana";
    font-weight: bold;
    /*-webkit-box-shadow: 0px 6px 0px green;
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

$eidErr = $fnameErr = $lnameErr = $placeErr = $phoneErr = $styleErr = $mailidErr = $pw1Err = "";
 $eid = $fname = $lname = $place = $phone = $style = $mailid = "";
 $n=0;

//   if (empty($_POST["AID"])) {
//     $aidErr = "AID is required";
//   } else {
//     $aid = $_POST["AID"];
//     if (!preg_match("/^[A][0-9a-zA-Z]*$/",$aid)) {
//       $aidErr = "Enter proper aid(Starting with A---...)";
//     }
//     else {
//         $n++;}
// }

if (empty($_POST["EID"])) {
    $eidErr = "EID is required";
  } else {
    $eid = $_POST["EID"];
    if (!preg_match("/^[E][0-9a-zA-Z]*$/",$eid)) {
      $eidErr = "Enter proper gid(Starting with E---...)";
    }
    else {
        $n++;}
}

    // $gname = $_POST['GNAME'];
    if (empty($_POST["FNAME"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = $_POST["FNAME"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

if (empty($_POST["LNAME"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = $_POST["LNAME"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

    // $location = $_POST['LOCATION'];
    if (empty($_POST["PLACE"])) {
    $placeErr = "Location is required";
  } else {
    $place = ($_POST["PLACE"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$place)) {
      $placeErr = "Only letters and white space allowed";
  }
  else {$n++;}
}


 if (empty($_POST["PHONE1"])) {
    $phoneErr = "Phone1 is required";
  } else {
    $phone = $_POST["PHONE1"];
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
      $phoneErr = "Enter 10-digit no";
  }
  else {$n++;}
}

    // $phone2 = $_POST['PHONE2'];
    if (empty($_POST["STYLE"])) {
    $styleErr = "Location is required";
  } else {
    $style = ($_POST["STYLE"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$style)) {
      $styleErr = "Only letters and white space allowed";
  }
  else {$n++;}
}
    // $mailid2 = $_POST['MAILID2'];
    if (empty($_POST["MAILID1"])) {
    $mailidErr = "Mailid1 is required";
  } else {
    $mailid = $_POST["MAILID1"];
    if (!filter_var($mailid, FILTER_VALIDATE_EMAIL)) {
      $mailidErr = "Invalid email format";
  }
  else {$n++;}
}
    if (empty($_POST["PW1"])) {
    $pw1Err = "Password is required";
  } else {
    // $pw2 = $_POST['PW2'];
    //create our salt
    $salt = 'XyZzy12*_';
    //store the filtered, salted, hashed version of the password
    $pw1 = sha1(filter_var($_POST['PW1'].$salt, FILTER_SANITIZE_STRING));
}

  ?>
<body>

<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center><div style="font-weight: bold; font-size: 30px; font-family: 'verdana';">Your Artist ID is: <?php
         echo $id;
    ?>
    </div></center>
    <br>
    <br>
    <center>
    <!-- <label for="artistid"><b>Artist ID</b></label><br>
    <input type="text" placeholder="Enter Artist ID" name="AID" required><br> -->
   
    <label for="fname1"><b>Artist's First Name</b></label><span class="error">* <?php echo $fnameErr;?></span><br>
    <input type="text" placeholder="Enter First Name(characters only)" name="FNAME" required value="<?= $fname; ?>"><br>
    
    <label for="lname1"><b>Artist's Last Name</b></label><span class="error">* <?php echo $lnameErr;?></span><br>
    <input type="text" placeholder="Enter Last Name(characters only)" name="LNAME" required value="<?= $lname; ?>"><br>
    
    <label for="birthplace"><b>Birthplace of Artist</b></label><span class="error">* <?php echo $placeErr;?></span><br>
    <input type="text" placeholder="Enter place(characters only)" name="PLACE" required value="<?= $place; ?>"><br>

    <label for="style"><b>Style of Art</b></label><span class="error">* <?php echo $styleErr;?></span><br>
    <input type="text" placeholder="Enter Style Name(characters only)" name="STYLE" required value="<?= $style; ?>"><br>
    
    <label for="custid"><b>Mail ID</b></label><span class="error">* <?php echo $mailidErr;?></span><br>
    <input type="text" placeholder="Enter Mail ID" name="MAILID1" required value="<?= $mailid; ?>"><br>
    
    <label for="E_ID"><b>Exhibition ID</b></label><span class="error">* <?php echo $eidErr;?></span><br>
    <input type="text" placeholder="Enter Exhibition ID" name="EID" required value="<?= $eid; ?>"><br>
    
    <label for="G_ID"><b>PHONE</b></label><span class="error">* <?php echo $phoneErr;?></span><br>
    <input type="text" placeholder="Enter Phone no" name="PHONE1" required value="<?= $phone; ?>"><br>

    <label for="PW1"><b>PASSWORD</b></label><span class="error">* <?php echo $pw1Err;?></span><br>
    <input type="password" placeholder="Enter PASSWORD" name="PW1" required><br>
    <hr>

    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial; "><a href="artist.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>
  <?php
    // if(isset($_POST['FNAME']) && isset($_POST['LNAME'])):
    //  // && isset($_POST['E_ID']) && isset($_POST['birthplace']) && isset($_POST['style'])):

    // // $aid = $_POST['AID'];
    // // $gid = $_POST['G_ID'];
    // $fname = $_POST['FNAME'];
    // $lname = $_POST['LNAME'];
    // $eid = $_POST['EID'];
    // $place = $_POST['PLACE'];
    // $style = $_POST['STYLE'];
    // // $custid = $_POST['custid'];
    //  $phone = $_POST['PHONE1'];
    // $mailid = $_POST['MAILID1'];

    // $salt = 'XyZzy12*_';
    // //store the filtered, salted, hashed version of the password
    // $pw1 = sha1(filter_var($_POST['PW1'].$salt, FILTER_SANITIZE_STRING));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($n==7){

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "UPDATE ARTIST SET eid='$eid', fname='$fname', lname='$lname', place='$place', style='$style', mailid1='$mailid', pw1='$pw1' where aid='$id'";

    $result = $link->query($sql3); 

     $sql3 = "UPDATE acontacts SET phone1='$phone' where aid='$id'";

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully posted.' ;
    else:
        echo 'Unable to post';
    endif;
    
    // session_start();
    // $_SESSION['active'] = true;
    // $_SESSION['AID'] = $_POST['AID'];
    // echo ('Welcome back!');
    // header('Location: http://localhost/art-gallery-database-management-master/artist.php');

    $link->close();
    die();
    // endif; 
}
}
?>