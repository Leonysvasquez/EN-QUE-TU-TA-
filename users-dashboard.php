<?php
include("php/connection.php");
include("php/paises.php");

session_start();
$usermail = $_SESSION["clients"];

if(!isset($usermail))
{
    header("Location: php/logout.php");
}else {
    $query = mysqli_query($connection, "SELECT * FROM clients WHERE email = '$usermail'");
    $row = mysqli_fetch_array($query);

    $sqlAnalitycs = "SELECT * FROM readed WHERE read_usermail = '$usermail'";
    $queryAnalitycs = mysqli_query($connection, $sqlAnalitycs);
    $rowAnalitycs = mysqli_fetch_array($queryAnalitycs);

    $queryFollowers = mysqli_query($connection, "SELECT * FROM follows WHERE followed = '$usermail'");
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
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
</head>
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
                                    <span class="notification-content">Aún no tiene notificaciones.</span>
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
                            <a href="business-center.php">
                                <div class="app-icon">
                                    <span class="material-symbols-outlined">business_center</span>
                                </div>
                                <span class="app-name">Business center</span>
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
        <div class="so1 sidenav-option" hidden>
            <span class="material-symbols-outlined">bar_chart</span>
            <span class="sidenav-option-name">Estadísticas</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option active">
            <span class="material-symbols-outlined">person</span>
            <span class="sidenav-option-name">Perfil</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option" hidden>
            <span class="material-symbols-outlined">inventory</span>
            <span class="sidenav-option-name">Servicios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option" hidden>
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="sidenav-option-name">Productos</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option" hidden>
            <span class="material-symbols-outlined">credit_card</span>
            <span class="sidenav-option-name">Banco</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option" hidden>
            <span class="material-symbols-outlined">supervisor_account</span>
            <span class="sidenav-option-name">Usuarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so7 sidenav-option">
            <span class="material-symbols-outlined">settings</span>
            <span class="sidenav-option-name">Ajustes</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so8 sidenav-option">
            <span class="material-symbols-outlined">help</span>
            <span class="sidenav-option-name">Ayuda</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-container">
        <section class="section-dashboard" hidden>
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

        <section class="section-profile">
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

                <div class="number-section">
                    <div class="profile-number active profile-1">
                        <span class="material-symbols-rounded">person</span>
                    </div>
                    <div class="profile-number profile-2">
                        <span class="material-symbols-rounded">pin_drop</span>
                    </div>
                    <div class="profile-number profile-3">
                        <span class="material-symbols-outlined">vaccines</span>
                    </div>
                    <div class="profile-number profile-4">
                        <span class="material-symbols-outlined">accessibility_new</span>
                    </div>
                    <div class="profile-number profile-5">
                        <span class="material-symbols-outlined">school<span>
                    </div>
                    <div class="profile-number profile-6">
                        <span class="material-symbols-rounded">engineering<span>
                    </div>
                    <div class="profile-number profile-7">
                        <span class="material-symbols-rounded">diversity_3<span>
                    </div>
                    <div class="profile-number profile-8">
                        <span class="material-symbols-rounded">restaurant<span>
                    </div>
                    <div class="profile-number profile-9">
                        <span class="material-symbols-rounded">directions_bike<span>
                    </div>
                    <div class="profile-number profile-10">
                        <span class="material-symbols-rounded">groups<span>
                    </div>
                    <div class="profile-number profile-11">
                        <span class="material-symbols-rounded">music_note<span>
                    </div>
                    <div class="profile-number profile-12">
                        <span class="material-symbols-outlined">movie<span>
                    </div>
                    <div class="profile-number profile-13">
                        <span class="material-symbols-rounded">podcasts<span>
                    </div>
                    <div class="profile-number profile-14">
                        <span class="material-symbols-rounded">work<span>
                    </div>
                    <div class="profile-number profile-15">
                        <span class="material-symbols-rounded">work<span>
                    </div>
                </div>

                <div class="profile-data-container">
                    <form action="php/update.php" method="post" id="personal-data">
                        <!-- PROFILE GENERAL DATA -->
                        <div class="profile-data">
                            <h3 class="data-title">Información principal</h3>
                            <div class="data-fields">
                                <div class="field">
                                    <label for="">Correo electrónico:</label>
                                    <div>
                                        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" disabled>
                                        <span class="material-symbols-outlined">mail</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Nombre(s):</label>
                                    <div>
                                        <input type="text" name="name" id="name" value="<?php echo $row['uname']; ?>">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Apellido(s):</label>
                                    <div>
                                        <input type="text" name="lastname" id="lastname" value="<?php echo $row['ulastname']; ?>">
                                        <span class="material-symbols-rounded">person</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Teléfono:</label>
                                    <div>
                                        <input type="tel" name="phone" id="phone" value="<?php echo $row['phone']; ?>" placeholder="000 000 0000">
                                        <span class="material-symbols-rounded">phone</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">ID (Cédula o Licencia de conducir):</label>
                                    <div>
                                        <input type="text" name="id_doc" id="id_doc" value="<?php echo $row['id_doc']; ?>">
                                        <span class="material-symbols-outlined">badge</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Fecha de nacimiento:</label>
                                    <div>
                                        <input type="date" name="birthday" id="birthday" value="<?php echo $row['birthday']; ?>">
                                        <span class="material-symbols-rounded">event</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Nacionalidad:</label>
                                    <div>
                                        <select name="nationality" id="nationality">
                                            <option value="" selected disabled><?php
                                                if($row['nacionality'] != "" || $row['nationality'] != NULL) {
                                                    echo $row['nationality'];
                                                } else {
                                                    echo "Seleccione el país";
                                                };
                                            ?></option>
                                            <?php echo $paises; ?>
                                        </select>
                                        <span class="material-symbols-outlined">home_pin</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Estatus:</label>
                                    <div>
                                        <select name="status" id="status">
                                            <option value="" selected disabled><?php
                                                if($row['status'] != "" || $row['status'] != NULL) {
                                                    echo $row['status'];
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="SOLTER@">Solter@</option>
                                            <option value="COMPROMETID@">Comprometid@</option>
                                            <option value="CASADO@">Casad@</option>
                                            <option value="VIUD@">Viud@</option>
                                        </select>
                                        <span class="material-symbols-outlined">diversity_3</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PROFILE NETWORKS DATA -->
                        <!-- <div class="profile-networks">
                            <h3 class="data-title">Redes sociales</h3>
                            <div class="data-fields">
                                <div class="field">
                                    <label for="">Página web:</label>
                                    <div>
                                        <input type="url" name="website" id="website" value="<?php echo $row['website']; ?>">
                                        <span style="--clr: #f25607"><ion-icon name="globe-outline"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Instagram:</label>
                                    <div>
                                        <input type="url" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>">
                                        <span style="--clr: #d93f80"><ion-icon name="logo-instagram"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Facebook:</label>
                                    <div>
                                        <input type="url" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>">
                                        <span style="--clr:#166fe5"><ion-icon name="logo-facebook"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Whatsapp business:</label>
                                    <div>
                                        <input type="url" name="whatsapp" id="whatsapp" value="<?php echo $row['whatsapp']; ?>">
                                        <span style="--clr:#43c453"><ion-icon name="logo-whatsapp"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Twitter:</label>
                                    <div>
                                        <input type="url" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>">
                                        <span style="--clr:#1d9bf0"><ion-icon name="logo-twitter"></ion-icon></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Youtube:</label>
                                    <div>
                                        <input type="url" name="youtube" id="youtube" value="<?php echo $row['youtube']; ?>">
                                        <span style="--clr:red"><ion-icon name="logo-youtube"></ion-icon></span>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="location-data" hidden>
                        <!-- PROFILE LOCATION DATA -->
                        <div class="profile-data">
                            <h3 class="data-title">Datos geográficos</h3>
                            <div class="data-fields">
                                <?php
                                    $usersLocationquery = mysqli_query($connection, "SELECT * FROM users_location WHERE email = '$usermail' LIMIT 1");
                                    $usersLocationRow = mysqli_fetch_array($usersLocationquery);
                                ?>
                                <div class="field">
                                    <label for="">País:</label>
                                    <div>
                                        <select name="locationCountry" id="locationCountry">
                                            <option value="" selected disabled><?php
                                                if($usersLocationRow['country'] != "" || $usersLocationRow['country'] != NULL) {
                                                    echo $usersLocationRow['country'];
                                                } else {
                                                    echo "Seleccione el país";
                                                };
                                            ?></option>
                                                <?php echo $paises; ?>
                                        </select>
                                        <span class="material-symbols-outlined">public</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Estado o Provincia:</label>
                                    <div>
                                        <input type="text" name="locationState" id="locationState" value="<?php echo $usersLocationRow['state']; ?>">
                                        <span class="material-symbols-outlined">travel_explore</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Ciudad o Municipio:</label>
                                    <div>
                                        <input type="text" name="locationCity" id="locationCity" value="<?php echo $usersLocationRow['city']; ?>">
                                        <span class="material-symbols-rounded">location_city</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Sector o Barrio:</label>
                                    <div>
                                        <input type="tel" name="locationBlock" id="locationBlock" value="<?php echo $usersLocationRow['block']; ?>">
                                        <span class="material-symbols-rounded">apartment</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Calle:</label>
                                    <div>
                                        <input type="text" name="locationStreet" id="locationStreet" value="<?php echo $usersLocationRow['street']; ?>">
                                        <span class="material-symbols-outlined">signpost</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Número (Casa, edificio o apto.):</label>
                                    <div>
                                        <input type="text" name="locationHomeNumber" id="locationHomeNumber" value="<?php echo $usersLocationRow['home_number']; ?>">
                                        <span class="material-symbols-rounded">house</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Código postal:</label>
                                    <div>
                                        <input type="text" name="locationPostal" id="locationPostal" value="<?php echo $usersLocationRow['postal']; ?>">
                                        <span class="material-symbols-outlined">local_post_office</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Religión:</label>
                                    <div>
                                        <select name="locationReligion" id="locationReligion">
                                            <option value="" selected disabled><?php
                                                if($usersLocationRow['religion'] != "" || $usersLocationRow['religion'] != NULL) {
                                                    echo ucfirst(mb_strtolower($usersLocationRow['religion']));
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="BAHA'I">Baha'i</option>
                                            <option value="BUDISMO">Budismo</option>
                                            <option value="CAO DAI">Cao Dai</option>
                                            <option value="CRISTIANISMO">Cristianismo</option>
                                            <option value="JUDAÍSMO">Judaísmo</option>
                                            <option value="ESPIRITISMO">Espiritismo</option>
                                            <option value="HINDUISMO">Hinduismo</option>
                                            <option value="ISLAM">Islam</option>
                                            <option value="JAINISMO">Jainismo</option>
                                            <option value="NEO-PAGANISM">Neo-Paganism</option>
                                            <option value="PRIMAL INDÍGENAS">Primal indígenas</option>
                                            <option value="RASTAFARI">Rastafari</option>
                                            <option value="RELIGIÓN TRADICIONAL CHINA">Religión tradicional china</option>
                                            <option value="SHINTO">Shinto</option>
                                            <option value="SIJISMO">Sijismo</option>
                                            <option value="TENRIKYO">Tenrikyo</option>
                                            <option value="TRADICIONAL AFRICANA">Tradicional africana</option>
                                            <option value="UNITARIAN-UNIVERSALISM">Unitarian-Universalism</option>
                                            <option value="ZOROASTRISMO">Zoroastrismo</option>
                                            <option value="OTRO">Otro</option>
                                        </select>
                                        <span class="material-symbols-outlined">church</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="medical-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data">
                            <h3 class="data-title">Información médica</h3>
                            <div class="data-fields">
                                <?php
                                    $usersMedicalInfoquery = mysqli_query($connection, "SELECT * FROM users_medical_information WHERE email = '$usermail' LIMIT 1");
                                    $usersMedicalInfoRow = mysqli_fetch_array($usersMedicalInfoquery);
                                ?>
                                <div class="field">
                                    <label for="">Sexo:</label>
                                    <div>
                                        <select name="medicalGender" id="medicalGender">
                                            <option value="" selected disabled><?php
                                                if($usersMedicalInfoRow['gender'] != "" || $usersMedicalInfoRow['gender'] != NULL) {
                                                    echo ucfirst(mb_strtolower($usersMedicalInfoRow['gender']));
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="MASCULINO">Masculino</option>
                                            <option value="FEMENINO">Femenino</option>
                                        </select>
                                        <span class="material-symbols-outlined">transgender</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Tipo de sangre:</label>
                                    <div>
                                        <select name="medicalBloodType" id="medicalBloodType">
                                            <option value="" selected disabled><?php
                                                if($usersMedicalInfoRow['blood_type'] != "" || $usersMedicalInfoRow['blood_type'] != NULL) {
                                                    echo $usersMedicalInfoRow['blood_type'];
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                        </select>
                                        <span class="material-symbols-outlined">bloodtype</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Enfermedad o condicion:</label>
                                    <div>
                                        <input type="text" name="medicalSickness" id="medicalSickness" value="<?php echo $usersMedicalInfoRow['sickness']; ?>">
                                        <span class="material-symbols-outlined">sick</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Alergia(s):</label>
                                    <div>
                                        <input type="text" name="medicalAllergy" id="medicalAllergy" value="<?php echo $usersMedicalInfoRow['allergy']; ?>">
                                        <span class="material-symbols-rounded">coronavirus</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Contacto de emergencia:</label>
                                    <div>
                                        <input type="tel" name="medicalSosContact" id="medicalSosContact" value="<?php echo $usersMedicalInfoRow['sos_contact']; ?>">
                                        <span class="material-symbols-outlined">contact_emergency</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->
                    
                    <form action="php/update.php" method="post" id="physical-features" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="physicalFeatures">
                            <h3 class="data-title">Rasgos físicos</h3>
                            <div class="data-fields">
                                <?php
                                    $usersPhysicFeaturesquery = mysqli_query($connection, "SELECT * FROM users_physical_features WHERE email = '$usermail' LIMIT 1");
                                    $usersPhysicFeaturesRow = mysqli_fetch_array($usersPhysicFeaturesquery);
                                ?>
                                <div class="field">
                                    <label for="">Estatura (pies):</label>
                                    <div>
                                        <input type="number" name="physicalFeaturesHeight" id="physicalFeaturesHeight" value="<?php echo $usersPhysicFeaturesRow['height']; ?>">
                                        <span class="material-symbols-rounded">height</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Peso (libras):</label>
                                    <div>
                                        <input type="number" name="physicalFeaturesWeight" id="physicalFeaturesWeight" value="<?php echo $usersPhysicFeaturesRow['weight']; ?>">
                                        <span class="material-symbols-rounded">weight</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Color de piel:</label>
                                    <div>
                                        <select name="physicalFeaturesSkin" id="physicalFeaturesSkin">
                                            <option value="" selected disabled><?php
                                                if($usersPhysicFeaturesRow['skin'] != "" || $usersPhysicFeaturesRow['skin'] != NULL) {
                                                    echo ucfirst(mb_strtolower($usersPhysicFeaturesRow['skin']));
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="ALBINO">Albino</option>
                                            <option value="CAUCÁSICO">Caucásico</option>
                                            <option value="MESTIZO">Mestizo</option>
                                            <option value="MORENO CLARO">Moreno claro</option>
                                            <option value="MORENO OSCURO">Moreno oscuro</option>
                                            <option value="NEGRA">Negra</option>
                                        </select>
                                        <span class="material-symbols-outlined">palette</span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Color de ojos:</label>
                                    <div>
                                        <select name="physicalFeaturesEyes" id="physicalFeaturesEyes">
                                            <option value="" selected disabled><?php
                                                if($usersPhysicFeaturesRow['eyes'] != "" || $usersPhysicFeaturesRow['eyes'] != NULL) {
                                                    echo ucfirst(mb_strtolower($usersPhysicFeaturesRow['eyes']));
                                                } else {
                                                    echo "Seleccione una opción";
                                                };
                                            ?></option>
                                            <option value="NEGRO">Negro</option>
                                            <option value="MARRÓN">Marrón</option>
                                            <option value="MIEL">Miel</option>
                                            <option value="VERDE">Verde</option>
                                            <option value="AZUL">Azul</option>
                                            <option value="GRIS">Gris</option>
                                            <option value="HETEROCROMÁTICOS">Heterocromáticos</option>
                                        </select>
                                        <span class="material-symbols-outlined">palette</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="academic-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="profileAcademicFields">
                            <h3 class="data-title">Grados académicos</h3>
                        </div>
                        <div>
                            <a id="addGrade" onclick="addAcademicGrade();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar grado académico</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->
                    
                    <form action="php/update.php" method="post" id="working-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="profileWorkingFields">
                            <h3 class="data-title">Experiencias laborales</h3>
                        </div>
                        <div>
                            <a id="addExperience" onclick="addWorkExperience();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar experiencia</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->
                    
                    <form action="php/update.php" method="post" id="work-reference-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="profileReferencesFields">
                            <h3 class="data-title">Referencias personales</h3>
                        </div>
                        <div>
                            <a id="addReference" onclick="addWorkReference();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar referencia</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->
                    
                    <form action="php/update.php" method="post" id="gastronomic-preferences" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="gastronomicPreferences">
                            <h3 class="data-title">Preferencias gastronómicas</h3>
                        </div>
                        <div>
                            <a id="addFood" onclick="addFoodPreference();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar preferencia</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="hobbies-sport-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="hobbies-sport">
                            <h3 class="data-title">Hobbies y deportes</h3>
                        </div>
                        <div>
                            <a id="addHobbie" onclick="addHobbies();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar hobbie o deporte</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="sport-teams" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="sportTeams">
                            <h3 class="data-title">Equipos deportivos</h3>
                        </div>
                        <div>
                            <a id="addSportTeam" onclick="addSportTeam();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar equipo deportivo</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="favorite-music" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="favoriteMusic">
                            <h3 class="data-title">Géneros musicales favoritos</h3>
                        </div>
                        <div>
                            <a id="addMusic" onclick="addMusic();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar género musical</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="favorite-movie" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="favoriteMovie">
                            <h3 class="data-title">Géneros de películas favoritos</h3>
                        </div>
                        <div>
                            <a id="addMovie" onclick="addMovie();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar género de película</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="programs-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="favoritePrograms">
                            <h3 class="data-title">Programas de TV y radio</h3>
                        </div>
                        <div>
                            <a id="addProgram" onclick="addProgram();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar programa</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="movies-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="movies">
                            <h3 class="data-title">Hobbies y deportes</h3>
                        </div>
                        <div>
                            <a id="addHobbie" onclick="addHobbies();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar hobbie o deporte</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>
                    <!-- ============================================================= -->

                    <form action="php/update.php" method="post" id="movies-data" hidden>
                        <!-- PROFILE MEDICAL DATA -->
                        <div class="profile-data profileWorkingFields" id="movies">
                            <h3 class="data-title">Hobbies y deportes</h3>
                        </div>
                        <div>
                            <a id="addHobbie" onclick="addHobbies();" style="
                                cursor: pointer;
                                background: var(--gray);
                                color: white;
                                padding: 10px 15px;
                                border: none;
                                border-radius: 3px">
                            + Agregar hobbie o deporte</a>
                        </div>
                        <br><br><br>
                        <div class="form-button">
                            <input style="cursor: pointer;" type="submit" name="submit" value="Guardar cambios">
                        </div>
                    </form>

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
<script src="js/addWorkExperience.js"></script>
<script src="js/addWorkReference.js"></script>
<script src="js/addGrade.js"></script>
<script src="js/addFoodPreference.js"></script>
<script src="js/addHobbie.js"></script>
<script src="js/addSportTeam.js"></script>
<script src="js/addMusic.js"></script>
<script src="js/addMovie.js"></script>
<script src="js/addFavoritePrograms.js"></script>
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
        width : 170,
        height : 170
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
</body>

</html>