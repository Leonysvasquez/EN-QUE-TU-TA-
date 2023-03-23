<?php

$conn = mysqli_connect("localhost","root","","cloudcode-db");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}

?>