<?php
include("../php/connection.php");
$email = $_REQUEST['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="stylesheet" href="../css/mail.css">
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
  <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-brand-logo">
                <img src="../img/logocloudcode-W.svg" alt="">
            </div>
            <span class="navbar-brand-name"><a href="../index.html">CLOUDCODE</a></span>
        </div>
    </nav>
</header>

<main>
  <section>
    <h3>Le hemos enviado un enlace de confirmación al correo <i style="color:var(--primary);"><?php echo $email;?></i> para validar su cuenta.
      Por favor revise su correo electrónico.</h3>
    
    <span class="material-symbols-rounded icon">outgoing_mail</span>
  </section>
</main>

<!-- FOOTER -->
<div class="footer-container">
    <footer>
        <span>© 2022 EPA MERCADEO & PUBLICIDAD - Todos los derechos reservados</span>
    </footer>
</div>

</body>
</html>