<?php
include("../php/connection.php");

session_start();
$usermail = $_SESSION["usermail"];

if(!isset($usermail))
{
    header("Location: ../php/logout.php");
}else {
    $sql = "SELECT * FROM users WHERE email = '$usermail'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($query);

    $sqlAnalitycs = "SELECT * FROM readed WHERE read_usermail = '$usermail'";
    $queryAnalitycs = mysqli_query($connection, $sqlAnalitycs);
    $rowAnalitycs = mysqli_fetch_array($queryAnalitycs);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/normalize.css">
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
            <span class="navbar-brand-name"><a href="../dashboard.php">CLOUDCODE</a></span>
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
                        <a href="apps/POSTSVIEW">
                            <div class="app-icon">
                                <span class="material-symbols-rounded">wysiwyg</span>
                            </div>
                            <span class="app-name">Administración Social Media</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-option">
                <a href="options/settings.php">
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

</body>
</html>