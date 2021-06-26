<html>
<head>
    <title>Search Gallery</title>
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
input[type=text], select {
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
    background-color: green;
    color: white;
    padding: 16px 10px;
    margin: 8px 20px 20px 50px;
    border-radius: 24px;
    cursor: pointer;
    width: 10%;
    opacity: 0.8;
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
    background-color:green;
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
</style>
<?php

 session_start();
  $id = $_SESSION['GID'];
   $gidErr = "";
   $gid = "";
   // $n=0;

  if (empty($_POST["GID"])) {
    $gidErr = "GID is required";
  } 
//   else {
//     $gid = $_POST["GID"];
//     if (!preg_match("/^[G][0-9a-zA-Z]*$/",$gid)) {
//       $gidErr = "Enter proper gid(Starting with G---...)";
//   }
//   else {
//         $n++;}
// }

  ?>
<body style="background-color: lavender">
    <h1><center><font style="border:9px solid mediumslateblue" face="arial">SEARCH FROM GALLERY TABLE </font></center></h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div>Enter Gallery ID:

<?php
$host="127.0.0.1:3307";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"art_gallery");
if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
echo "<select name= 'GID' value='<?= $gid; ?>'>";
echo '<option value="">'.'--- Please Select Gallery ID ---'.'</option>';

$sql="select GID from gallery";
$result = $con->query($sql);

 if ($result->num_rows > 0)
   {
while($row = $result->fetch_assoc())
{
    echo "<option value='". $row['GID']."'>".$row['GID'].'</option>';

}
}

echo '</select>';
        ?>

            <!-- <input type="text" name="GID" placeholder="GID" value="<?= $gid ;?>"> -->
            <br></div><span class="error">* <?php echo $gidErr;?></span>
		<br><br>
		<button type="submit" value ="Find" class="btn">SEARCH</button>
	</form>
<?php
$host="127.0.0.1:3307";
$user="root";
$password="";
$con= new mysqli($host,$user,$password,"art_gallery");
if ($con->connect_error) {
		    die("Connection failed: " . $con->connect_error);
		}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
     // if($n==1){
	$gid=$_POST['GID'];
	echo "<b><br>Entered Gallery ID is $gid<br></b>";
	
	$sql="select * from gallery g, gcontacts gc where g.gid = gc.gid and g.gid='$gid'";

				$result = $con->query($sql);

			if ($result->num_rows > 0) {
                echo "<b><br>Search Successful<br><br></b>";
		    echo "<br><br><br><br><table><tr><th>G_ID</th><th>GNAME</th><th>LOCATION</th><th>PHONE</th><th>MAIL_ID</th></tr>";
		   		    while($row = $result->fetch_assoc()) {
		       echo "<tr><td>" . $row["GID"]. "</td><td>" .$row["GNAME"]. "</td><td>"
              . $row["LOCATION"]. "</td><td>" .$row["PHONE2"]. "</td><td>" .$row["MAILID2"]. "</td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "<span><br><br>OPPS!!! Search Unsuccessful!<br><br>There is no such Gallery ID exists. Please Enter Correct Gallery ID and Search again.</span>";
		}
		}
    // }

		$con->close();
?>
<br>
<br>
<p style="font-family: arial; "><a href="gallery.php"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>