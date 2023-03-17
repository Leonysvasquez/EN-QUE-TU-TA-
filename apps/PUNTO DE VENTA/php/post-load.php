<?php

    include("con.php");
    session_start();
    $user = $_SESSION["user"];

    if (!isset($user))
    {
        header("Location: logout.php");
    } else
    {
        if(isset($_POST["submit"]))
        {
            $postTpm = $_FILES['post']['tmp_name'];
            $postContent = addslashes(file_get_contents($postTpm));

            $sqlPost = "UPDATE users SET 
            logo = '$postContent'
            WHERE email = '$user'";

            $postQuery = mysqli_query($con, $sqlPost);

            if ($postQuery){
                echo "<script>alert('yes')</script>";
            }

            header('Location: ../dashboard.php');
        }
    }
?>