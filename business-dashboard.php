<?php
include("php/connection.php");

session_start();
$clientmail = $_SESSION["clients"];
$businessToken = $_REQUEST['token'];

if(!isset($clientmail))
{
    header("Location: php/logout.php");
}else {
    $sql = "SELECT * FROM clients WHERE token = '$businessToken'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);

    $businessMail = $row['email'];

    $sqlAnalitycs = "SELECT * FROM readed WHERE read_usermail = '$clientmail'";
    $queryAnalitycs = mysqli_query($connection, $sqlAnalitycs);
    $rowAnalitycs = mysqli_fetch_array($queryAnalitycs);

    $queryFollowers = mysqli_query($connection, "SELECT * FROM follows WHERE followed = '$clientmail'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title translate="no">CLOUDCODE - Dashboard</title>
    <script type="text/javascript" src="qr/jquery.min.js"></script>
    <script type="text/javascript" src="qr/qrcode.js"></script>
    <script type="text/javascript" src="html2canvas.js"></script>
    <script type="text/javascript" src="html2canvas.min.js"></script>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <div class="navbar-brand-logo">
                    <img src="img/logocloudcode-W.svg" alt="">
                </div>
                <span class="navbar-brand-name"><a href="">CLOUDCODE</a></span>
            </div>

            <div class="menu">
                
                <div class="dropdown user-dropdown">
                    <div class="user-img">
                        <img src="
                        <?php
                            if ($row['logo'] == "")
                            {
                                echo "img/def-profile.png";
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
                                    <span class="notification-content">Esta es una notificacion</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
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
                                    <span class="material-symbols-rounded">wysiwyg</span>
                                </div>
                                <span class="app-name">Administración Social Media</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- LEFT NAVIGATION BAR -->
    <aside class="sidenav">
        <div class="toggle-menu" id="toggleMenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="so1 sidenav-option active">
            <span class="material-symbols-outlined">bar_chart</span>
            <span class="sidenav-option-name">Estadísticas</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option">
            <span class="material-symbols-outlined">person</span>
            <span class="sidenav-option-name">Perfil de negocio</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option">
            <span class="material-symbols-outlined">schedule</span>
            <span class="sidenav-option-name">Horarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option">
            <span class="material-symbols-outlined">inventory</span>
            <span class="sidenav-option-name">Servicios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="sidenav-option-name">Productos</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">credit_card</span>
            <span class="sidenav-option-name">Banco</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so7 sidenav-option">
            <span class="material-symbols-outlined">supervisor_account</span>
            <span class="sidenav-option-name">Usuarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so8 sidenav-option">
            <span class="material-symbols-outlined">settings</span>
            <span class="sidenav-option-name">Ajustes</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so9 sidenav-option">
            <span class="material-symbols-outlined">help</span>
            <span class="sidenav-option-name">Ayuda</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-container">
        <section class="section-dashboard" >
            <section class="heading-section">
                <h2>Estadísticas</h2>
            </section>

            <section class="main-content-section analytics-section">
                <div class="analytics-cards">
                    <div class="primary-card">
                        <div class="analytics-card">
                            <div>
                                <h6>Visitantes</h6>
                                <div>
                                    <span class="material-symbols-rounded arrow-right">person_pin_circle</span>  
                                    <input style="color: var(--primary)" type="text" value="<?php echo $rowAnalitycs['qrcode_readed']; ?>" disabled/>
                                </div>
                            </div>
                            <div>
                                <h6>Registrados</h6>
                                <div>
                                    <span class="material-symbols-rounded arrow-right">person_add</span>  
                                    <input style="color: var(--lightgray)" type="text" value="<?php echo mysqli_num_rows($queryFollowers); ?>" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="secondary-cards">
                        <?php
                            if($row['website'] != "" || $row['website'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <span class="material-symbols-rounded arrow-right">language</span> 
                                            <h6>Website</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["website_readed"].'" disabled/>
                                    </div>
                                ';
                            };

                            if($row['instagram'] != "" || $row['instagram'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <ion-icon name="logo-instagram"></ion-icon>
                                            <h6>Instagram</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["instagram_readed"].'" disabled/>
                                    </div>
                                ';
                            };

                            if($row['facebook'] != "" || $row['facebook'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <ion-icon name="logo-facebook"></ion-icon> 
                                            <h6>Facebook</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["facebook_readed"].'" disabled/>
                                    </div>
                                ';
                            };

                            if($row['whatsapp'] != "" || $row['whatsapp'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <ion-icon name="logo-whatsapp"></ion-icon>
                                            <h6>Whatsapp B.</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["whatsapp_readed"].'" disabled/>
                                    </div>
                                ';
                            };

                            if($row['twitter'] != "" || $row['twitter'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <ion-icon name="logo-twitter"></ion-icon>
                                            <h6>Twitter</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["twitter_readed"].'" disabled/>
                                    </div>
                                ';
                            };

                            if($row['youtube'] != "" || $row['youtube'] != null){
                                echo '
                                    <div class="analytics-card">
                                        <div>
                                            <ion-icon name="logo-youtube"></ion-icon> 
                                            <h6>Youtube</h6> 
                                        </div>  
                                        <input style="color: var(--lightgray)" type="text" value="'.$rowAnalitycs["youtube_readed"].'" disabled/>
                                    </div>
                                ';
                            };
                        ?>
                    </div>
                </div>
                
                <div class="analytics-chart">
                    <div class="chart-legend">
                        <!-- website legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:var(--primary)"></div>
                            <label class="legend-name">Website</label>
                        </div>
                        <!-- instagram legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:#e84a59"></div>
                            <label class="legend-name">Instagram</label>
                        </div>
                        <!-- facebook legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:#1877f2"></div>
                            <label class="legend-name">Facebook</label>
                        </div>
                        <!-- whatsapp legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:#38be4b"></div>
                            <label class="legend-name">Whatsapp</label>
                        </div>
                        <!-- twitter legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:#1d9bf0"></div>
                            <label class="legend-name">Twitter</label>
                        </div>
                        <!-- youtube legend -->
                        <div class="legend">
                            <div class="legend-color" style="--clr:#ff1300"></div>
                            <label class="legend-name">Youtube</label>
                        </div>
                    </div>

                    <div class="chart-container">
                        <div class="chart">
                            <!-- Chart here -->
                        </div>
                        <div class="chart-y-axis">
                            <span>100</span>
                            <span>200</span>
                            <span>300</span>
                            <span>400</span>
                            <span>500</span>
                            <span>600</span>
                        </div>
                        <div class="chart-x-axis">
                            <span>07/06/22</span>
                            <span>07/06/22</span>
                            <span>07/06/22</span>
                            <span>07/06/22</span>
                            <span>07/06/22</span>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-profile" hidden>
            <section class="heading-section">
                <h2>Perfil</h2>
                <span id="subHeading">Principal</span>
            </section>
            

            <section class="profile-container">

                <div class="profile-image-container">
                    <div>
                        <!-- PROFILE QRCODE -->
                        <div class="profile-qrcode">
                            <div class="profileQR">
                                <input id="text" type="text" value="<?php echo "http://cloudcode.live/users-login.php?token=".$row['token']; ?>" style="width:80%" hidden/>
                                <button class="hide" id="btnGetQR" onclick="makeCode()" ></button>

                                <div id="capture">
                                    <div id="qrcode"></div>
                                </div>
                                <button id="btnDownloadQR" onclick="downloadQR()">Descargar QR</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="profile-image">
                            <img class="profile-image-preview" src="
                                <?php
                                if ($row['logo'] == "")
                                {
                                    echo "img/def-profile.png";
                                } else {
                                    echo "data:image/*;base64,".base64_encode($row['logo']);
                                }?>" 
                            alt="">
                        </div>
                        <div class="selected-image">
                            <form action="php/update-logo.php" method="post" enctype="multipart/form-data">
                                <input id="profileLogoInput" name="logo" type="file" value="" placeholder="Logo" accept="image/png,.jpeg,.jpg" hidden>
                                
                                <div class="image-update-options" id="labelSelectLogo">
                                    <div class="hide" id="imageButtonOptions1">
                                        <input type="submit" class="accept-btn" value="" name="submitLogo" id="submitLogo" disabled>
                                    </div>
                                    <label class="change-image-btn" for="profileLogoInput" id="a-preview">
                                        <div>Cambiar imagen</div>
                                    </label>
                                    <div class="hide" id="imageButtonOptions2">
                                        <a href="" class="cancel-btn" id="cancelImageUpdate"></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="number-section">
                    <div class="profile-number active profile-1">1</div>
                    <div class="profile-number profile-2">2</div>
                    <div class="profile-number profile-3">3</div>
                    <div class="profile-number profile-4">4</div>
                    <div class="profile-number profile-5">5</div>
                    <div class="profile-number profile-6">6</div>
                    <div class="profile-number profile-7">7</div>
                    <div class="profile-number profile-8">8</div>
                    <div class="profile-number profile-9">9</div>
                    <div class="profile-number profile-10">10</div>
                    <div class="profile-number profile-11">11</div>
                    <div class="profile-number profile-12">12</div>
                    <div class="profile-number profile-13">13</div>
                    <div class="profile-number profile-14">14</div>
                    <div class="profile-number profile-15">15</div>
                </div> -->

                <div class="profile-data-container">
                    <form action="php/update.php" method="post">
                        <!-- PROFILE GENERAL DATA -->
                        <div class="profile-data">
                            <h3 class="data-title">Información principal</h3>
                            <div class="data-fields">
                                <div class="field">
                                    <label for="">Correo electrónico:</label>
                                    <div>
                                        <input type="email" name="" id="" value="<?php echo $row['email']; ?>" placeholder="Correo" disabled>
                                        <span class="material-symbols-outlined">mail</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Nombre:</label>
                                    <div>
                                        <input type="text" name="username" id="username" value="<?php echo $row['uname']; ?>" placeholder="Nombre">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Teléfono:</label>
                                    <div>
                                        <input type="tel" name="phone" id="phone" value="<?php echo $row['phone']; ?>" placeholder="Teléfono">
                                        <span class="material-symbols-rounded">phone</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Ubicación:</label>
                                    <div>
                                        <input type="text" name="adress" id="adress" value="<?php echo $row['adress']; ?>" placeholder="Ubicación">
                                        <span class="material-symbols-rounded">home_pin</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Tipo de negocio:</label>
                                    <div>
                                        <input type="text" name="" id="" value="<?php echo $row['businesstype']; ?>" placeholder="Tipo de negocio">
                                        <span class="material-symbols-rounded">store</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Área de comercio:</label>
                                    <div>
                                        <input type="text" name="businessarea" id="businessarea" value="<?php echo $row['businessarea']; ?>" placeholder="Área de comercio">
                                        <span class="material-symbols-outlined">shopping_bag</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Contraseña:</label>
                                    <div>
                                        <input type="password" name="website" id="website" value="<?php echo $row['password']; ?>" placeholder="Contraseña">
                                        <span class="material-symbols-outlined">lock</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PROFILE NETWORKS DATA -->
                        <div class="profile-networks">
                            <h3 class="data-title">Redes sociales</h3>
                            <div class="data-fields">
                                <div class="field">
                                    <label for="">Página web:</label>
                                    <div>
                                        <input type="url" name="website" id="website" value="<?php echo $row['website']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr: #f25607"><ion-icon name="globe-outline"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Instagram:</label>
                                    <div>
                                        <input type="url" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr: #d93f80"><ion-icon name="logo-instagram"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Facebook:</label>
                                    <div>
                                        <input type="url" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr:#166fe5"><ion-icon name="logo-facebook"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Whatsapp business:</label>
                                    <div>
                                        <input type="url" name="whatsapp" id="whatsapp" value="<?php echo $row['whatsapp']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr:#43c453"><ion-icon name="logo-whatsapp"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Twitter:</label>
                                    <div>
                                        <input type="url" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr:#1d9bf0"><ion-icon name="logo-twitter"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Youtube:</label>
                                    <div>
                                        <input type="url" name="youtube" id="youtube" value="<?php echo $row['youtube']; ?>" placeholder="Pega el enlace aquí">
                                        <span style="--clr:red"><ion-icon name="logo-youtube"></ion-icon></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                </div>
            </section>
        </section>

        <section class="section-schedules" hidden>
            <section class="heading-section">
                <h2>Horarios</h2>
            </section>

            <section class="schedules-container">
                <div>
                    <!-- <h3 class="data-title">Publicaciones</h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-services" hidden>
            <section class="heading-section">
                <h2>Servicios</h2>
            </section>

            <section class="services-container">
                <div>
                    <!-- <h3 class="data-title">Publicaciones</h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-products" hidden>
            <section class="heading-section">
                <h2>Productos</h2>
            </section>

            <section class="products-container">
                <div>
                    <!-- <h3 class="data-title">Publicaciones</h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-banks" hidden>
            <section class="heading-section">
                <h2>Bancos</h2>
            </section>

            <section class="banks-container">
                <div>
                    <!-- <h3 class="data-title">Publicaciones</h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-users" hidden>
            <section class="heading-section">
                <h2>Usuarios</h2>
            </section>

            <section class="users-container">
                <div>
                    <!-- <h3 class="data-title"></h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-settings" hidden>
            <section class="heading-section">
                <h2>Ajustes</h2>
            </section>

            <section class="settings-container">
                <div>
                    <h3 class="data-title">Publicaciones</h3>
                    <div class="data-fields">
                        <form action="" method="POST">
                            <div class="field">
                                <input type="checkbox" name="editPub" id="editPub"> 
                                <label for="editPub">Revisión de publicaciones</label>
                                <span class="material-symbols-outlined info-icon">info</span>
                                <div class="info">
                                    <p>
                                        Visualizar las publicaciones programadas para sus redes sociales antes de que estas sean publicadas.
                                    </p>
                                </div>
                            </div>
                            <div class="form-button">
                                <input style="cursor: pointer;" type="submit" name="saveSettings" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>

        <section class="section-help" hidden>
            <section class="heading-section">
                <h2>Ayuda</h2>
            </section>

            <section class="help-container">
                <div>
                    <!-- <h3 class="data-title"></h3> -->
                    <div class="data-fields">
                        <div class="field">
                            Próximamente...
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <!-- FOOTER -->
    <div class="footer-container">
        <footer>
            <span>© 2022 EPA MERCADEO & PUBLICIDAD - Todos los derechos reservados</span>
        </footer>
    </div>


<script src="js/scripts.js"></script>
<script src="js/navs.js"></script>
<script type="text/javascript">
    function downloadQR() {
        html2canvas(document.querySelector("#capture")).then(canvas => {
            var a = document.createElement('a');
            a.href = canvas.toDataURL('image/png');
            a.download = 'username.png';
            a.click();
        });
    }

    var qrcode = new QRCode(document.getElementById("qrcode"), {
        width : 200,
        height : 200
    });

    function makeCode () {		
        var elText = document.getElementById("text");
        
        // if (!elText.value) {
        // 	alert("Input a text");
        // 	elText.focus();
        // 	return;
        // }
        
        qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#text").
        on("blur", function () {
            makeCode();
        }).
        on("keydown", function (e) {
            if (e.keyCode == 13) {
                makeCode();
            }
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
<script>
    const profilePic = document.getElementById("profileLogoInput");
    const profilePicPrev = document.querySelector(".profile-image-preview");
    const subLogo = document.querySelector("#submitLogo");
    const labelSelectLogo = document.querySelector("#labelSelectLogo");
    const cancelImageUpdate = document.querySelector("#cancelImageUpdate");
    const imageButtonOptions1 = document.querySelector("#imageButtonOptions1");
    const imageButtonOptions2 = document.querySelector("#imageButtonOptions2");
    
    profilePic.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            profilePicPrev.style.display = "block";

            reader.addEventListener("load", function() {
                profilePicPrev.setAttribute("src", this.result);
            });

            reader.readAsDataURL(file);

            cancelImageUpdate.classList.remove("hide");
            labelSelectLogo.classList.remove("hide");
            imageButtonOptions1.classList.remove("hide");
            imageButtonOptions2.classList.remove("hide");
            subLogo.removeAttribute("disabled");
        }
    });
</script>
<script>
    let subHeading = document.querySelector("#subHeading");
</script>
</body>

</html>