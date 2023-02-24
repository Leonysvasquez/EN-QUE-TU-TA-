<?php

    include("connection.php");
    include("../apps/POSTSVIEW/php/con.php");

    session_start();
    $usermail = $_SESSION["usermail"];

    if (!isset($usermail))
    {
        header("Location: logout.php");
    } else
    {
        if(isset($_POST["submit"]))
        {
            $username = $_POST["username"];
            $phone = $_POST["phone"];
            $adress = $_POST["adress"];
            $businesstype = $_POST["businesstypeSelect"];
            $businessarea = $_POST["businessarea"];
            $website = $_POST["website"];
            $facebook = $_POST["facebook"];
            $instagram = $_POST["instagram"];
            $whatsapp = $_POST["whatsapp"];
            $twitter = $_POST["twitter"];
            $youtube = $_POST["youtube"];

            if ($businesstype == "") {
                $sql = "UPDATE users SET 
                username = '$username', 
                phone = '$phone', 
                adress = '$adress',
                businessarea = '$businessarea',
                website = '$website',
                facebook = '$facebook',
                instagram = '$instagram',
                whatsapp = '$whatsapp',
                twitter = '$twitter',
                youtube = '$youtube'
                WHERE email = '$usermail'";

                $sql2 = "UPDATE clientes SET 
                cliente = '$username' WHERE email = '$usermail'";

            } else {
                $sql = "UPDATE users SET 
                username = '$username', 
                phone = '$phone', 
                adress = '$adress', 
                businesstype = '$businesstype',
                website = '$website',
                facebook = '$facebook',
                instagram = '$instagram',
                twitter = '$twitter',
                youtube = '$youtube'
                WHERE email = '$usermail'";

                $sql2 = "UPDATE clientes SET 
                cliente = '$username' WHERE email = '$usermail'";
            }
            
            $query = mysqli_query($connection, $sql);
            $query2 = mysqli_query($con, $sql2);

            if ($query){
                echo "<script>alert('yes')</script>";
            }

            header('Location: ../dashboard.php');
        }
    }   
?>