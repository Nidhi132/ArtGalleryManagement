<?php
    session_start();
    unset($_SESSION["CID"]);
    // unset($_SESSION["PW2"]);
    header("Location:customer1.html");
?>