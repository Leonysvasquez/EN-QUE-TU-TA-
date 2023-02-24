<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['admin'])){
        header("Location:login.php");
    } else {
        $code = $_REQUEST['code'];

        if(empty($code)) {
            header("Location:clients.php");
        }

        $sql = "SELECT * FROM post WHERE code = $code ORDER BY id ASC";
        $query = mysqli_query($con, $sql);

        $cname = mysqli_query($con, "SELECT email, cliente FROM clientes WHERE code = $code");
        $clientName = mysqli_fetch_array($cname);
        $email  = strtolower($clientName['email']);
                    
        $query2 = mysqli_query($con2, "SELECT * FROM users WHERE email = '$email'");
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
        <a href="clients.php" id="reload">Volver a clientes</a>
    </header>
        <br><br>

    <a href="post-crud.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" id="reload"></a>


    <h1><?php echo $clientsLogo['username']; ?></h1>
    <div style="width: 100%; display:flex; justify-content:center;">
        <div style="width:100px; height:100px; object-fit:cover; border-radius:50%; overflow:hidden; border: 3px solid var(--primary)">
            <img style="width:100%; height:;" src="data:image/*;base64,<?php  echo base64_encode($clientsLogo['logo']);?>" alt="">
        </div>
    </div>
    <h2 style="text-align:center; color: var(--primary);"><?php echo $clientName['cliente']; ?></h2>
    <main>
        <a class="addpost" href="add-post.php?code=<?php echo $code; ?>">Subir publicación +</a>
        
            <table>
                <thead>
                    <th>POST</th>
                    <th>STATUS</th>
                    <th>OPCIONES</th>
                </thead>
                <?php while ($posts = mysqli_fetch_array($query)) { 
                    $id = $posts['id'];
                    $code = $posts['code'];
                ?>
                <form action="" method="POST">
                    <tr>
                    <td>
                        <div>
                            <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt=''>
                        </div>
                    </td>
                    <td>
                        <span style="color:<?php
                            switch ($posts['estatus']) {
                                case 'EN ESPERA':
                                    echo "#fd9825";
                                    break;
                                
                                case 'REVISAR':
                                    echo "red";
                                    break;
                                
                                case 'ACEPTADO':
                                    echo "#29c729";
                                    break;
                                
                                default:
                                    break;
                            } ?>;" ><?php echo $posts['estatus'];?>
                        </span>
                    </td>
                    <td><a href='post-view.php?id=<?php echo $posts['id'];?>&code=<?php echo $posts['code'];?>'><span class="material-symbols-outlined" title="Editar">edit_square</span></a>
                    </td>
                </tr>
                </form>
                <?php };?>
                
            </table>
    </main>
</body>
<script>
    let btnPub = querySelector("#publicar");
    let inputPub = querySelector("#publish");

    accept(){
        inputPub.click();
    };
</script>
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
</html>