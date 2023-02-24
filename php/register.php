<?php
    
include("connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $passcode = md5($_POST["passcode"]);
    $cpasscode = md5($_POST["cpasscode"]);

    if ($passcode == $cpasscode) {
        // $passcode = password_hash(md5($pass), PASSWORD_DEFAULT);
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            echo '<script>alert("Esta cuenta ya existe. Prebe con una diferente.")</script>';
        }
        elseif (mysqli_num_rows($query) == 0) {
            $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $token = "";

            for ($i=0; $i < 20; $i++) {
                $token .= $string[rand(0,61)];
            }

            $sql = "INSERT INTO users(username, email, passcode, token)
                    VALUES ('$name','$email','$2y$10$$passcode', '$token')";
            $query = mysqli_query($connection, $sql);

            $sql2 = "INSERT INTO readed(read_usermail)
                    VALUES ('$email')";
            $query2 = mysqli_query($connection, $sql2);

            if ($query && $sql2) {
                session_start();
                $_SESSION["usermail"] = $email;

                header("Location:qr/qr.php");
            }
            else {
                echo '<script>alert("Error. Por favor intente de nuevo.")</script>';
            }
        }
    } else
    {
        echo '<script>alert("Las contraseñas no coinciden. Inténtelo nuevamente.")</script>';
        header("Location: ../login.php");
    }
}

?>