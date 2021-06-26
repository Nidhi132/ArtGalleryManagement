<!DOCTYPE html>
<html>
<head>
	<title>
		Customer
	</title>
</head>
<?php

   session_start();
   $id=$_SESSION['CID'];
   // echo $id;


  ?>
<body>
	
	<link href='https://fonts.googleapis.com/css?family=Coiny' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Jockey One' rel='stylesheet'>
	<h1>
	<center>
	<h1 style="font-size: 40" "font-family: Candal"><font style="border: 14px groove floralwhite;" color=black ><u>CUSTOMER</font></h1>
		<br>
	</center>
       <style> 
       	body{ 
       		/*background: url("https://www.omnikick.com/wp-content/uploads/2017/02/Customer-Acquisition-Strategy.gif") no-repeat;*/
       		background: url("image/cus.gif") no-repeat;
		background-size:cover;
		font-family:"Verdana";
		text-color:white;
		}
		</style>
		<b>
			<font style="font-family: Coiny " font color="white" size="10">
				SELECT ANY ONE OPTION FROM BELOW:</font>
		</b>
<style>
		ul{
	margin:3pc;
	padding:0.1px;
	list-style:none;
	
}
ul li{
	float:initial;
	width:450px;
	height:80px;
	background-color:mediumslateblue;
	opacity:.8;
	line-height:40px;
	text-align:center;
	font-size:35px;
	margin-bottom: 16px;
}
ul li a{
	text-decoration:underline;
	text-align: center;
	font-family: Jockey One; 
	font-weight: bold;
	font-size: 6;
	color:white;
	display:block;
}
ul li a:hover{
	 background-color: white;
    color: black;
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
	<li><a href="contacts.php" >ADD ANOTHER CONTACT</a></li>
	<li><a href="csearch.php">SEARCH VALUES FROM THE
				CUSTOMER</a></li>
	<li><a href="cdisplay.php">DISPLAY CONTENTS FROM THE 
				CUSTOMER TABLE</a></li>
	<li><a href="cinsert.php">UPDATE VALUES OF THE
				CUSTOMER Table</a></li>
	<!-- <li><a href="cdelete.php">DELETE VALUES FROM THE
				CUSTOMER</a></li> -->
	<li><a href="bsearch.php">BIDDING ARENA</a></li>			
</h1>
<p style="font-family: arial"><a href="customer1.html"><font style="color:green">GO BACK</font></a></p>
<p style="font-family: arial; float: right;"><a href="clogout.php"><font style="color:black">LogOut</font></a></p>
</body>
</html>