<?php
    session_start();
    unset($_SESSION["AID"]);
    // unset($_SESSION["PW2"]);
    header("Location:artist1.html");
?>