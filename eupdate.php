<!DOCTYPE html>
<html>
<head>
    <title>Update Exhibition</title>
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

input[type=date] {
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
}
input[type=text], input[type=number], input[type=Date]
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

input[type=text]:focus,input[type=number]:focus {
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
   $id=$_SESSION['GID'];

    $eidErr = "";
    $eid = "";
 $n=0;

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

   ?>
<body>

<form ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"METHOD="POST">
  <div class="container">
    <center><h1 style="color:#3366cc" size="30";><font style="border: 10px solid grey; padding: 19px;">FILL THE FORM WITH PROPER DETAILS</font></h1></center>
    <hr>
    <center>
    <label for="EID"><b>Exhibition ID("EID under your gallery only")</b></label><span class="error">* <?php echo $eidErr;?></span><br><br>
    <input type="text" placeholder="Enter Exhibition ID" name="EID" required value="<?= $eid; ?>">
    <br>

    <!-- <label for="G_ID"><b>Gallery ID</b></label><br>
    <input type="text" placeholder="Enter Gallery ID" name="G_ID" required><br> -->

    <label for="startdate"><b>Start Date</b></label><span class="error">* <?php echo "startdate is required";?></span><br>
    <input type="Date" placeholder="Enter Start Date" name="STARTDATE" required>
    <br>
    <br>

    <label for="enddate"><b>End Date</b></label><span class="error">* <?php echo "enddate is required";?></span><br>
    <input type="Date" placeholder="Enter End Date" name="ENDDATE" required><br>
    <hr>

    <button type="submit" class="registerbtn">SUBMIT</button>
    <button type="reset" class="registerbtn1">RESET</button>
    </center>
  </div>
</form>
<p style="font-family: arial; "><a href="exhibition.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>
 <?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // if(isset($_POST['EID'])):
    //  // && isset($_POST['STARTDATE']) && isset($_POST['ENDDATE'])):
    // $eid = $_POST['EID'];
    // // $gid = $_POST['G_ID'];
    // $startdate = $_POST['STARTDATE'];
    // $enddate = $_POST['ENDDATE'];
    //  echo $id;
    //  echo $eid;
    // echo $startdate;
    // echo $enddate;

     if($n==1){
    $startdate = date('Y-m-d', strtotime($_POST['STARTDATE']));
    $enddate = date('Y-m-d', strtotime($_POST['ENDDATE']));

    $link = new mysqli('127.0.0.1:3307','root','','art_gallery');

    if($link->connect_error)
        die('connection error: '.$link->connect_error);

    $sql3 = "UPDATE exhibition set startdate='$startdate', enddate='$enddate' WHERE gid='$id' and eid='$eid'";

      

    $result = $link->query($sql3); 
    // echo $result;

    if($result > 0):
        echo 'Successfully Updated EXHIBITION table.';
    else:
        echo 'Unable to post';
    endif;

    $link->close();
    die();
    // endif; 
}
}
?>