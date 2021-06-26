<html>
<head>
    <title>Search Artwork</title>
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
             padding: 21px;
             background-color: honeydew;
             
            }
    tr:nth-child(even) 
    {
        background-color: #f2f2f2;
        font-family: "arial";
        font-weight: bold;
        
    }
    th {
    background-color: mediumslateblue;
    color: white;
    font-weight: bold;
    font-family:  "verdana";
    font-weight: bold;
    
}
input[type=text], select {
    width: 210px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 9px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 25px 20px 22px 10px;
   /* -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;*/
    font-weight: bold;
    font-size: 30px;
}
input[type=text]:focus, select:focus {
    width: 60%;
}
div{
    font-family: "verdana";
    font-weight: bold;
    font-size: 30px;
    font-style: bold;
    margin-left:25px;
    margin-top: 35px;
}

.error {color: #FF0000;
font-weight: lighter;}

.btn{
    background-color: forestgreen;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor:auto;
    width: 10%;
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
.btn:hover 
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
p{
   /* font-family: "verdana";
    background-color: blueviolet;
    color: black;
    margin-top:4px;
    border-radius: 8px;
    text-align: center;
    font-size: 30px;
    margin-left:80px;
    width: 35%;*/
}
</style>
<?php

   session_start();
   $id=$_SESSION['AID'];
   // echo $id;
   $artidErr = "";
$artid = "";

 // $n=0;

  if (empty($_POST["ARTID"])) {
    $artidErr = "ARTID is required";
  } 
//   else {
//     $artid = $_POST["ARTID"];
//     if (!preg_match("/^[A][0-9a-zA-Z]*$/",$artid)) {
//       $artidErr = "Enter proper artid(Starting with A---...)";
//     }
//     else {
//         $n++;}
// }

  ?>
<body style="background-color: aliceblue">
    <h1><center><font style="border:9px solid grey" face="arial">SEARCH FROM ARTWORK TABLE </font></center></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div>Enter Artwork ID:

  <?php
$host="127.0.0.1:3307";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"art_gallery");
if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
echo "<select name= 'ARTID' value='<?= $artid; ?>'>";
echo '<option value="">'.'--- Please Select Artwork ID ---'.'</option>';

$sql="select ARTID from artwork";
$result = $con->query($sql);

 if ($result->num_rows > 0)
   {
while($row = $result->fetch_assoc())
{
    echo "<option value='". $row['ARTID']."'>".$row['ARTID'].'</option>';

}
}

echo '</select>';
        ?>


            <!-- <input type="text" name="ARTID" placeholder="ARTID" value="<?= $artid; ?>"> -->
            <br></div>
            <span class="error">* <?php echo $artidErr;?></span>
        <br><br>
        <button type="submit" value ="Find" class="btn">SEARCH</button>
    </form>
<?php
$host="localhost";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"art_gallery");
if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // if($n==1){
    $artid=$_POST['ARTID'];
    echo "<b><br>Entered Art ID is $artid and the Corresponding table is shown Below <br><br></b>";
    
    $sql="select * from artwork a, bid b where a.artid=b.artid and a.artid='$artid'";

                $result = $con->query($sql);

            if ($result->num_rows > 0) 
            {

            echo "<table><tr><th>ArtID</th><th>Title</th><th>Year</th><th>Type of Art</th><th>Price</th><th>Bid start time</th><th>Bid end time</th><th>Artist ID</th><th>Image</th></tr>";
                    while($row = $result->fetch_assoc()) {

                         $folder = "image/".$row["IMAGE"];

                         
               echo "<tr><td>" . $row["ARTID"]. "</td><td>" . $row["TITLE"]. "</td><td>" . $row["YEAR"]. "</td><td>" . $row["TYPE"]. "</td><td>" . $row["INITIALPRICE"]. "</td><td>" . $row["STARTTIME"]. "</td><td>" . $row["ENDTIME"]. "</td><td>" . $row["AID"]. "</td><td><a href= ".$folder." >".$row["IMAGE"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Please Enter Correct Art ID</p>";
        }
        }
    // }

        $con->close();
?>
<p style="font-family: arial"><a href="artwork.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="alogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>