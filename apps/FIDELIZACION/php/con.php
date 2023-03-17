<?php
    $con = mysqli_connect("localhost", "root", "", "postsview");
    $con2 = mysqli_connect("localhost", "root", "", "cloudcode-db");

    if(!$con)
    {
        die("Connection failed!");
    }
    if(!$con2)
    {
        die("Connection failed!");
    }
?>