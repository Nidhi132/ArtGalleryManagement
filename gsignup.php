 <!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
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

/*input[type=password] {
    width: 199px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 19px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 22px 20px 22px 10px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    font-weight: bold;
    font-size: 30px;
}
input[type=password]:focus {
    width: 60%;
}*/

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
<body>

 <?php

session_start();
 $gidErr = $gnameErr = $locationErr = $phone2Err = $mailid2Err = $pw2Err = "";
 $n=0;

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

<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center>
    <label for="G_ID"><b>Gallery ID</b></label><span class="error">* <?php echo $gidErr;?></span><br>
    <input type="text" placeholder="Enter GID" name="GID" value="<?php $gid ?>" required><br>
    

    <label for="GNAME"><b>GNAME</b></label><span class="error">* <?php echo $gnameErr;?></span><br>
    <input type="text" placeholder="Enter Gallery Name" name="GNAME" required><br>
    

    <label for="LOCATION"><b>LOCATION</b></label><span class="error">* <?php echo $locationErr;?></span><br>
    <input type="text" placeholder="Enter GLOCATION" name="LOCATION" required><br>
    

    <label for="PHONE2"><b>PHONE NUMBER</b></label><span class="error">* <?php echo $phone2Err;?></span><br>
    <input type="text" placeholder="Enter PH_NO" name="PHONE2" required><br>
    

    <label for="MAILID2"><b>MAIL ID</b></label><span class="error">* <?php echo $mailid2Err;?></span><br>
    <input type="text" placeholder="Enter MAIL_ID" name="MAILID2" required><br>
    

    <label for="PW2"><b>PASSWORD</b></label><span class="error">* <?php echo $pw2Err;?></span><br>
    <input type="password" placeholder="Enter PASSWORD" name="PW2" required><br>
    
    </hr>


    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial; "><a href="gallery1.html"><font style="color:gold">GO BACK</font></a></p>

</body>
</html>

 <?php

 // $gidErr = $gnameErr = $locationErr = $phone2Err = $mailid2Err = $pw2Err = "";

    // if(isset($_POST['GID']) && isset($_POST['GNAME']) && isset($_POST['LOCATION'])):
        // && isset($_POST['PHONE2']) && isset($_POST['MAILID2'] && isset($_POST['PW2']))):

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $gid = $_POST['GID'];
//     if (empty($_POST["GID"])) {
//     $gidErr = "GID is required";
//   } else {
//     $gid = $_POST["GID"];
//     if (!preg_match("/^[G][0-9]*$/",$gid)) {
//       $gidErr = "Enter proper gid(Starting with G***...)";
//   }
// }

//     // $gname = $_POST['GNAME'];
//     if (empty($_POST["GNAME"])) {
//     $gnameErr = "Name is required";
//   } else {
//     $gname = $_POST["GNAME"];
//     if (!preg_match("/^[a-zA-Z-' ]*$/",$gname)) {
//       $gnameErr = "Only letters and white space allowed";
//     }
//   }

//     // $location = $_POST['LOCATION'];
//     if (empty($_POST["LOCATION"])) {
//     $locationErr = "Location is required";
//   } else {
//     $location = test_input($_POST["LOCATION"]);
//     if (!preg_match("/^[a-zA-Z-' ]*$/",$location)) {
//       $locationErr = "Only letters and white space allowed";
//   }
// }

//     // $phone2 = $_POST['PHONE2'];
//     if (empty($_POST["PHONE2"])) {
//     $phone2Err = "Phone2 is required";
//   } else {
//     $phone2 = $_POST["PHONE2"];
//     if (!preg_match('/^[0-9]{10}+$/', $phone2)) {
//       $phone2Err = "Enter 10-digit no";
//   }
// }
//     // $mailid2 = $_POST['MAILID2'];
//     if (empty($_POST["MAILID2"])) {
//     $mailid2Err = "Mailid2 is required";
//   } else {
//     $mailid2 = $_POST["MAILID2"];
//     if (!filter_var($mailid2, FILTER_VALIDATE_EMAIL)) {
//       $mailid2Err = "Invalid email format";
//   }
// }
//     if (empty($_POST["PW2"])) {
//     $pw2Err = "Password is required";
//   } else {
//     // $pw2 = $_POST['PW2'];
//     //create our salt
//     $salt = 'XyZzy12*_';
//     //store the filtered, salted, hashed version of the password
//     $pw2 = sha1(filter_var($_POST['PW2'].$salt, FILTER_SANITIZE_STRING));
// }

        if($n==5){

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "INSERT INTO GALLERY(gid, gname, location, mailid2, pw2) VALUES('".$gid."', '".$gname."', '".$location."', '".$mailid2."', '".$pw2."')";

      

    $result = $link->query($sql3); 


     $sql3 = "INSERT INTO gcontacts(gid, phone2) VALUES('".$gid."', '".$phone2."')";

    $result = $link->query($sql3);



    if($result > 0):
        echo 'Successfully Inserted into GALLERY table.<br>';
        // $_SESSION['active'] = true;
        // $_SESSION['GID'] = $_POST['GID'];  
        // echo ('Welcome back!');<br>
        // <h3 style="color=blue; font-weight=bold;">echo 'Now go back and login'</h3>
        // header('Location: http://localhost/art-gallery-database-management-master/gallery.html');

    else:
        echo 'Unable to post';
    endif;

        $_SESSION['active'] = true;
        $_SESSION['GID'] = $_POST['GID'];  
        echo ('Welcome back!');
        echo '<h3 style="color=blue; font-weight=bold;">Now go back and login</h3>';
        // $_SESSION['active'] = true;
        // $_SESSION['GID'] = $_POST['GID'];
        // echo ('Welcome back!');
        // header('Location: http://localhost/art-gallery-database-management-master/gallery.html');

    $link->close();
    die();
    // endif;

// header('Location: http://localhost/art-gallery-database-management-master/gallery.html');

}
}
?>
