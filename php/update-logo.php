<?php

    include("connection.php");
    session_start();
    $usermail = $_SESSION["usermail"];

    if (!isset($usermail))
    {
        header("Location: logout.php");
    } else
    {
        if(isset($_POST["submitLogo"]))
        {
            if ($verifyLogo !== false) {
                $logoTpm = $_FILES['logo']['tmp_name'];
                $logoContent = addslashes(file_get_contents($logoTpm));
            }

            $sql = "UPDATE users SET 
            logo = '$logoContent'
            WHERE email = '$usermail'";

            $query = mysqli_query($connection, $sql);

            if ($query){
                echo "<script>alert('yes')</script>";
            }

            header('Location: ../dashboard.php');
        }
    }
?>