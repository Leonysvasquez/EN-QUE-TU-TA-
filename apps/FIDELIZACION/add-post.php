<?php
session_start();
if(empty($_SESSION['admin'])){
    header("Location:login.php");
} else {
    include("php/con.php");

    $code = $_REQUEST["code"];

    $sql2 = "SELECT cliente, email FROM clientes WHERE code = $code ORDER BY cliente ASC";
    $query2 = mysqli_query($con, $sql2);
    $clientData = mysqli_fetch_assoc($query2);
    $clientEmail = $clientData['email'];
    
    $query2 = mysqli_query($con2, "SELECT logo FROM users WHERE email = '$clientEmail'");
    $clientsLogo = mysqli_fetch_array($query2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addpost.css">
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
        <a href="post-crud.php" id="reload">Ver clientes</a>
    </header>

        <br><br>
    <h1>Agregar publicación</h1><br>
    <div style="width: 100%; display:flex; justify-content:center;">
        <div style="width:100px; height:100px; object-fit:cover; border-radius:50%; overflow:hidden; border: 3px solid var(--primary)">
            <img style="width:100%; height:;" src="data:image/*;base64,<?php  echo base64_encode($clientsLogo['logo']);?>" alt="">
        </div>
    </div>
    <h2 style="text-align:center; color: var(--primary);"><?php echo $clientData['cliente']; ?></h2>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <a href="post-crud.php?code=<?php echo $code; ?>" id="view-posts">Ver publicaciones del cliente</a>
            </div>
            <div>
                <label for="post">Post</label>
                <input type="file" name="post" id="profileLogoInput" accept="image/png,.jpeg,.jpg">
                <div class="profile-image">
                    <div class="image">
                        <img class="profile-image-preview" src="" alt="">
                    </div>
                </div>
            </div>
            <div>
                <label for="title">Título</label>
                <input type="text" id="title" name="title">

                <label for="subtitle">Subtítulo</label>
                <input type="text" id="subtitle" name="subtitle">

                <label for="content">Contenido</label>
                <textarea name="content" id="content"></textarea>
            </div>
            <div class="destination">
                <div>
                    <div class="destination-network">
                        <h4>Selecciona la red</h4>
                        <div style="--netColor: #166fe5;">
                            <input type="checkbox" value="1" name="facebook" id="facebook">
                            <label for="facebook"><ion-icon name="logo-facebook"></ion-icon></label>
                        </div>
                        <div style="--netColor: #d93f80;">
                            <input type="checkbox" value="1" name="instagram" id="instagram">
                            <label for="instagram"><ion-icon name="logo-instagram"></ion-icon></label>
                        </div>
                        <div style="--netColor: #f9ba27;">
                            <input type="checkbox" value="1" name="google" id="google">
                            <label for="google"><ion-icon name="logo-google"></ion-icon></label>
                        </div>
                        <div style="--netColor: #fb0015;">
                            <input type="checkbox" value="1" name="youtube" id="youtube">
                            <label for="youtube"><ion-icon name="logo-youtube"></ion-icon></label>
                        </div>
                        <div style="--netColor: #333;">
                            <input type="checkbox" value="1" name="tiktok" id="tiktok">
                            <label for="tiktok"><ion-icon name="logo-tiktok"></ion-icon></label>
                        </div>
                        <div style="--netColor: #0a66c2;">
                            <input type="checkbox" value="1" name="linkedin" id="linkedin">
                            <label for="linkedin"><ion-icon name="logo-linkedin"></ion-icon></label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="destination-date">
                        <div>
                            <label for="month">Mes</label>
                            <select name="month" id="month" required>
                                <option value="" selected disabled>Seleccione el mes</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </div>
                        <div>
                            <label for="week">Semana</label>
                            <select name="week" id="week" required>
                                <option value="" selected disabled>Seleccione la semana</option>
                                <option value="1">Semana 1</option>
                                <option value="2">Semana 2</option>
                                <option value="3">Semana 3</option>
                                <option value="4">Semana 4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="submit" name="submit" value="Subir">
        </form>
        <a href="add-post.php?code=<?php echo $code; ?>" id="reload"></a>

        <!-- Agregar post PHP -->
        <?php
            include("php/con.php");

            if(isset($_POST["submit"]))
            {
                $client = strtoupper($clientData['cliente']);
                $title = strtoupper($_POST["title"]);
                $subtitle = strtoupper($_POST["subtitle"]);
                $content = $_POST["content"];
                $month = $_POST["month"];
                $week = intval($_POST["week"]);
                if(!empty($_POST["facebook"])){$facebook = intval($_POST["facebook"]);} else {$facebook = 0;}
                if(!empty($_POST["instagram"])){$instagram = intval($_POST["instagram"]);} else {$instagram = 0;}
                if(!empty($_POST["google"])){$google = intval($_POST["google"]);} else {$google = 0;}
                if(!empty($_POST["youtube"])){$youtube = intval($_POST["youtube"]);} else {$youtube = 0;}
                if(!empty($_POST["tiktok"])){$tiktok = intval($_POST["tiktok"]);} else {$tiktok = 0;}
                if(!empty($_POST["linkedin"])){$linkedin = intval($_POST["linkedin"]);} else {$linkedin = 0;}
                $estatus = strtoupper("En espera");


                $postTpm = $_FILES['post']['tmp_name'];
                $postContent = addslashes(file_get_contents($postTpm));

                if(!empty($content))
                {
                    $sql = "INSERT INTO post(cliente, post, title, subtitle, texto, month_p, week, facebook, instagram, google, youtube, tiktok, linkedin, code, estatus) VALUES ('$client', '$postContent', '$title', '$subtitle', '$content', '$month', '$week', '$facebook', '$instagram', '$google', '$youtube', '$tiktok', '$linkedin', '$code', '$estatus')";
                }
                else
                {
                    $sql = "INSERT INTO post(cliente, post, title, subtitle, month_p, week, facebook, instagram, google, youtube, tiktok, linkedin, code, estatus) VALUES ('$client', '$postContent', '$title', '$subtitle', '$month', '$week', '$facebook', '$instagram', '$google', '$youtube', '$tiktok', '$linkedin', '$code', '$estatus')";
                }
                $query = mysqli_query($con, $sql);

                if($query) {
                    echo "<script>alert('Post publicado.');</script> ";
                    mysqli_close($con);
                    echo "
                    <script>
                        location.reload;
                    </script>";
                } else {
                    echo "<script>alert('ERROR al subir el post.".mysqli_error($query)."')</script>";
                }
            }
        ?>

    </main>
</body>
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
        }
    });
</script>
<script>
    let load = document.getElementById("load");
    window.addEventListener("load", function(){

        load.style.display = "none";
    });
</script>
</html>