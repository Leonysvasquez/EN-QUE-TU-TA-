<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['usermail'])){
        header("Location:login.php");
    } else {
        $id = $_REQUEST['id'];
        $code = $_REQUEST['code'];
        
        if(empty($id) && empty($code)) {
            header("Location:index.php");
        }

        $sql = "SELECT * FROM post WHERE code = '$code' AND id = '$id'";
        $query = mysqli_query($con, $sql);
        $posts = mysqli_fetch_array($query);

        $usermail = $_SESSION['usermail'];

        $sql5 = "SELECT * FROM users WHERE email = '$usermail'";
        $query5 = mysqli_query($con2, $sql5);
        $userData = mysqli_fetch_array($query5);
    }
    
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
</head>
<body>
    <div class="load" id="load">
        <h2>Cargando...</h2>
        <div></div>
    </div>
        <br><br>
    <a href="index.php?code=<?php echo $code?>" id="reload">Atrás</a>
    <main>
        <h1> Revisión </h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <section>
                <div class="post-image-container">
                    <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                </div>
                <div>
                    <div class="data-container">
                        <label for="titulo">TÍTULO:</label>
                        <input type="text" name="titulo" id="titulo" value="<?php echo $posts['title'];?>" style="text-transform:uppercase;" />
                    </div>
                    <div class="data-container">
                        <label for="subtitulo">SUBTITULO:</label>
                        <input type="text" name="subtitulo" id="subtitulo" value="<?php echo $posts['subtitle'];?>" style="text-transform:uppercase;" />
                    </div>
                    <div class="data-container">
                        <label for="texto">CONTENIDO:</label>
                        <textarea name="texto" id="texto"><?php
                            if(!empty($posts['texto'])){
                                echo $posts['texto']; }?>
                        </textarea>
                    </div>
                    <div class="data-container">
                        <label for="other">OBSERVACIONES:</label>
                        <textarea name="other" id="other"></textarea>
                    </div>
                </div>
            </section>
            <div>
                <input style="--bgcolor:var(--primary); color:#fff" type="submit" name="update" value="Enviar a revisión">
                <input style="--bgcolor:#1edb1e" type="submit" name="accept" value="Aprobar">
            </div>
        </form>
        <?php
            if(isset($_POST['update'])) {
                $title = strtoupper($_POST["titulo"]);
                $texto = $_POST["texto"];
                $other = $_POST["other"];
                $estatus = strtoupper("Revisar");

                if(!empty($other)) {
                    $update = mysqli_query($con, "UPDATE post SET title = '$title', texto = '$texto', observaciones = '$other', estatus = '$estatus' WHERE id = '$id' AND code = '$code'");
                } else {
                    $update = mysqli_query($con, "UPDATE post SET title = '$title', texto = '$texto', estatus = '$estatus' WHERE id = '$id' AND code = '$code'");
                }
               
                if($update) {
                    echo "
                    <script>alert('Enviado a revisión.');
                        let reload = document.querySelector('#reload');
                        reload.click();
                    </script>
                    ";
                } else{
                    echo "<script>alert('Error al enviar a revisión.')</script>";
                }
            }

            if(isset($_POST['accept'])) {
                $estatus = strtoupper("Aceptado");
                $delPost = mysqli_query($con, "UPDATE post SET estatus = '$estatus' WHERE id = '$id' AND code = '$code'");

                if($delPost) {
                    echo "
                    <script>
                        alert('Post aceptado.');
                        window.location.href = 'index.php?code=".$code."';
                    </script>
                    ";
                } else {
                    echo "<script>alert('Error al aceptar el post.')</script>";
                }
            }
        ?>
    </main>
        <section class="post-preview">
            <div class="instagram">
                <div><img src="resources/img/instagram-post-preview.png" alt=""></div>
                <div><img src="data:image/*;base64,<?php echo base64_encode($userData['logo']); ?>" alt=""></div>
                <div><img src="data:image/*;base64,<?php echo base64_encode($userData['logo']); ?>" alt=""></div>
                <div><img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt=""></div>
                <div><img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt=""></div>
                <div>
                    <span>username</span>
                    <textarea disabled><?php echo $posts['texto']; ?></textarea>
                </div>
                <div>
                    <span>username</span>
                    <textarea disabled><?php echo $posts['texto']; ?></textarea>
                </div>
            </div>
        </section>
</body>
<script>
    let load = document.getElementById("load");
    window.addEventListener("load", function(){

        load.style.display = "none";
    });
</script>
<script src="calculoPlan.js"></script>
</html>