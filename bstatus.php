<?php

   // session_start();
   // $id=$_SESSION['CID'];
   // echo $id;
   // $n = $_SESSION['ARTID'];

  ?>
<?php


	date_default_timezone_set("Asia/Kolkata");
    $user = "root";
    $pass = "";
    $db = "art_gallery";
	
	$db_connect = mysqli_connect("127.0.0.1:3307", $user, $pass, $db) or die("no database found");
    //echo "Database Connected"."<br>";
    
    $qry = "SELECT * FROM bid;";
    $res = mysqli_query($db_connect, $qry);
    // print_r($row = mysqli_fetch_assoc($res));
    while($row = mysqli_fetch_assoc($res)){
        $starttime = $row['STARTTIME'];
        $endtime = $row['ENDTIME'];
        $artid = $row['ARTID'];
        // $bid_id = $row['Bid_ID'];
        //echo "$starttime "."$endtime"."<br>";


        $nt = new DateTime($starttime);
        $starttime = $nt->getTimestamp();


        $nt = new DateTime($endtime);
        $endtime = $nt->getTimestamp();

        $date = time();
        // echo $date;
        // echo "$starttime "."$endtime "."$date"."<br>";
        
        if($starttime <= $date && $endtime >= $date)
        {
            $qry = "UPDATE bid SET STAT = 'ongoing' where ARTID='$artid';";
            mysqli_query($db_connect, $qry);
        }
        else if($starttime > $date)
        {
            $qry = "UPDATE bid SET STAT = 'yet to bid' where ARTID='$artid';";
            mysqli_query($db_connect, $qry);
        }
        else
        {
            $qry = "UPDATE bid SET STAT = 'finished' where ARTID='$artid';";
            mysqli_query($db_connect, $qry);
            // $qry1 = "SELECT CID FROM bid where ARTID='$artid';";
            // mysqli_query($db_connect, $qry1);
            // $row = mysqli_fetch_assoc($res);
            // $cid = $row['CID'];
            // $qry2 = "UPDATE artwork SET CID ='$cid' where ARTID='$artid';"; 
            // mysqli_query($db_connect, $qry2);
        }
    }
    
?>