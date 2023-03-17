<?php
session_start();
if(empty($_SESSION['admin'])){
    header("Location:login.php");
} else {
    include("php/con.php");

    $query1 = mysqli_query($con, "SELECT * FROM clientes");
    $query1Array = mysqli_fetch_array($query1);
    $query1Rows = mysqli_num_rows($query1);
    $clientsEmails = $query1Array['email'];

    $query2 = mysqli_query($con2, "SELECT * FROM users ORDER BY username");

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,1,-50..200" />
</head>
<body>
    <div class="load" id="load">
        <h2>Cargando...</h2>
        <div></div>
    </div>

    <header>
        <a id="reload" href="post-crud.php?code=<?php echo $posts['code']; ?>">Atrás</a>
    </header>

        <br><br>
    <a href="post-crud.php">Atrás</a>
    <h1>Agregar nuevo cliente</h1>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <section>
                    <label for="newClient">Seleccione un cliente para comenzar a subir sus publicaciones.</label><br>
                    <span class="material-symbols-rounded" style="color: var(--primary); font-size: 5em; margin-bottom: 15px;">person_add</span>
                    <select name="newClient" id="newClient" style="margin:auto; width:100%;" required>
                        <option value="" selected disabled>Seleccione un cliente</option>
                        <?php while ($newClient = mysqli_fetch_array($query2)) { 
                            $clientEmail = $newClient['email'];
                            $clientName = $newClient['username'];
                                echo "<option value='$clientEmail'>$clientName</option>";
                            }
                        ?>
                    </select>
                </section>
            </div>
            <br>
            <input type="submit" name="submit" value=" Agregar nuevo cliente">
        </form>

        <!-- Agregar post PHP -->
        <?php
            include("php/con.php");

            if(isset($_POST["submit"]))
            {
                $newClient = strtoupper($_POST["newClient"]);
                $code = mt_rand(1000, 9999);

                $clientSql = "SELECT * FROM clientes WHERE email = '$newClient'";
                $verifyClient = mysqli_query($con, $clientSql);
                $codeAssoc = mysqli_fetch_array($verifyClient);

                $clientSql2 = "SELECT * FROM users WHERE email = '$newClient'";
                $verifyClient2 = mysqli_query($con2, $clientSql2);
                $codeAssoc2 = mysqli_fetch_array($verifyClient2);

                $email = strtoupper($codeAssoc2['email']);
                
                if(mysqli_num_rows($verifyClient) > 0) {
                    $client = strtoupper($codeAssoc['cliente']);
                    $code = $codeAssoc['code'];

                    echo "<script>alert('El cliente ya ha sido agregado anteriormente. Redirigiendo a la subida de publicaciones.');</script> ";
                    mysqli_close($con);
                    echo "
                    <a href='add-post.php?code=$code' id='reload'></a>
                    <script>
                        let reload = document.querySelector('#reload');
                        reload.click();
                    </script>";
                } else {
                    $client = strtoupper($codeAssoc2['username']);

                    do
                    {
                        $vsql = "SELECT code FROM clientes WHERE code = '$code'";
                        $verifyCode = mysqli_query($con, $vsql);

                        if(mysqli_num_rows($verifyCode) > 0) {
                            $code = mt_rand(1000, 9999);
                        }
                    } while (mysqli_num_rows($verifyCode) > 0);

                    $addClient = mysqli_query($con, "INSERT INTO clientes(email, cliente,  code) VALUES ('$email', '$client', '$code')");

                    if($addClient) {
                        echo "<script>alert('Cliente agregado. IMPORTANTE: Este es el código del cliente: ".$code."');</script> ";
                        mysqli_close($con);
                        echo "
                        <a href='add-post.php?code=$code' id='reload'></a>
                        <script>
                            let reload = document.querySelector('#reload');
                            reload.click();
                        </script>";
                    } else {
                        echo "<script>alert('ERROR al subir el post.".mysqli_error($query)."')</script>";
                    }

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