
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/comprados.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>


<?php require_once 'includes/sidebar.php'?>
<!--Main-->
<?php   require_once 'includes/barra.php' ?>
    <div class="main">
        <div class="cardHeader">
            <div>
                <h4 class="title">Balance General</h4>
                <div class="number">15,000</div>
                <div class="sell">
                    Comprar Mas Puntos <input class="btn" type="button" value="COMPRAR">
                </div>
            </div>
        </div>
        <div class="details">
            <table>
                <thead>
                    <tr>
                        <td>Distribucion de Puntos X Redes</td>
                        <td>Balance</td>
                        <td>Asignados + Puntos</td>
                        <td>Valor x Click</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-facebook"></i> <h4> Interacion Facebook</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text" class = "texto"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-instagram"></i> <h4>Interacion Instagram</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-twitter"></i> <h4>Interacion Twiteer</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-youtube"></i> <h4>Interacion Youtube</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-linkedin"></i> <h4>Interacion Linkedin</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-snapchat"></i> <h4>Interacion Snapchat</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"class="check"> <i class="bi bi-tiktok"></i> <h4>Interacion TikTok</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-google"></i> <h4>Interacion TikTok</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-browser-chrome"></i> <h4>Interacion Pagina Web</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <td>Distribucion de Puntos X Interacciones</td>
                        <td>Balance</td>
                        <td>Asignados + Puntos</td>
                        <td> Valor x Click</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-file-check"></i><h4>Interacion Registrados</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-buildings"></i><h4>Interacion Visitas</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-share"></i><h4>Interacion Compartir</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-chat-square-text"></i><h4>Interacion Comentarios</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-hand-thumbs-up"></i><h4>Interacion Me Gusta</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-person-check"></i> <h4>Interacion Siguiendo</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                </tbody>
            </table>
            
            <table>
                <thead>
                    <tr>
                        <td>Distribucion de Puntos X Contenido</td>
                        <td>Balance</td>
                        <td>Asignados</td>
                        <td>Valor x Click</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-image"></i><h4>Compartir Picture</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-file-earmark-play"></i><h4>Compartir Video</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-music-note-beamed"></i><h4>Compartir Audio</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="check"> <i class="bi bi-stickies"></i><h4>Compartir Post</h4></td>
                        <td><p>10</p></td>
                        <td><input type="text"></td>
                        <td><input type="number"><input type="button" value="Aplicar" class="btntr"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>



    




