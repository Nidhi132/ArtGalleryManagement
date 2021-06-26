<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<style>    
table{
        border-collapse: collapse;
        width: 60%;
        padding: 150px;
        margin-left: 280px;
     } 
    th, td {
             text-align: center;
             padding: 8px;
             border-radius: 12px;
            }
    tr:nth-child(even) 
    {
        background-color: #f2f2f2;   
    }
    tr{
        font-family:  "verdana";
    font-weight: bold; 
    font-size: 18px;
    }
    th {
    background-color: #6495ed;
    color: white;
    font-family:  "verdana";
    font-weight: bold; 
    font-size: 20px;   
}
input[type=text] {
    width: 199px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 19px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 22px 20px 22px 10px;
   /* -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;*/
    font-weight: bold;
    font-size: 30px;
}
input[type=text]:focus {
    width: 60%;
}

input[type=password] {
    width: 199px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 19px;
    /*font-size: 16px;*/
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 22px 20px 22px 10px;
   /* -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;*/
    font-weight: bold;
    font-size: 30px;
}
input[type=password]:focus {
    width: 60%;
}

.error {
    color: #FF0000;
    font-weight: lighter;
    /*font-size: 10px;*/
}


div{
    font-family: "verdana";
    font-weight: bold;
    font-size: 30px;
    font-style: bold;
    margin-left:25px;
    margin-top: 35px;
}
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
b{
    font-family: "verdana";
    background-color: lightcyan;
    color: black;
    margin-left:80px;
    border-radius: 8px;
    text-align: center;
    font-size: 30px;
    width: 85%;    
}
span{
    font-family: "verdana";
    background-color: lightcyan;
    color: black;
    margin-top:4px;
    border-radius: 8px;
    text-align: center;
    font-size: 30px;
    margin-left:0px;
    width: 35%;
    
    font-weight: bold;
}

div a{
    color: red;
    font-weight: lighter;
    font-size: 30px;
}


</style>
<body style="background-color: lavender">
    <h1><center><font style="border:9px solid mediumslateblue" face="arial">Login </font></center></h1>

    <?php

session_start();
 $cidErr = $pw3Err = $cid = "";
 $n=0;

  if (empty($_POST["CID"])) {
    $cidErr = "CID is required";
  } else {
    $cid = $_POST["CID"];
    if (!preg_match("/^[C][0-9a-zA-Z]*$/",$cid)) {
      $cidErr = "Enter proper cid(Starting with C---...)";
  }
  else{
    $n++;
  }
}

if (empty($_POST["PW3"])) {
    $pw3Err = "Correct Password is required";
  } else {
    // $pw2 = $_POST['PW2'];
    //create our salt
    $salt = 'XyZzy12*_';
    //store the filtered, salted, hashed version of the password
    $pw3 = sha1(filter_var($_POST['PW3'].$salt, FILTER_SANITIZE_STRING));
}

?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div>Enter Customer ID:<input type="text" name="CID" placeholder="CID" value="<?= $cid; ?>"><span class="error">* <?php echo $cidErr;?></span><br></div>
        <div>Enter PASSWORD:<input type="password" name="PW3" placeholder="PASSWORD"><span class="error">* <?php echo $pw3Err;?></span><br></div>
        <br><br>
        <button type="submit" class="registerbtn">SUBMIT</button>
    </form>

<p style="font-family: arial; "><a href="customer1.html"><font style="color:gold">GO BACK</font></a></p>

</body>
</html>    
 <?php
 // session_start();
    // if(isset($_POST['CID']) && isset($_POST['PW3'])):
    // $cid = $_POST['CID'];
    // // $pass = $_POST['PW2'];
    // // $ID = $_SESSION['GID'];
    // $salt = 'XyZzy12*_';

    // // $pw2 = sha1(filter_var($_POST['PW2'].$salt, FILTER_SANITIZE_STRING));
    // $pw3 = sha1(filter_var($_POST['PW3'].$salt, FILTER_SANITIZE_STRING));
    // echo $pw3;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($n==1){

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "select * from customer where cid='$cid'";
     $result = mysqli_query($link, $sql3);
     // echo !$result;

    $row = mysqli_fetch_assoc($result);
     // print_r($row);

    if($row['PW3'] == $pw3 && $row['CID'] == $cid):
        echo 'Successfully Logged In.';
        // session_start();
        $_SESSION['active'] = true;
        $_SESSION['CID'] = $_POST['CID'];
        echo ('Welcome back!');
        header('Location: http://localhost/art-gallery-database-management-master/customer.php');
    else:
        echo '<div><a>Incorrect password</a></div>';

    //  if ($result->numRows() < 1){
    //       echo 'Sorry, your username or password was incorrect!';
    // }
    // else{
      // // Create the session
      //    $session_start();
      //    $_SESSION['active'] = true;
      //    echo ('Welcome back!');
      //    header('Location: http://localhost/art-gallery-database-management-master/gallery.html');
    //  }
    endif; 

    $result = $link->query($sql3); 

     $link->close();
    die();
    // endif;
    


    // if($result > 0):
    //     echo 'Successfully Inserted into GALLERY table.';
    // else:
    //     echo 'Unable to post';
    // endif;

    // header('Location: http://localhost/art-gallery-database-management-master/gallery.html');

   

    
    // $sql = 'SELECT GID FROM GALLERY WHERE GID = ? AND PW2 = ?';
    // $result = $link->query($sql, array($_POST['GID'], $pw2));
    // //This time, look at the result to see if they exist
    // if ($result->numRows() < 1){
    //       echo 'Sorry, your username or password was incorrect!';
    // }
    // else{
    //   // Create the session
    //      $session_start();
    //      $_SESSION['active'] = true;
    //      echo ('Welcome back!');
    //      header('Location: http://localhost/art-gallery-database-management-master/gallery.html');   
    //  }
    //  endif; 
}
}
?>
