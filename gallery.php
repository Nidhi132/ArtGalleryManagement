<!DOCTYPE html>
<html>
<head>
	<title>
		GALLERY
	</title>
</head>
 <?php

   session_start();
   $id=$_SESSION['GID'];
   // echo $id;


  ?>
<body>
	<h1>
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Aclonica'>
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lemon'>
		<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Jockey One'>
	<center>
	<h1 style="font-size: 40"><font style="border: 14px groove floralwhite; background-color: #9999FF" color=CC0033 face="arial" ><u>GALLERY</font></h1>
		<br>
	</center>
       <style> body{ background: url("image/1pic11.jpg") no-repeat;
		background-size:cover;
		font-family:"Verdana";
		text-color:black;
		}
		</style>
		<b>
			<font style="font-family: serif;" font color="black" size="10">
				MAKE YOUR CHOICE:</font>
		</b>
<style>b{
	background-color: #999933; 
	Line-height:46px;
}
		ul{
	margin:3pc;
	padding:0.1px;
	list-style:none;	
}
ul li{
	float:initial,middle;
	width:400px;
	height:70px;
	background-color: #FFFF33;
	opacity:.8;
	line-height:36px;
	text-align:center;
	font-size:35px;
	margin-bottom: 12px;
}
ul li a{
	text-align: center;
	font-family: Jockey One; 
	font-weight: bold;
	font-size: 38px;
	color:black;
	display:block;
}
ul li a:hover{
	 background-color: white;
    color: brown;
	background-size: contain;
}
ul li ul li{
	display:none;
}
ul li:hover ul li{
	display:block;
}
</style><br>
<ul>
	<li><a href="gcontacts.php" >ADD ANOTHER CONTACT</a></li>
	<li><a href="gsearch.php">SEARCH OTHER GALLARIES</a></li>
	<li><a href="gdisplay.php">DISPLAY CONTENTS IN THE 
				GALLERY TABLE</a></li>			
	<!-- <li><a href="gdelete.php">DELETE GALLERY</a></li> -->
	<li><a href="ginsert.php">UPDATE GALLERY</a></li>
	<li><a href="exhibition.php">EXHIBITION</a></li>
</h1>
<p style="font-family: arial; "><a href="FrontEnd.html"><font style="color:gold">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="Logout.php"><font style="color:black">LogOut</font></a></p>
</body>

</html>
