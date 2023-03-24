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
    <link rel="stylesheet" href="../FIDELIZACION//css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <div class="load" id="load">
        <h2>Cargando...</h2>
        <div></div>
    </div>
    
    <header>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <div class="navbar-brand-logo">
                    <img src="./img/logo_enquetuta.svg" alt="">
                </div>
                <span class="navbar-brand-name"><a href="">FIDELIZACION</a></span>
            </div>

            <div class="menu">
                
                <div class="dropdown user-dropdown">
                    <div class="user-img">
                        <img src="
                        <?php
                            if ($row['logo'] == "")
                            {
                                echo "/img/def-profile.png";
                            } else {
                                echo "data:image/*;base64,".base64_encode($row['logo']);
                            }
                        ?>" alt="">
                    </div>
                    <div class="dropdown-content" id="user-dropdown-content">
                        <a href="php/logout.php"><span class="material-symbols-outlined">logout</span>Cerrar Sesión</a>
                    </div>
                </div>
                
                <div class="dropdown notification-dropdown">
                    <span class="material-symbols-outlined dropdown-arrow" id="notification-arrow">arrow_drop_down</span>
                    <div class="menu-item-icon">
                        <span class="material-symbols-outlined">notifications</span>
                    </div>
                    <div class="dropdown-content" id="notification-dropdown-content">
                        <ul class="notification-list">
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Aún no tiene notificaciones.</span>
                                </a>
                            </li>
                            <!-- <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>

                <div class="dropdown apps-dropdown">
                    <span class="material-symbols-outlined dropdown-arrow" id="apps-arrow">arrow_drop_down</span>
                    <div class="menu-item-icon">
                        <span class="material-symbols-outlined">apps</span>
                    </div>
                    
                    <div class="dropdown-content" id="apps-dropdown-content">
                        <div class="app">
                            <a href="apps/POSTSVIEW">
                                <div class="app-icon">
                                    <span class="material-symbols-outlined btn-fidelizacion">diversity_3</span>
                                </div>
                                <span class="app-name">Redes Sociales</span>
                            </a>
                        </div>
                    
                        <div class="app">
                            <a href="apps/FIDELIZACION/index.php">
                                <div class="app-icon">
                                    <span class="material-symbols-outlined">workspace_premium</span>
                                </div>
                                <span class="app-name">Fidelizacion</span>
                            </a>
                        </div>
                        <div class="app">
                            <a href="apps/PUNTO DE VENTA/index.php">
                                <div class="app-icon">
                                    <span class="material-symbols-outlined">receipt_long</span>
                                </div>
                                <span class="app-name">Punto De Venta</span>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </nav>
    </header>
    </header>

    <h1>Bienvenid@ <b><?php echo $array1['cliente'];?></b></h1>

    <!-- LEFT NAVIGATION BAR -->
    <aside class="sidenav">
        <div class="toggle-menu" id="toggleMenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="so1 sidenav-option active">
            <span class="material-symbols-outlined">redeem</span>
            <span class="sidenav-option-name">Stamp</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option ">
            <span class="material-symbols-outlined">stars</span>
            <span class="sidenav-option-name">Puntos</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option  ">
            <span class="material-symbols-outlined">storefront</span>
            <span class="sidenav-option-name">Referidos</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option ">
            <span class="material-symbols-outlined">storefront</span>
            <span class="sidenav-option-name">Marketing</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option">
            <span class="material-symbols-outlined">credit_score</span>
            <span class="sidenav-option-name">Gits Cards</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option ">
            <span class="material-symbols-outlined">hotel_class</span>
            <span class="sidenav-option-name">Recompensa</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so7 sidenav-option ">
            <span class="material-symbols-outlined">storefront</span>
            <span class="sidenav-option-name">Gamification</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <a href="../../dashboard.php" id="reload">Volver a EN-QUE-TU-TA</a>
    </aside>
    <main>
        
        <!-- <div class="network-filter-posts" id="netSel" hidden>
            <div class="net1"><span><ion-icon name="logo-facebook"></ion-icon></span></div>
            <div class="net2 selected"><span><ion-icon name="logo-instagram"></ion-icon></span></div>
            <div class="net3"><span><ion-icon name="logo-google"></ion-icon></span></div>
            <div></div>
        </div> -->
        <script>
            /*let net1 = document.querySelector(".net1");
            let net2 = document.querySelector(".net2");
            let net3 = document.querySelector(".net3");
            let netSel = document.getElementById("netSel");

            net1.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net2.classList.remove("selected");
                net3.classList.remove("selected");
                netSel.classList.add("activel");
                netSel.classList.remove("activer");
            });

            net2.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net1.classList.remove("selected");
                net3.classList.remove("selected");
                netSel.classList.remove("activel");
                netSel.classList.remove("activer");
            });

            net3.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net2.classList.remove("selected");
                net1.classList.remove("selected");
                netSel.classList.remove("activel");
                netSel.classList.add("activer");
            });*/
        </script>
        
    <section class="sectionPuntos" id="sectionPuntos" >
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>PUNTOS</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>
    </section>
    
<!--SECCION REFERIDOS -->
    <section class="sectionReferidos" id="sectionReferidos" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>REFERIDOS</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>
    </section>

<!--SECCION GAMIFICACION -->

    <section class="sectionMarketing" id="sectionMarketing" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>MARKETING</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>
    </section>

<!--SECCION GIF CARS -->

    <section class="sectionGifCards" id="sectionGifCards" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>GIFT CARS</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>  
    </section>

<!--SECCION RECOMPENSA-->
    <section class="sectionRecompensa" id="sectionRecompensa" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>RECOMPENSA</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
        </div>
    </section> 

<!--SECCION Stamps-->

    <section class="sectionStamps" id="sectionStamps" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>Stamps</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>
</section>
<!--SECCION GAMIFICACION -->
<section class="sectionGamificacion" id="sectionGamificacion" hidden>
                  <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>GAMIFICATION</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div> 
    </section>                                              
    </main>
        <script>
            let monthHead = document.getElementById("monthHead");
            let months = document.getElementById("months");
            let rotate = document.getElementById("rotate");
            
            let monthHead1 = document.getElementById("monthHead1");
            let months1 = document.getElementById("months1");
            let rotate1 = document.getElementById("rotate1");
            let weekHead1_1 = document.getElementById("weekHead1-1");
            let weekHead2_1 = document.getElementById("weekHead2-1");
            let weekHead3_1 = document.getElementById("weekHead3-1");
            let weekHead4_1 = document.getElementById("weekHead4-1");

            let monthHead2 = document.getElementById("monthHead2");
            let months2 = document.getElementById("months2");
            let rotate2 = document.getElementById("rotate2");
            let weekHead1_2 = document.getElementById("weekHead1-2");
            let weekHead2_2 = document.getElementById("weekHead2-2");
            let weekHead3_2 = document.getElementById("weekHead3-2");
            let weekHead4_2 = document.getElementById("weekHead4-2");

            let monthHead3 = document.getElementById("monthHead3");
            let months3 = document.getElementById("months3");
            let rotate3 = document.getElementById("rotate3");
            let weekHead1_3 = document.getElementById("weekHead1-3");
            let weekHead2_3 = document.getElementById("weekHead2-3");
            let weekHead3_3 = document.getElementById("weekHead3-3");
            let weekHead4_3 = document.getElementById("weekHead4-3");

            let monthHead4 = document.getElementById("monthHead4");
            let months4 = document.getElementById("months4");
            let rotate4 = document.getElementById("rotate4");
            let weekHead1_4 = document.getElementById("weekHead1-4");
            let weekHead2_4 = document.getElementById("weekHead2-4");
            let weekHead3_4 = document.getElementById("weekHead3-4");
            let weekHead4_4 = document.getElementById("weekHead4-4");

            let monthHead5 = document.getElementById("monthHead5");
            let months5 = document.getElementById("months5");
            let rotate5 = document.getElementById("rotate5");
            let weekHead1_5 = document.getElementById("weekHead1-5");
            let weekHead2_5 = document.getElementById("weekHead2-5");
            let weekHead3_5 = document.getElementById("weekHead3-5");
            let weekHead4_5 = document.getElementById("weekHead4-5");

            let monthHead6 = document.getElementById("monthHead6");
            let months6 = document.getElementById("months6");
            let rotate6 = document.getElementById("rotate6");
            let weekHead1_6 = document.getElementById("weekHead1-6");
            let weekHead2_6 = document.getElementById("weekHead2-6");
            let weekHead3_6 = document.getElementById("weekHead3-6");
            let weekHead4_6 = document.getElementById("weekHead4-6");

            let monthHead7 = document.getElementById("monthHead7");
            let months7 = document.getElementById("months7");
            let rotate7 = document.getElementById("rotate7");
            let weekHead1_7 = document.getElementById("weekHead1-7");
            let weekHead2_7 = document.getElementById("weekHead2-7");
            let weekHead3_7 = document.getElementById("weekHead3-7");
            let weekHead4_7 = document.getElementById("weekHead4-7");

            let monthHead8 = document.getElementById("monthHead8");
            let months8 = document.getElementById("months8");
            let rotate8 = document.getElementById("rotate8");
            let weekHead1_8 = document.getElementById("weekHead1-8");
            let weekHead2_8 = document.getElementById("weekHead2-8");
            let weekHead3_8 = document.getElementById("weekHead3-8");
            let weekHead4_8 = document.getElementById("weekHead4-8");

            let monthHead9 = document.getElementById("monthHead9");
            let months9 = document.getElementById("months9");
            let rotate9 = document.getElementById("rotate9");
            let weekHead1_9 = document.getElementById("weekHead1-9");
            let weekHead2_9 = document.getElementById("weekHead2-9");
            let weekHead3_9 = document.getElementById("weekHead3-9");
            let weekHead4_9 = document.getElementById("weekHead4-9");

            let monthHead10 = document.getElementById("monthHead10");
            let months10 = document.getElementById("months10");
            let rotate10 = document.getElementById("rotate10");
            let weekHead1_10 = document.getElementById("weekHead1-10");
            let weekHead2_10 = document.getElementById("weekHead2-10");
            let weekHead3_10 = document.getElementById("weekHead3-10");
            let weekHead4_10 = document.getElementById("weekHead4-10");

            let monthHead11 = document.getElementById("monthHead11");
            let months11 = document.getElementById("months11");
            let rotate11 = document.getElementById("rotate11");
            let weekHead1_11 = document.getElementById("weekHead1-11");
            let weekHead2_11 = document.getElementById("weekHead2-11");
            let weekHead3_11 = document.getElementById("weekHead3-11");
            let weekHead4_11 = document.getElementById("weekHead4-11");

            let monthHead12 = document.getElementById("monthHead12");
            let months12 = document.getElementById("months12");
            let rotate12 = document.getElementById("rotate12");
            let weekHead1_12 = document.getElementById("weekHead1-12");
            let weekHead2_12 = document.getElementById("weekHead2-12");
            let weekHead3_12 = document.getElementById("weekHead3-12");
            let weekHead4_12 = document.getElementById("weekHead4-12");
            
            function expandM(_rotate, _months) {
                _rotate.classList.toggle("rotate");
                _months.classList.toggle("expanded");
            }

            function week1Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead1.classList.contains("expanded")) {
                    _weekHead1.classList.remove("expanded");
                } else {
                    _weekHead1.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week2Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead2.classList.contains("expanded")) {
                    _weekHead2.classList.remove("expanded");
                } else {
                    _weekHead2.classList.add("expanded");
                }
                _weekHead1.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week3Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead3.classList.contains("expanded")) {
                    _weekHead3.classList.remove("expanded");
                } else {
                    _weekHead3.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead1.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week4Expand(_weekHead1, _weekHead2, _weekHead3 ,_weekHead4) {
                if (_weekHead4.classList.contains("expanded")) {
                    _weekHead4.classList.remove("expanded");
                } else {
                    _weekHead4.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead1.classList.remove("expanded");
            }
        </script>
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
<script src="calculoPlan.js"></script>
</html>