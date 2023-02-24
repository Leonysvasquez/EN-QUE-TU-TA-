<?php
include("../php/connection.php");
$token = $_REQUEST['token'];

$sql = "SELECT * FROM users WHERE token = '$token'";
$query = mysqli_query($connection, $sql);

$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>CLOUDCODE - Client Data</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/client-profile.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-brand">
                <div class="navbar-brand-logo">
                    <img src="../img/logocloudcode-W.svg" alt="">
                </div>
                <span class="navbar-brand-name"><a href="">CLOUDCODE</a></span>
            </div>
        </nav>
    </header>

    <section class="profile-container">
        <form action="" method="GET">
            <div class="imgContainer" id="profilePicContainer">
            <img class="profilePicPrev" src="
                            <?php
                            if ($row['logo'] == "")
                            {
                                echo "https://www.seekpng.com/png/detail/966-9665493_my-profile-icon-blank-profile-image-circle.png";
                            } else {
                                echo "data:image/*;base64,".base64_encode($row['logo']);
                            }?>" 
                        alt="">
            </div>
            <label class="username"><?php echo $row['username'];?></label>
            <div class="contact-data">
                <ul>
                    <li>
                        <a href="tel:<?php echo $row['phone'];?>">
                            <ion-icon name="call"></ion-icon>
                            <label for=""><?php echo $row['phone'];?></label>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $row['email'];?>">
                            <ion-icon name="mail"></ion-icon>
                            <label for=""><?php echo $row['email'];?></label>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <ion-icon name="location-sharp"></ion-icon>
                            <label for=""><?php echo $row['adress'];?></label>
                        </a>
                    </li>
                    <li>
                        <a href="website-count.php?token=<?php echo $token."&network=".$row['website']; ?>" target="_blank">
                            <ion-icon name="globe-outline"></ion-icon>
                            <label for=""><?php echo $row['website'];?></label>
                        </a>
                    </li>
                    <li>
                        <div class="social">    
                            <label for="">Redes Sociales</label>
                            <ul>
                                <?php
                                    if($row['whatsapp'] == NULL || $row['whatsapp'] == "") {
                                    } else {
                                        echo "
                                        <li>
                                            <a href='whatsapp-count.php?token=".$token."&network=".$row["whatsapp"]."' target='_blank'>
                                                <img src='https://img.icons8.com/material-outlined/35/ffffff/whatsapp--v1.png'/>
                                            </a>
                                        </li>";
                                    }

                                    if($row['facebook'] == NULL || $row['facebook'] == "") {
                                    } else {
                                        echo "
                                        <li>
                                            <a href='facebook-count.php?token=".$token."&network=".$row["facebook"]."' target='_blank'>
                                                <img src='https://img.icons8.com/fluency-systems-regular/35/ffffff/facebook-new--v1.png'/>
                                            </a>
                                        </li>";
                                    }

                                    if($row['instagram'] == NULL || $row['instagram'] == "") {
                                    } else {
                                        echo "
                                        <li>
                                            <a href='instagram-count.php?token=".$token."&network=".$row["instagram"]."' target='_blank'>
                                                <img src='https://img.icons8.com/fluency-systems-regular/35/ffffff/instagram-new--v1.png'/>
                                            </a>
                                        </li>";
                                    }

                                    if($row['twitter'] == NULL || $row['twitter'] == "") {
                                    } else {
                                        echo "
                                        <li>
                                            <a href='twitter-count.php?token=".$token."&network=".$row["twitter"]."' target='_blank'>
                                                <img src='https://img.icons8.com/fluency-systems-regular/35/ffffff/twitter.png'/>
                                            </a>
                                        </li>";
                                    }

                                    if($row['youtube'] == NULL || $row['youtube'] == "") {
                                    } else {
                                        echo "
                                        <li>
                                            <a href='youtube-count.php?token=".$token."&network=".$row["youtube"]."' target='_blank'>
                                                <img src='https://img.icons8.com/fluency-systems-filled/35/ffffff/youtube-play.png'/>
                                            </a>
                                        </li>";
                                    }
                                                                  
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </section>
    <div class="footer-container">
        <footer>
            <span>© 2022 EPA MERCADEO & PUBLICIDAD - Todos los derechos reservados</span>
        </footer>
    </div>
<script src="js/sign-forms.js"></script>
</body>
</html>