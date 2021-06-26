<?php
    session_start();
    unset($_SESSION["GID"]);
    // unset($_SESSION["PW2"]);
    header("Location:gallery1.html");
?>