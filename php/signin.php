<?php
    
    include("connection.php");
    
    if (isset($_POST["submit"]))
    {
        $email = $_POST["username"];
        $passcode = md5($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($query);

        // if ($row['verification'] == 1) {
            if (mysqli_num_rows($query) > 0)
            {
                if (password_verify("$passcode", $row['passcode']))
                {
                    session_start();
                    $_SESSION['usermail'] = $email;

                    header("Location:../dashboard.php");
                }
                else {
                    echo "<script>alert('Las contraseñas no coinciden. Inténtelo nuevamente.')</script>";
                    header("Location: ../login.php");
                }

            }
            else {
                echo "<script>alert('Las contraseñas no coinciden. Inténtelo nuevamente.')</script>";
                header("Location: ../login.php");
            }
        // }
        // else {
        //     echo "<script>alert('Debe verificar su cuenta para poder iniciar sesión. Revise su correo e intente nuevamente.')</script>";
        // }
    }
?>