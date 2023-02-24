<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
 
include("php/connection.php");

$token1 = $_REQUEST["token"];

if($token1 == ""){
    header("Location:index.html");
} else {
    $companyQuery = mysqli_query($connection, "SELECT * FROM users WHERE token = '$token1'");
    $companyArray = mysqli_fetch_array($companyQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title translate="no">CLOUDCODE - Sign</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/sign.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body class="active">
<header>
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-brand-logo">
                <img src="img/logocloudcode-W.svg" alt="">
            </div>
            <span class="navbar-brand-name"><a href="">CLOUDCODE</a></span>
        </div>
    </nav>
</header>
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
        <div class="formBx active" style="height: 550px; padding-top: 10px !important;">
            <div class="form signinForm" style="top: 200px;">
                <form action="" method="POST">
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

                            $sql = "SELECT * FROM clients WHERE email = '$email'";
                            $query = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_array($query);
                                // if ($row['verification'] == 1) {
                                // if (password_verify($passcode, $row['passcode'])) {
                                if (("$2y$10$".$pass) == $row['passcode']) {

                                    $query3 = mysqli_query($connection, "SELECT * FROM users WHERE token = '$token1'");
                                    $array3 = mysqli_fetch_array($query3);
                                    $followed = $array3['email'];

                                    $query2 = mysqli_query($connection, "SELECT * FROM follows WHERE followed = '$followed' AND follower = '$email'");

                                    if (mysqli_num_rows($query2) <= 0) {
                                        $follow = mysqli_query($connection, "INSERT INTO follows(followed, follower) VALUES ('$followed', '$email')");
                                    }

                                    session_start();
                                    $_SESSION["clients"] = $usersemail;

                                    header("Location:http://cloudcode.live/readed-code/count.php?token=".$token1);
                                } else {
                                    echo "<script>alert('Las contraseñas no coinciden. Inténtelo nuevamente.')</script>";
                                }
                                // }else {
                                    // echo "<script>alert('Debe verificar su cuenta para poder iniciar sesión. Revise su correo e intente nuevamente.')</script>";
                                // }
                            } else {
                                echo "<script>alert('El usuario no existe. Pruebe con otro o registrese.')</script>";
                            }
                        }
                    ?>
                </form>
            </div>

            <div style="position: absolute; top: 15px; text-align:center;">
                <div style="width: 110px; height: 110px; overflow:hidden; border-radius: 100%; margin:auto; margin-bottom:10px; border: 3px solid var(--primary);">
                    <img style="width:100%; height:100%; object-fit:cover;" src="<?php echo "data:image/*;base64,".base64_encode($companyArray['logo']); ?>" alt="">
                </div>
                <h3 style="padding: 0 10px; margin-bottom:5px; text-align: center;"><?php echo $companyArray['username']; ?></h3>
                <div class="social">    
                    <ul style="display: flex; justify-content: space-around; width: 250px; z-index: 111111; text-align: center;">
                        <style>
                            li {
                                list-style: none;
                            }
                        </style>
                        <?php
                            if($companyArray['website'] == NULL || $companyArray['website'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/website-count.php?token=".$token."&network=".$companyArray["website"]."' target='_blank'>
                                        <img src='https://img.icons8.com/material-outlined/35/000000/domain.png'/>
                                    </a>
                                </li>";
                            }

                            if($companyArray['whatsapp'] == NULL || $companyArray['whatsapp'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/whatsapp-count.php?token=".$token."&network=".$companyArray["whatsapp"]."' target='_blank'>
                                        <img src='https://img.icons8.com/material-outlined/35/4cc357/whatsapp--v1.png'/>
                                    </a>
                                </li>";
                            }

                            if($companyArray['facebook'] == NULL || $companyArray['facebook'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/facebook-count.php?token=".$token."&network=".$companyArray["facebook"]."' target='_blank'>
                                        <img src='https://img.icons8.com/fluency-systems-regular/35/2778e2/facebook-new--v1.png'/>
                                    </a>
                                </li>";
                            }

                            if($companyArray['instagram'] == NULL || $companyArray['instagram'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/instagram-count.php?token=".$token."&network=".$companyArray["instagram"]."' target='_blank'>
                                        <img src='https://img.icons8.com/fluency-systems-regular/35/d93f80/instagram-new--v1.png'/>
                                    </a>
                                </li>";
                            }

                            if($companyArray['twitter'] == NULL || $companyArray['twitter'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/twitter-count.php?token=".$token."&network=".$companyArray["twitter"]."' target='_blank'>
                                        <img src='https://img.icons8.com/fluency-systems-regular/35/2e9eee/twitter.png'/>
                                    </a>
                                </li>";
                            }

                            if($companyArray['youtube'] == NULL || $companyArray['youtube'] == "") {
                            } else {
                                echo "
                                <li>
                                    <a href='readed-code/youtube-count.php?token=".$token."&network=".$companyArray["youtube"]."' target='_blank'>
                                        <img src='https://img.icons8.com/fluency-systems-filled/35/f30015/youtube-play.png'/>
                                    </a>
                                </li>";
                            }
                                                            
                        ?>
                    </ul>
                </div><hr>
            </div>

            <div class="form signupForm" style="top: 130px; padding-top: 10px !important;">
                <form action="" method="POST"  autocomplete="off">
                    <span class="material-symbols-outlined" style="position: absolute; top: 12px;">sentiment_very_satisfied</span>
                    <h3 style="font-size:1.22em; top:4px; position: relative;">Únete y disfruta de los beneficios</h3>
                    
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

                                $sql1 = "SELECT email FROM clients WHERE email = '$email'";
                                $query1 = mysqli_query($connection, $sql1);

                                if (mysqli_num_rows($query) > 0 || mysqli_num_rows($query1) > 0) {
                                    echo '<script>alert("This account already exist. Try with other account.")</script>';
                                } else {
                                    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                                    $token = "";

                                    for ($i=0; $i < 20; $i++) {
                                        $token .= $string[rand(0,61)];
                                    }
                                
                                    $sql = "INSERT INTO clients(uname, email, passcode, token)
                                            VALUES ('$name','$email','$2y$10$$passcode', '$token')";
                                    $query = mysqli_query($connection, $sql);

                                    $query4 = mysqli_query($connection, "SELECT * FROM users WHERE token = '$token1'");
                                    $array4 = mysqli_fetch_array($query4);
                                    $followed = $array4['email'];

                                    $query3 = mysqli_query($connection, "SELECT * FROM follows WHERE followed = '$followed' AND follower = '$email'");

                                    if (mysqli_num_rows($query3) <= 0) {
                                        $follow = mysqli_query($connection, "INSERT INTO follows(followed, follower) VALUES ('$followed', '$email')");
                                    }

                                    if ($query) {
                                        session_start();
                                        $_SESSION["clients"] = $email;
                                        header("Location:http://cloudcode.live/readed-code/count.php?token=".$token1);
                                    } else {
                                        // echo ;
                                        echo '<script>alert("Hubo un problema. Por favor intente nuevamente. ERROR:'.$mysqli->error.'")</script>';
                                    }
                                }
                            } else {
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
<script src="js/sign-forms.js"></script>
</html>