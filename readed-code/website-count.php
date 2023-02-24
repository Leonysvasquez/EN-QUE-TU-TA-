<?php
include("../php/connection.php");
$token = $_REQUEST['token'];
$network = $_REQUEST['network'];

$sql = "SELECT * FROM users WHERE token = '$token'";
$query = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($query);
$read_usermail = $row['email'];

    // READED CODE
    $searchRead = "SELECT * FROM readed WHERE read_usermail = '$read_usermail'";
    $queryRead = mysqli_query($connection, $searchRead);

    $readedData = mysqli_fetch_array($queryRead);
    $plusNetworkRead = $readedData['website_readed'] + 1;

    $addNetworkRead = "UPDATE readed SET
    website_readed = $plusNetworkRead
    WHERE read_usermail = '$read_usermail'";
    $networkReadQuery = mysqli_query($connection, $addNetworkRead);

    header("Location:".$network);
?>