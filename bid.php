<?php

   // session_start();
   $id=$_SESSION['CID'];
   // echo $id;
   $n = $_SESSION['ARTID'];
   // echo $n;

   $bid = $_SESSION['BID'];
   // echo $bid
   
  ?>
<?php

	// $bidder_id = $_POST['bidder_id'];
	// $bid_id = $_POST['bid'];
	// $new_bid = $_POST['new_bid'];
	
	$user = "root";
	$pass = "";
	$db = "art_gallery";
	$_GET['bid_ok'] = 1;
			
	$db_connect = mysqli_connect("127.0.0.1:3307", $user, $pass, $db) or die("no database found");
	//echo $bidder_id, $bid_id, $new_bid;
	
	$qry = "SELECT TOPBID FROM bid WHERE ARTID = '$n'";
	$res = mysqli_query($db_connect, $qry);
	$row = mysqli_fetch_assoc($res);
	$prev_top_bid = $row['TOPBID'];
	if($bid <= $prev_top_bid)
	{
		echo "<h2 align = center><font color = red>You Bid Must Heigher Than Previous One!</font></h2>";
		// echo "<form align = 'center' method = 'post' action = 'item_details.php'><button style = 'background-color : #CCC; padding : 7px 10px' name = 'details' type = 'submit' value = " . $bid_id . ">Item Details</button></form>";
	}
	else
	{
		$qry = "UPDATE bid SET TOPBID = '$bid', CID = '$id' WHERE ARTID = '$n'";
		mysqli_query($db_connect, $qry);
		echo "Your Bid has been made. Thank You!!";
		// $_POST['details'] = $bid_id;
		// include("item_details.php");
	}
?>