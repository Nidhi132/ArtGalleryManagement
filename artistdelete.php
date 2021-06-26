<html>
<head>
    <title>Delete from Artist</title>
</head>
<style>
b{
    font-size: 30px;
    font-family: 'Arial';
    padding: 27px 62px;
}
/*input[type=text] {
    width: 110px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
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
input[type=text]:focus {
    width: 50%;
}*/

.disp{
    font-size: 40px;
    font-weight: bold;
}
div{
    font-family: 'Verdana';
    font-size: 35px;
    font-weight:bold;
    margin-left:25px;
    margin-top: 35px;
}
.btn{
    background-color: brown;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 10%;
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
.btn:hover 
{
    opacity: 1;
    background-color:forestgreen;
}

</style>
<?php

   session_start();
   $id=$_SESSION['AID'];
   // echo $id;


  ?>
<body style="background-color: lavenderblush">
    <h1><center><font style="border:9px solid grey" face="arial">DELETE FROM ARTIST TABLE </font></center></h1>
    <form action="artistdelete.php" method="POST">
        <div class="disp">Would you like to DELETE GALLERY?<br></div>
        <br><br>
        <button type="submit" value ="Delete" class="btn">DELETE</button>
        <!-- <button type="reset" value ="Reset" class="btn">RESET</button> -->
    </form>
 <?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "art_gallery";


$con = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // $a=$_POST['artistid'];

    if($id!="")
        {
            $sql1 = "SELECT * from artist where aid='$id'";
            $result = mysqli_query($con,$sql1);

            if(mysqli_num_rows($result)>0)
            {
            $sql3="DELETE from artist where aid='$id'"; 
            mysqli_query($con,$sql3);
            echo "<b>Record with artisid = $id is deleted successfully.<b>";
            }
           else
        {
            echo "<b>!!!Error in Deleting Record!!!<br> Record '$id' was not found in database.<b>" ;
        }
        }
        else
        {
                echo "<b>Artist ID Field is Empty</b>";
            }
$con->close();
}
?>
<p style="font-family: arial; "><a href="artist.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>