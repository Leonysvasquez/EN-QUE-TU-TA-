<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['admin'])){
        header("Location:login.php");
    }

    $id = $_REQUEST['id'];
    $code = $_REQUEST['code'];
    
    if(empty($id) && empty($code)) {
        header("Location:post-crud.php");
    }

    $sql = "SELECT * FROM post WHERE code = '$code' AND id = '$id'";
    $query = mysqli_query($con, $sql);
    $posts = mysqli_fetch_array($query);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="postedit.css">
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
        <a class='clientPosts' href="post-crud.php?code=<?php echo $posts['code']; ?>">Atrás</a>
    </header>

        <br><br>
    

    <a href="post-view.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" id="reload"></a>
    <main>
        <h1> Revisión</h1>
        <h2 style="color: var(--primary);"><?php echo $posts['cliente']; ?></h2>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <section>
                <div class="post-image-container">
                    <label for="profileLogoInput">Cambiar imagen <input type="file" name="post" id="profileLogoInput" accept="image/png,.jpeg,.jpg" hidden></label>
                    <img  class="profile-image-preview" src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                </div>
                <div class="post-data">
                    <div class="data-container">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo $posts['title'];?>" style="text-transform:uppercase;" />
                    </div>
                    <div class="data-container">
                        <label for="subtitulo">Subtítulo:</label>
                        <input type="text" name="subtitulo" id="subtitulo" value="<?php echo $posts['subtitle'];?>" style="text-transform:uppercase;" />
                    </div>
                    <div class="data-container">
                        <label for="texto">Contenido:</label>
                        <textarea name="texto" id="texto"><?php
                            if(!empty($posts['texto'])){
                                echo $posts['texto']; } ?>
                        </textarea>
                    </div>
                    <div class="data-container">
                        <label for="other">Observaciones o comentarios:</label>
                        <textarea name="other" id="other" disabled><?php
                            if(!empty($posts['observaciones'])){
                                echo $posts['observaciones']; } ?>
                        </textarea>
                    </div>
                    
                    <div class="destination-network">
                        <h4>Selecciona la red</h4>
                        <div style="--netColor: #166fe5;">
                            <input type="checkbox" <?php if($posts['facebook'] == 1) { echo "checked";}?> value="1" name="facebook" id="facebook">
                            <label for="facebook"><ion-icon name="logo-facebook"></ion-icon></label>
                        </div>
                        <div style="--netColor: #d93f80;">
                            <input type="checkbox" <?php if($posts['instagram'] == 1) { echo "checked";}?> value="1" name="instagram" id="instagram">
                            <label for="instagram"><ion-icon name="logo-instagram"></ion-icon></label>
                        </div>
                        <div style="--netColor: orange;">
                            <input type="checkbox" <?php if($posts['google'] == 1) { echo "checked";}?> value="1" name="google" id="google">
                            <label for="google"><ion-icon name="logo-google"></ion-icon></label>
                        </div>
                        <div style="--netColor: #fb0015;">
                            <input type="checkbox" <?php if($posts['youtube'] == 1) { echo "checked";}?> value="1" name="youtube" id="youtube">
                            <label for="youtube"><ion-icon name="logo-youtube"></ion-icon></label>
                        </div>
                        <div style="--netColor: #333;">
                            <input type="checkbox" <?php if($posts['tiktok'] == 1) { echo "checked";}?> value="1" name="tiktok" id="tiktok">
                            <label for="tiktok"><ion-icon name="logo-tiktok"></ion-icon></label>
                        </div>
                        <div style="--netColor: #0a66c2;">
                            <input type="checkbox" <?php if($posts['linkedin'] == 1) { echo "checked";}?> value="1" name="linkedin" id="linkedin">
                            <label for="linkedin"><ion-icon name="logo-linkedin"></ion-icon></label>
                        </div>
                    </div>
                    <div class="destination-date">
                        <div>
                            <label for="month">Mes de posteo</label>
                            <select name="month" id="month" required>
                                <option value="<?php echo $posts['month_p'];?>" selected><?php echo $posts['month_p'];?></option>
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
                            <label for="week">Semana de posteo</label>
                            <select name="week" id="week" required>
                                <option value="<?php echo $posts['week'];?>" selected disabled><?php echo "Semana ".$posts['week'];?></option>
                                <option value="1">Semana 1</option>
                                <option value="2">Semana 2</option>
                                <option value="3">Semana 3</option>
                                <option value="4">Semana 4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
            <div class="btn-container">
                <div style="--bgcolor: var(--primary); color:#fff;">
                    <input type="submit" id="imgChange"  style="" name="imgChange" value="imgChange" hidden>
                    <span class="material-symbols-outlined">update</span><input type="submit" name="update" value="Actualizar">
                </div>
                <div style="--bgcolor: red; color:#fff;">
                    <span class="material-symbols-outlined">delete</span><input type="submit" name="eliminar" value="Eliminar">
                </div>
                
                    <?php if($posts['estatus'] == "ACEPTADO") {
                        echo "<div style='--bgcolor:#1edb1e;'><span class='material-symbols-outlined'>publish</span><input type='submit' name='publish' style='color:#000; value='Publicar'></div>";
                    } ?>
                
            </div>
        </form>
            <?php
            if(isset($_POST['imgChange'])) {

                $postTpm = $_FILES['post']['tmp_name'];
                $postContent = addslashes(file_get_contents($postTpm));

                $updatePost = mysqli_query($con, "UPDATE post SET post = '$postContent' WHERE id = '$id' AND code = '$code'");

                if($updatePost) {
                    echo "
                    <script>alert('Imagen actualizada.');
                        let reload = document.querySelector('#reload');
                        reload.click();
                    </script>
                    ";
                } else {
                    echo "<script>alert('Error con la actualización.')</script>";
                }
            }

            if(isset($_POST['eliminar'])) {
                $deletePost = mysqli_query($con, "DELETE FROM post WHERE id = '$id' AND code = '$code'");

                if($deletePost) {
                    echo "
                    <script>alert('Imagen eliminada correctamente.');
                        let back = document.querySelector('.clientPosts');
                        back.click();
                    </script>
                    ";
                } else {
                    echo "<script>alert('Error con la eliminación.')</script>";
                }
            }

            if(isset($_POST['update'])) {
                $title = strtoupper($_POST["titulo"]);
                $subtitle = strtoupper($_POST["subtitulo"]);
                $texto = $_POST["texto"];
                $month = $_POST["month"];
                $week = intval($_POST["week"]);
                if(!empty($_POST["facebook"])){$facebook = intval($_POST["facebook"]);} else {$facebook = 0;}
                if(!empty($_POST["instagram"])){$instagram = intval($_POST["instagram"]);} else {$instagram = 0;}
                if(!empty($_POST["google"])){$google = intval($_POST["google"]);} else {$google = 0;}
                if(!empty($_POST["youtube"])){$youtube = intval($_POST["youtube"]);} else {$youtube = 0;}
                if(!empty($_POST["tiktok"])){$tiktok = intval($_POST["tiktok"]);} else {$tiktok = 0;}
                if(!empty($_POST["linkedin"])){$linkedin = intval($_POST["linkedin"]);} else {$linkedin = 0;}
                $other = $_POST["other"];
                $estatus = strtoupper("En espera");
                
                $update = mysqli_query($con, "UPDATE post SET title = '$title', subtitle = '$subtitle', texto = '$texto', month_p = '$month', week = $week, facebook = $facebook, instagram = $instagram, google = $google, youtube = $youtube, tiktok = $tiktok, linkedin = $linkedin, estatus = '$estatus' WHERE id = '$id' AND code = '$code'");

                if($update) {
                    echo "
                    <script>alert('Actualización exitosa.');
                        let reload = document.querySelector('#reload');
                        reload.click();
                    </script>
                    ";
                } else {
                    echo "<script>alert('Error con la actualización.')</script>";
                }

            }

            if(isset($_POST['publish'])) {
                $delPost = mysqli_query($con, "DELETE FROM post WHERE id = '$id' AND code = '$code'");

                if($delPost) {
                    echo "
                    <script>
                        alert('Post publicado.');
                        window.location.href = 'post-crud.php?code=".$code."';
                    </script>
                    ";
                } else {
                    echo "<script>alert('Error al publicar el post.')</script>";
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
    const imgChange = document.querySelector("#imgChange");
    
    profilePic.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            profilePicPrev.style.display = "block";

            reader.addEventListener("load", function() {
                profilePicPrev.setAttribute("src", this.result);
                imgChange.click();
            });

            reader.readAsDataURL(file);
        }
    });

    let load = document.getElementById("load");
    window.addEventListener("load", function(){

        load.style.display = "none";
    });
</script>
</html>