<?php
include("../php/connection.php");
$token = $_REQUEST['token'];

$sql = "SELECT * FROM users WHERE token = '$token'";
$query = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($query);
$read_usermail = $row['email'];

    // READED CODE
    $searchRead = "SELECT * FROM readed WHERE read_usermail = '$read_usermail'";
    $queryRead = mysqli_query($connection, $searchRead);

    $readedData = mysqli_fetch_array($queryRead);

    $plusCodeRead = $readedData['qrcode_readed'] + 1;

    $addCodeRead = "UPDATE readed SET
    qrcode_readed = '$plusCodeRead'
    WHERE read_usermail = '$read_usermail'";
    $codeReadQuery = mysqli_query($connection, $addCodeRead);
    //

    header("Location:client-data.php?token=".$token);
?>