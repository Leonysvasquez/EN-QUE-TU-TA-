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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/business.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
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
                            <a href="">
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

    <main>
        <section class="section-dashboard" >
            <section class="heading-section">
                <h2>Centro de Negocios</h2>
            </section>

            <section class="modal-add-business" id="modalAddBusiness">
                <div class="modal-container">
                    <div class="modal">
                        <h3>Registre un nuevo negocio</h3>
                        <form action="">
                            <div>
                                <label for="" class="required">Correo empresarial:</label>
                                <span class="material-symbols-outlined">mail</span>
                                <input type="email" name="business_email" required>
                            </div>
                            <div>
                                <label for="" class="required">Nombre empresarial:</label>
                                <span class="material-symbols-outlined">domain</span>
                                <input type="text" name="business_name" required>
                            </div>
                            <div>
                                <label for="" class="required">Teléfono:</label>
                                <span class="material-symbols-rounded">phone</span>
                                <input type="tel" name="business_phone" required>
                            </div>
                            <div>
                                <label for="" class="required">País:</label>
                                <span class="material-symbols-outlined">public</span>
                                <select name="" id="" required>
                                    <?php
                                        include("php/paises.php");
                                        echo "<option value='' selected disabled>Seleccione un país</option>";
                                        echo $paises;
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="" class="required">Ciudad:</label>
                                <span class="material-symbols-outlined">location_city</span>
                                <input type="text" name="business_adress" required>
                            </div>
                            <div>
                                <label for="">Sector:</label>
                                <span class="material-symbols-outlined">location_on</span>
                                <input type="text" name="business_adress">
                            </div>
                            <div>
                                <label for="">Tipo de negocio:</label>
                                <span class="material-symbols-outlined">storefront</span>
                                <select name="" id="">
                                    <option value='' selected disabled>Seleccione un tipo</option>
                                    <option value=''>Comercial</option>
                                    <option value=''>Gubernamental</option>
                                    <option value=''>Religioso</option>
                                </select>
                            </div>
                            <div>
                                <label for="">Área de comercio:</label>
                                <span class="material-symbols-outlined">storefront</span>
                                <input type="text" name="business_adress">
                            </div>
                            <div>
                                <input type="submit" value="Registrar negocio">
                            </div>
                        </form>
                    </div>
                </div>
                <button class="modal-close" onclick="closeModal()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </section>
            <script>
                let modalAddBusiness = document.getElementById("modalAddBusiness");
                function closeModal() {
                    setTimeout(() => {
                        modalAddBusiness.classList.remove("active");
                    }, 200);
                }
            </script>

            <section class="main-content-section business-section">
                <div class="business-cards">
                    <div class="primary-card">
                        <div class="business-card">
                            <button class="createBusiness" id="createBusiness" onclick="openModal()">
                                <span class="material-symbols-outlined">add</span>
                                <p>Registrar un negocio</p>
                            </button>
                        </div>
                    </div>
                    <div class="primary-card">
                        <div class="business-card">
                            <a href="business-dashboard.php?token=<?php echo $row['token'];?>">
                                <div>
                                    <img src="<?php echo "data:image/*;base64,".base64_encode($row['logo']); ?>" alt="">
                                </div>
                                <div>
                                    <label>Nombre negocio si es largo se corta</label>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function openModal() {
                    setTimeout(() => {
                        modalAddBusiness.classList.add("active");
                    }, 200);
                }
            </script>
        </section>
    </main>
    
</body>
<script src="js/scripts.js"></script>
<script src="js/navs.js"></script>
</html>