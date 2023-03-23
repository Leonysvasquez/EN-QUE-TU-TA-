<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['usermail'])){
        header("Location:login.php");
    } else {
        $email = $_SESSION['usermail'];

        $sql1 = "SELECT * FROM clientes WHERE email = '$email' LIMIT 1";
        $query1 = mysqli_query($con, $sql1);
        $array1 = mysqli_fetch_array($query1);

        $code = $array1['code'];

        $sql = "SELECT * FROM post WHERE code = '$code'";
        $query = mysqli_query($con, $sql);

        function viewNets($posts) {
            if($posts['facebook'] == 1) {
                echo "<span style='color: #2778e2;'><ion-icon name='logo-facebook'></ion-icon></span>";
            }
            if($posts['instagram'] == 1) {
                echo "<span style='color: #d93f80;'><ion-icon name='logo-instagram'></ion-icon></span>";
            }
            if($posts['google'] == 1) {
                echo "<span style='color: #f9ba27;'><ion-icon name='logo-google'></ion-icon></span>";
            }
            if($posts['youtube'] == 1) {
                echo "<span style='color: #f30015;'><ion-icon name='logo-youtube'></ion-icon></span>";
            }
            if($posts['tiktok'] == 1) {
                echo "<span style='color: #333;'><ion-icon name='logo-tiktok'></ion-icon></span>";
            }
            if($posts['twitter'] == 1) {
                echo "<span style='color: #2e9eee;'><ion-icon name='logo-twitter'></ion-icon></span>";
            }
            if($posts['linkedin'] == 1) {
                echo "<span style='color: #1969c0;'><ion-icon name='logo-linkedin'></ion-icon></span>";
            }
        }
                            
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/load.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <div class="load" id="load">
        <h2>Cargando...</h2>
        <div></div>
    </div>
    
    <header>
        <a href="../../dashboard.php" id="reload">Volver a ENQUETUTA</a>
    </header>

    <h1>Bienvenid@ <b><?php echo $array1['cliente'];?></b></h1>

    <!-- LEFT NAVIGATION BAR -->
    <aside class="sidenav">
        <div class="toggle-menu" id="toggleMenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="so3 sidenav-option">
            <span class="material-symbols-outlined">storefront</span>
            <span class="sidenav-option-name">Tablero Principal</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option">
            <span class="material-symbols-outlined">paid</span>
            <span class="sidenav-option-name">Caja</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so1 sidenav-option active">
            <span class="material-symbols-outlined">point_of_sale</span>
            <span class="sidenav-option-name">Ventas</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so7 sidenav-option">
            <span class="material-symbols-outlined">shopping_bag</span>
            <span class="sidenav-option-name">Compras</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option">
            <span class="material-symbols-outlined">shopping_cart</span>
            <a href="./php/productos.php"><span class="sidenav-option-name">Productos</span></a>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option">
            <span class="material-symbols-outlined">lab_profile</span>
            <span class="sidenav-option-name">Reportes</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">group</span>
            <span class="sidenav-option-name">Usuarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>  
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">settings</span>
            <span class="sidenav-option-name">Configuracion</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>      
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="sidenav-option-name">Roles y Perfiles</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">exit_to_app</span>
            <span class="sidenav-option-name">Salir</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside>
    
    <main>

        
 
    
            <!-- ================== -->
            

    </main>
</body>
<script>
    let load = document.getElementById("load");
    window.addEventListener("load", function(){

        load.style.display = "none";
    });
</script>
<script>
    let toggleMenu = document.querySelector("#toggleMenu");
    let sidenav = document.querySelector(".sidenav");
    toggleMenu.addEventListener('click', function()
    {
        toggleMenu.classList.toggle("active");
        sidenav.classList.toggle("active");
    });
</script>
<script src="navs.js"></script>

</html>