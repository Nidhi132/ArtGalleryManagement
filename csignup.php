<!DOCTYPE html>
<html>
<head>
    <title>Insertion Customer</title>
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

/*input[type=date] {
    width: 17%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 18px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 20px 20px 22px 10px;
    font-weight: bold;
    font-size: 25px;
}*/
input[type=text], input[type=tel], input[type=number], input[type=password], input[type=Date]
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

input[type=text]:focus,input[type=number],input[type=tel]:focus, input[type=password]:focus, input[type=Date]:focus {
    background-color: #ffffff;
    outline: none;
}

/*input[type=password] {
    width: 199px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 19px;
    /*font-size: 16px;*/
    /*background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 22px 20px 22px 10px;*/
   /* -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;*/
   /* font-weight: bold;
    font-size: 30px;
}
input[type=password]:focus {
    width: 60%;
}*/

.error {color: #FF0000;}

hr {
    border: 1.5px solid #f1f1f1;
    margin-bottom: 35px;
}
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
   /* -webkit-box-shadow: 0px 6px 0px darkred;
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
<body>

<?php

session_start();
 $cidErr = $gidErr = $fnameErr = $lnameErr = $addressErr = $phoneErr = $dobErr = $mailidErr = $pw3Err = "";
 $cid = $gid = $fname = $lname = $address = $phone = $dob = $mailid = $pw3 = "";
 $n=0;

  if (empty($_POST["CID"])) {
    $cidErr = "CID is required";
  } else {
    $cid = $_POST["CID"];
    if (!preg_match("/^[C][0-9a-zA-Z]*$/",$cid)) {
      $cidErr = "Enter proper cid(Starting with C---...)";
    }
    else {
        $n++;}
}

if (empty($_POST["GID"])) {
    $gidErr = "GID is required";
  } else {
    $gid = $_POST["GID"];
    if (!preg_match("/^[G][0-9a-zA-Z]*$/",$gid)) {
      $gidErr = "Enter proper gid(Starting with G---...)";
    }
    else {
        $n++;}
}

    // $gname = $_POST['GNAME'];
    if (empty($_POST["FNAME1"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = $_POST["FNAME1"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

if (empty($_POST["LNAME1"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = $_POST["LNAME1"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
    else {$n++;}
  }

    // $location = $_POST['LOCATION'];
    if (empty($_POST["ADDRESS"])) {
    $addressErr = "Location is required";
  } else {
    $address = ($_POST["ADDRESS"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) {
      $addressErr = "Only letters and white space allowed";
  }
  else {$n++;}
}


 if (empty($_POST["PHONE3"])) {
    $phoneErr = "Phone3 is required";
  } else {
    $phone = $_POST["PHONE3"];
    if (!preg_match('/^[0-9]{10}+$/', $phone)) {
      $phoneErr = "Enter 10-digit no";
  }
  else {$n++;}
}

    // $phone2 = $_POST['PHONE2'];
//     if (empty($_POST["DOB"])) {
//     $dobErr = "DOB is required";
//   } else {
//     $dob = $_POST["DOB"];
//     if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $dob)) {
//       $dobErr = "Enter 10-digit no";
//   }
//   else {$n++;}
// }
    // $mailid2 = $_POST['MAILID2'];
    if (empty($_POST["MAILID3"])) {
    $mailidErr = "Mailid3 is required";
  } else {
    $mailid = $_POST["MAILID3"];
    if (!filter_var($mailid, FILTER_VALIDATE_EMAIL)) {
      $mailidErr = "Invalid email format";
  }
  else {$n++;}
}
    if (empty($_POST["PW3"])) {
    $pw3Err = "Password is required";
  } else {
    // $pw2 = $_POST['PW2'];
    //create our salt
    $salt = 'XyZzy12*_';
    //store the filtered, salted, hashed version of the password
    $pw3 = sha1(filter_var($_POST['PW3'].$salt, FILTER_SANITIZE_STRING));
}

 ?>


<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center>
    <label for="custid"><b>Customer ID</b></label><span class="error">* <?php echo $cidErr;?></span><br>
    <input type="text" placeholder="Enter Customer ID" name="CID" required value="<?= $cid;?>"><br>

    <label for="fname"><b>Customer's First Name</b></label><span class="error">* <?php echo $fnameErr;?></span><br>
    <input type="text" placeholder="Enter First Name" name="FNAME1" required value="<?= $fname;?>"><br>

    <label for="lname"><b>Customer's Last Name</b></label><span class="error">* <?php echo $lnameErr;?></span><br>
    <input type="text" placeholder="Enter Last Name" name="LNAME1" required value="<?= $lname;?>"><br>

    <label for="dob"><b>Date of Birth</b></label><span class="error">* <?php echo "";?></span><br>
    <input type="Date" placeholder="Enter Date of Birth" name="DOB" required><br>
    <!-- <br>
    <br>
    <br> -->

    <label for="address"><b>Address</b></label><span class="error">* <?php echo $addressErr;?></span><br>
    <input type="text" placeholder="Enter Address" name="ADDRESS" required value="<?= $address;?>"><br>

    <label for="phone"><b>Contact Number</b></label><span class="error">* <?php echo $phoneErr;?></span><br>
    <input type="tel" placeholder="Enter Contact Number" name="PHONE3" required value="<?= $phone;?>"><br>

    <label for="G_ID"><b>Gallery ID</b></label><span class="error">* <?php echo $gidErr;?></span><br>
    <input type="text" placeholder="Enter Gallery ID" name="GID" required value="<?= $gid;?>"><br>

    <label for="artid"><b>Mail ID</b></label><span class="error">* <?php echo $mailidErr;?></span><br>
    <input type="text" placeholder="Enter Mail ID" name="MAILID3" required value="<?= $mailid;?>"><br>

    <label for="PW3"><b>PASSWORD</b></label><span class="error">* <?php echo $pw3Err;?></span><br>
    <input type="password" placeholder="Enter PASSWORD" name="PW3" required><br>
    <hr>

    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial; "><a href="customer1.html"><font style="color:gold">GO BACK</font></a></p>
</body>
</html>
 <?php
    // if(isset($_POST['CID']) && isset($_POST['FNAME1']) && isset($_POST['LNAME1'])):
     // && isset($_POST['DOB']) && isset($_POST['ADDRESS']) && isset($_POST['GID']) && isset($_POST['PHONE3']) && isset($_POST['MAILID3']) && isset($_POST['PW3'])):

    // $cid = $_POST['CID'];
    // $gid = $_POST['GID'];
    // $fname = $_POST['FNAME1'];
    // $lname = $_POST['LNAME1'];
    // $dob = $_POST['DOB'];
    // $address = $_POST['ADDRESS'];
    // $phone = $_POST['PHONE3'];
    // $mailid = $_POST['MAILID3'];

    // $salt = 'XyZzy12*_';
    // //store the filtered, salted, hashed version of the password
    // $pw3 = sha1(filter_var($_POST['PW3'].$salt, FILTER_SANITIZE_STRING));

     if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($n==7){
         $dob = date('Y-m-d', strtotime($_POST['DOB']));

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO customer(cid, gid, fname1, lname1, dob, address, mailid3, pw3) VALUES('".$cid."', '".$gid."', '".$fname."', '".$lname."', '".$dob."', '".$address."',  '".$mailid."', '".$pw3."')";

    $result = $link->query($sql3); 

    $sql3 = "INSERT INTO contacts(cid, phone3) VALUES('".$cid."','".$phone."')";

    $result = $link->query($sql3); 

    if($result > 0):
        echo 'Successfully posted.<br>' ;
        $_SESSION['active'] = true;
        $_SESSION['CID'] = $_POST['CID'];
        echo ('Welcome back!');
        echo '<h3 style="color=blue; font-weight=bold;">Now go back and login</h3>';
         // header('Location: http://localhost/art-gallery-database-management-master/customer.php');
    else:
        echo 'Unable to post';
    endif;

    
    // $_SESSION['active'] = true;
    // $_SESSION['CID'] = $_POST['CID'];
    // echo ('Welcome back!');
    // echo '<h3 style="color=blue; font-weight=bold;">Now go back and login</h3>';

    // header('Location: http://localhost/art-gallery-database-management-master/customer.php');

    $link->close();
    die();
    // endif; 

}
}
?>