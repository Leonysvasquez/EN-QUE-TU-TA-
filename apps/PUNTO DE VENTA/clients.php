<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['admin'])){
        header("Location:login.php");
    }

    $sql = "SELECT * FROM clientes ORDER BY cliente ASC";
    $query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crud.css">
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
        <a href="php/logout.php" id="reload">Cerrar sesión</a>
    </header>

    <br><br>
    <!-- -->
    <h1>Clientes</h1>
    <main>
    <a class="create" href="new-client.php">Agregar cliente +</a>
        <table style="width:600px;">
            <thead>
                <th style="width:43.33%; height: 50px;">CLIENTE</th>
                <!-- <th style="width:28.33%; height: 50px;">CLIENTE</th> -->
                <th style="width:28.33%; height: 50px;">CANTIDAD DE POST</th>
                <th style="width:28.33%; height: 50px;">OPCIONES</th>
            </thead>
            <?php while ($clients = mysqli_fetch_array($query)) { 

                $cliente = $clients['code'];
                $query1 = mysqli_query($con, "SELECT * FROM post WHERE code = $cliente");
                $email  = strtolower($clients['email']);
                
                $query2 = mysqli_query($con2, "SELECT logo FROM users WHERE email = '$email'");
                $clientsLogo = mysqli_fetch_array($query2);
                ?>
    
                <tr>
                    <td style="width:15%; min-height: 50px; height:auto;">
                        <span>
                            <div style="width:50px; height:50px; object-fit:cover; border-radius:50%; overflow:hidden; border: 1px solid black">
                                <img style="width:100%; height:;" src="data:image/*;base64,<?php  echo base64_encode($clientsLogo['logo']);?>" alt="">
                        </div>
                        </span>
                    </td>
                    <td style="width:28.33%%; min-height:50px; height:auto; word-break: break-word; padding-left:15px;">
                        <span><?php echo $clients['cliente'];?></span>
                    </td>
                    <td style="width:28.33%%;  min-height: 50px; height:auto;">
                        <span><?php echo mysqli_num_rows($query1);?></span>
                    </td>
                    <td style="width:28.33%%; min-height: 50px; height:auto; padding:5px 0;">
                        <a style="color:var(--gray);" href="post-crud.php?code=<?php echo $clients['code'];?>"><span class="material-symbols-outlined" title="Ver">visibility</span></a>

                        <a style="color:var(--primary);" href="add-post.php?code=<?php echo $clients['code'];?>"><span class="material-symbols-outlined" title="Subir">file_upload</span></a>
                    </td>
                </tr>
            <?php }  ?>
        </table>
    </main>
</body>
<script>
    let load = document.getElementById("load");
    window.addEventListener("load", function(){
        load.style.display = "none";
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
<script src="navs.js"></script>
</html>