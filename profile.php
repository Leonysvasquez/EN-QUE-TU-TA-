<?php
include("php/connection.php");
session_start();
$usermail = $_SESSION["usermail"];
$token = $_SESSION["token"];

if (!isset($usermail))
{
    header("Location: php/logout.php");
}

$sql = "SELECT * FROM users WHERE email = '$usermail'";
$query = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($query);

$email = $row['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOUDCODE - Profile</title>
    <script type="text/javascript" src="qr/jquery.min.js"></script>
    <script type="text/javascript" src="qr/qrcode.js"></script>
    <script type="text/javascript" src="html2canvas.js"></script>
    <script type="text/javascript" src="html2canvas.min.js"></script>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
                        <a href="profile.php"><span class="material-symbols-outlined">person</span>Perfil</a>
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
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion con texto mas largo</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta notificacion tiene mucho texto</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion con texto mas largo</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta notificacion tiene mucho texto</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta es una notificacion con texto mas largo</span>
                                    <span class="notification-date">06/06/2022</span>
                                </a>
                            </li>
                            <li class="notification">
                                <a href="">
                                    <span class="notification-content">Esta notificacion tiene mucho texto</span>
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
                            <a href="">
                                <div class="app-icon">
                                    <span class="material-symbols-rounded">create_new_folder</span>
                                </div>
                                <span class="app-name">Application 1</span>
                            </a>
                        </div>
                        <div class="app">
                            <a href="">
                                <div class="app-icon">
                                    <span class="material-symbols-rounded">create_new_folder</span>
                                </div>
                                <span class="app-name">Application 2</span>
                            </a>
                        </div>
                        <div class="app">
                            <a href="">
                                <div class="app-icon">
                                    <span class="material-symbols-rounded">create_new_folder</span>
                                </div>
                                <span class="app-name">Application 3</span>
                            </a>
                        </div>
                        <div class="app">
                            <a href="">
                                <div class="app-icon">
                                    <span class="material-symbols-rounded">create_new_folder</span>
                                </div>
                                <span class="app-name">Application 4</span>
                            </a>
                        </div>
                        <div class="app">
                            <a href="">
                                <div class="app-icon">
                                    <span class="material-symbols-rounded">create_new_folder</span>
                                </div>
                                <span class="app-name">Application 5</span>
                            </a>
                        </div>
                        
                    </div>
                </div>

                <div class="menu-option">
                    <a href="">
                        <div class="menu-item-icon">
                            <span class="material-symbols-outlined">settings</span>
                        </div>
                    </a>
                </div>

                <div class="menu-option">
                    <a href="">
                        <div class="menu-item-icon">
                            <span class="material-symbols-outlined">help</span>
                        </div>
                    </a>
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
        <div class="so1 sidenav-option sidenav-option-active">
            <span class="material-symbols-outlined">person</span>
            <span class="sidenav-option-name">Perfil</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option">
            <span class="material-symbols-outlined">inventory</span>
            <span class="sidenav-option-name">Servicios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="sidenav-option-name">Productos</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option">
            <span class="material-symbols-outlined">credit_card</span>
            <span class="sidenav-option-name">Banco</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option">
            <span class="material-symbols-outlined">supervisor_account</span>
            <span class="sidenav-option-name">Usuarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside>

    <main class="main-container">
        <section class="heading-section">
            <h2>Perfil</h2>
        </section>

        <section class="profile-container">

            <div class="profile-image-container">
                <div>
                    <!-- PROFILE QRCODE -->
                    <div class="profile-qrcode">
                        <div class="profile-field profile-qr">
                            <div class="profileQR">
                                <input id="text" type="text" value="<?php echo "http://cloudcode.live/readed-code/count.php?token=".$row['token']; ?>" style="width:80%" hidden/>
                                <button class="hide" id="btnGetQR" onclick="makeCode()" ></button>

                                <div id="capture">
                                    <div id="qrcode"></div>
                                </div>
                                <button id="btnDownloadQR" onclick="downloadQR()">Descargar QR</button>
                            </div>
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
                                    <a href="profile.php" class="cancel-btn" id="cancelImageUpdate"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="profile-data-container">
                <form action="php/update.php" method="post">
                    <!-- PROFILE GENERAL DATA -->
                    <div class="profile-data">
                        <h3 class="profile-data-title">Información principal</h3>
                        <div class="profile-data-fields">
                            <div class="profile-field">
                                <label for="">Correo electrónico:</label>
                                <div>
                                    <input type="email" name="" id="" value="<?php echo $row['email']; ?>" placeholder="Correo" disabled>
                                    <span class="material-symbols-outlined">mail</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Nombre:</label>
                                <div>
                                    <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" placeholder="Nombre">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Teléfono:</label>
                                <div>
                                    <input type="tel" name="phone" id="phone" value="<?php echo $row['phone']; ?>" placeholder="Teléfono">
                                    <span class="material-symbols-rounded">phone</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Ubicación:</label>
                                <div>
                                    <input type="text" name="adress" id="adress" value="<?php echo $row['adress']; ?>" placeholder="Ubicación">
                                    <span class="material-symbols-rounded">home_pin</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Tipo de negocio:</label>
                                <div>
                                    <input type="text" name="" id="" value="<?php echo $row['businesstype']; ?>" placeholder="Tipo de negocio">
                                    <span class="material-symbols-rounded">store</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Área de comercio:</label>
                                <div>
                                    <input type="text" name="businessarea" id="businessarea" value="<?php echo $row['businessarea']; ?>" placeholder="Área de comercio">
                                    <span class="material-symbols-outlined">shopping_bag</span>
                                </div>
                            </div>
                            <div class="profile-field">
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
                        <h3 class="profile-data-title">Redes sociales</h3>
                        <div class="profile-data-fields">
                            <div class="profile-field">
                                <label for="">Página web:</label>
                                <div>
                                    <input type="text" name="website" id="website" value="<?php echo $row['website']; ?>">
                                    <span style="--clr: #f25607"><ion-icon name="globe-outline"></ion-icon></span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Instagram:</label>
                                <div>
                                    <input type="text" name="instagram" id="instagram" value="<?php echo $row['instagram']; ?>">
                                    <span style="--clr: #d93f80"><ion-icon name="logo-instagram"></ion-icon></span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Facebook:</label>
                                <div>
                                    <input type="text" name="facebook" id="facebook" value="<?php echo $row['facebook']; ?>">
                                    <span style="--clr:#166fe5"><ion-icon name="logo-facebook"></ion-icon></span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Whatsapp business:</label>
                                <div>
                                    <input type="text" name="whatsapp" id="whatsapp" value="<?php echo $row['whatsapp']; ?>">
                                    <span style="--clr:#43c453"><ion-icon name="logo-whatsapp"></ion-icon></span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Twitter:</label>
                                <div>
                                    <input type="text" name="twitter" id="twitter" value="<?php echo $row['twitter']; ?>">
                                    <span style="--clr:#1d9bf0"><ion-icon name="logo-twitter"></ion-icon></span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label for="">Youtube:</label>
                                <div>
                                    <input type="text" name="youtube" id="youtube" value="<?php echo $row['youtube']; ?>">
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

        <div class="back-btn-container">
            <a href="dashboard.php"><ion-icon name="chevron-back-outline"></ion-icon>Ir al Dashboard</a>
        </div>
    </main>

<div class="footer-container">
    <footer>
        <span>© 2022 EPA MERCADEO & PUBLICIDAD - Todos los derechos reservados</span>
    </footer>
</div>
<script src="js/navs.js"></script>
<script type="text/javascript">

	function downloadQR() {
		html2canvas(document.querySelector("#capture")).then(canvas => {
			var a = document.createElement('a');
			a.href = canvas.toDataURL('image/png');
			a.download = 'username.png';
			a.click();
			window.location.href = "profile.php";
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
<script src="js/sign-forms.js"></script>

</body>
</html>