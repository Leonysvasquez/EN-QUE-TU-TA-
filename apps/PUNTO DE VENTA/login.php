<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../../css/global.css">
</head>
<body><!-- http://cloudcode.live/dashboard.php -->
    <a href="../../dashboard.php" id="reload">Volver a CLOUDCODE</a>
    <main>
        <h1 style="text-align:center;">Inicie sesión para administrar las publicaciones pendientes</h1>
        <form action="" method="post">
            <div>
                <label for="user">Usuario</label>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass">
            </div>
            <div>
                <label for="entrar"></label>
                <input type="submit" name="entrar" name="entrar" value="Entrar">
            </div>
        </form>
        <?php
            if(isset($_POST['entrar'])){
                include("php/con.php");
                $user = strtoupper($_POST['user']);
                $pass = $_POST['pass'];
                $entrar = mysqli_query($con, "SELECT * FROM admins WHERE user = '$user' and password = '$pass' LIMIT 1");

                if(mysqli_num_rows($entrar) > 0){
                    $client = mysqli_fetch_array($entrar);
                    session_start();
                    $_SESSION['admin'] = $client['user'];
                    header("Location:clients.php");
                }else {
                    echo "<script>alert('Usuario o contraseña incorrecto. Intente nuevamente.');</script>";
                }
            }
        ?>
    </main>
</body>
</html>