<?php
    include("con.php");
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['client']);
    mysqli_close($con);
    header("Location:../login.php");
?>