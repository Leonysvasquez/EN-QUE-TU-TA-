<?php
include("php/connection.php");
session_start();
$usermail = $_SESSION["usermail"];
if(isset($usermail))
{
    header("Location: php/logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title translate="no">EN QUE TU TA - Sign</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <div class="backBtnContainer">
        <button onclick="goBack();"><ion-icon name="chevron-back-outline"></ion-icon>Go back</button>
    </div>
    <div class="container">
        <div class="primaryBg">
            <div class="box signin">
                <h2>¿Ya tiene una cuenta?</h2>
                <button class="signinBtn">Iniciar sesión</button>
            </div>
            <div class="box signup">
                <h2>¿Aún no tiene una cuenta?</h2>
                <button class="signupBtn">Registrarse</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form action="login.php" method="POST">
                    <span class="material-symbols-rounded">login</span>
                    <h3>Iniciar sesión</h3>
                    <input type="email" placeholder="Usuario" name="username" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <label style="color:red; font-size:.9em; margin-bottom:5px;"><?php echo $message ?></label>
                    <input type="submit" value="Iniciar Sesión" name="submit1">
                    <a href="password-forget.php" class="forgot">Forgot password?</a>
                    <?php
                        if (isset($_POST["submit1"])) {
                            $email = $_POST["username"];
                            $pass = md5($_POST["password"]);

                            $sql = "SELECT * FROM users WHERE email = '$email'";
                            $query = mysqli_query($connection, $sql);

                            $sql2 = "SELECT * FROM clients WHERE email = '$email'";
                            $query2 = mysqli_query($connection, $sql2);
                            if (mysqli_num_rows($query2) > 0)
                            {
                                $row2 = mysqli_fetch_array($query2);
                                // if ($row['verification'] == 1) {
                                // if (password_verify($passcode, $row['passcode'])) {
                                if (("$2y$10$".$pass) == $row2['passcode']) {
                                    session_start();
                                    $_SESSION["clients"] = $email;
                                    header("Location:users-dashboard.php");
                                }else {
                                    echo "<script>alert('Las contraseñas no coinciden. Inténtelo nuevamente.')</script>";
                                }
                                // }else {
                                    // echo "<script>alert('Debe verificar su cuenta para poder iniciar sesión. Revise su correo e intente nuevamente.')</script>";
                                // }
                            }else if (mysqli_num_rows($query) > 0)
                            {
                                $row = mysqli_fetch_array($query);
                                // if ($row['verification'] == 1) {
                                // if (password_verify($passcode, $row['passcode'])) {
                                if (("$2y$10$".$pass) == $row['passcode']) {
                                    session_start();
                                    $_SESSION["usermail"] = $email;
                                    header("Location:dashboard.php");
                                }else {
                                    echo "<script>alert('Las contraseñas no coinciden. Inténtelo nuevamente.')</script>";
                                }
                                // }else {
                                    // echo "<script>alert('Debe verificar su cuenta para poder iniciar sesión. Revise su correo e intente nuevamente.')</script>";
                                // }
                            }else {
                                echo "<script>alert('El usuario no existe. Pruebe con otro o registrese.')</script>";
                            }
                        }
                    ?>
                </form>
            </div>
            <div class="form signupForm">
                <form action="login.php" method="POST"  autocomplete="off">
                    <span class="material-symbols-rounded">person_add</span>
                    <h3>Registrarse</h3>
                    <input type="text" placeholder="Nombre" name="name" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Contraseña" name="passcode" required>
                    <input type="password" placeholder="Confirmar Contraseña" name="cpasscode" required>
                    <input type="submit" value="Registrarse" name="submit">
                    <?php
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
                                    echo '<script>alert("This account already exist. Try with other account.")</script>';
                                }
                                else {
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
                                        // Send email
                                        /* $to  = $email;
                                            $subject = "Verificacion de cuenta de CLOUDCODE";
                                            $message = "<a href='http://localhost/CLOUDCODE/php/account-verify.php?token=$token'>VERIFICAR CUENTA.</a>";
                                            $headers = "From: angelo.epa.mp@gmail.com \r\n";
                                            $headers .= "MIME-Version: 1.0" . "\r\n";
                                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                            mail($to,$subject,$message,$headers);
                                            header("Location:mail.php?email=$email");*/
                                        header("Location:qr/qr.php");
                                    }
                                    else {
                                        // echo ;
                                        echo '<script>alert("Hubo un problema. Por favor intente nuevamente. ERROR:'.$mysqli->error.'")</script>';
                                    }
                                }
                            } else
                            {
                                echo '<script>alert("Las contraseñas no coinciden. Inténtelo nuevamente.")</script>';
                            }
                        }
                        ?>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    var goBack = function(){
        history.back();
    }
</script>
<script src="js/sign-for25061425ms.js"></script>
</html>