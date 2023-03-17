<?php
include("php/con.php");

    session_start();
    if(empty($_SESSION['usermail'])){
        header("Location:login.php");
    } else {
        $email = $_SESSION['usermail'];

        $sql1 = "SELECT * FROM clientes WHERE email = '$email' LIMIT 1";
        $query1 = mysqli_query($con, $sql1);
        $array1 = mysqli_fetch_array($query1);

        $code = $array1['code'];

        $sql = "SELECT * FROM post WHERE code = '$code'";
        $query = mysqli_query($con, $sql);

        function viewNets($posts) {
            if($posts['facebook'] == 1) {
                echo "<span style='color: #2778e2;'><ion-icon name='logo-facebook'></ion-icon></span>";
            }
            if($posts['instagram'] == 1) {
                echo "<span style='color: #d93f80;'><ion-icon name='logo-instagram'></ion-icon></span>";
            }
            if($posts['google'] == 1) {
                echo "<span style='color: #f9ba27;'><ion-icon name='logo-google'></ion-icon></span>";
            }
            if($posts['youtube'] == 1) {
                echo "<span style='color: #f30015;'><ion-icon name='logo-youtube'></ion-icon></span>";
            }
            if($posts['tiktok'] == 1) {
                echo "<span style='color: #333;'><ion-icon name='logo-tiktok'></ion-icon></span>";
            }
            if($posts['twitter'] == 1) {
                echo "<span style='color: #2e9eee;'><ion-icon name='logo-twitter'></ion-icon></span>";
            }
            if($posts['linkedin'] == 1) {
                echo "<span style='color: #1969c0;'><ion-icon name='logo-linkedin'></ion-icon></span>";
            }
        }
                            
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
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
        <a href="../../dashboard.php" id="reload">Volver a CLOUDCODE</a>
    </header>

    <h1>Bienvenid@ <b><?php echo $array1['cliente'];?></b></h1>

    <!-- LEFT NAVIGATION BAR -->
    <aside class="sidenav">
        <div class="toggle-menu" id="toggleMenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="so1 sidenav-option active">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="sidenav-option-name">Plan</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option">
            <span class="material-symbols-outlined">photo_library</span>
            <span class="sidenav-option-name">Publicaciones</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option">
            <span class="material-symbols-outlined">settings</span>
            <span class="sidenav-option-name">Ajustes</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option">
            <span class="material-symbols-outlined">help</span>
            <span class="sidenav-option-name">Ayuda</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside>
    <main>


        <form action="php/plan.php?mail=<?php echo $array1["email"];?>" method="POST" id="planSectionForm">
        <section class="plan-section" id="planSection">
        <?php
            $planEmail = $array1["email"];

            $canEdit = mysqli_query($con, "SELECT * FROM clientPlan WHERE plan_email = '$planEmail'");
            $canEditRow = mysqli_num_rows($canEdit);
            $canEditArray = mysqli_fetch_array($canEdit);
            if ($canEditRow > 0 && $canEditArray['plan_edit'] == 0) {
                echo "<h2>Su plan ya ha sido configurado. Si desea realizar algún cambio a este, por favor contacte con las oficinas de EPA</h2>
                        <br>
                        <p style='display:flex; align-items:center;'><span class='material-symbols-outlined'>phone</span><b style='margin-left:5px;'>TELÉFONO: </b><a  style='margin-left:5px;' href='tel:8292453271'> 829 245 3271</a></p>
                        <p style='display:flex; align-items:center;'><span class='material-symbols-outlined'>mail</span><b style='margin-left:5px;'>CORREO: </b><a  style='margin-left:5px;' href='mailto:epamercadeopublicidad@gmail.com'> epamercadeopublicidad@gmail.com</a></p>
                        <p style='display:flex; align-items:center;'><span class='material-symbols-outlined'>schedule</span><b style='margin-left:5px;'>HORARIO: </b><span  style='margin-left:5px;'>Lunes a Viernes de <b>09:30 am</b> - <b>04:30 pm</b></span></p>
                        
                        <br><br>

                        <a href='planFactura.php?client=".$email."'>VER FACTURA Y DATOS DEL PLAN</a>
                        
                        ";
                        
            } else if($canEditRow == 0 || $canEditRow == NULL) {       
        ?>
            <h2>Configure su plan para el posteo en sus redes sociales y más</h2>
            <div>
                <h3><ion-icon name="share-social-outline"></ion-icon>Redes Sociales<span>(Mínimo 2)</span></h3>
                <div>
                    <fieldset>
                        <div>
                            <div class="selectNet">
                                <div>Redes</div>
                                <div>Frecuencia</div>
                                <div>Cantidad</div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netFacebook" id="netFacebook" value="1">
                                    <label for="netFacebook"><ion-icon name="logo-facebook" style="--clr: #2778e2;"></ion-icon>Facebook</label>
                                </div>
                                <div>
                                    <select name="timeOptionFacebook" id="timeOptionFacebook">
                                        <option value="Semanal" selected>Semanal</option>
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostFacebook" id="cantPostFacebook" onchange="sumFacebook()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netInstagram" id="netInstagram" value="1">
                                    <label for="netInstagram"><ion-icon name="logo-instagram" style="--clr:  #d93f80;"></ion-icon>Instagram</label>
                                </div>
                                <div>
                                    <select name="timeOptionInstagram" id="timeOptionInstagram">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostInstagram" id="cantPostInstagram" onchange="sumInstagram()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netGoogle" id="netGoogle" value="1">
                                    <label for="netGoogle"><ion-icon name="logo-google" style="--clr: #f9ba27;"></ion-icon>Google</label>
                                </div>
                                <div>
                                    <select name="timeOptionGoogle" id="timeOptionGoogle">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostGoogle" id="cantPostGoogle" onchange="sumGoogle()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netYoutube" id="netYoutube" value="1">
                                    <label for="netYoutube"><ion-icon name="logo-youtube" style="--clr: #f30015;"></ion-icon>Youtube</label>
                                </div>
                                <div>
                                    <select name="timeOptionYoutube" id="timeOptionYoutube">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostYoutube" id="cantPostYoutube" onchange="sumYoutube()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netTiktok" id="netTiktok" value="1">
                                    <label for="netTiktok"><ion-icon name="logo-tiktok" style="--clr: #333;"></ion-icon>TikTok</label>
                                </div>
                                <div>
                                    <select name="timeOptionTiktok" id="timeOptionTiktok">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostTiktok" id="cantPostTiktok" onchange="sumTiktok()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netTwitter" id="netTwitter" value="1">
                                    <label for="netTwitter"><ion-icon name="logo-twitter" style="--clr: #2e9eee;"></ion-icon>Twitter</label>
                                </div>
                                <div>
                                    <select name="timeOptionTwitter" id="timeOptionTwitter">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostTwitter" id="cantPostTwitter" onchange="sumTwitter()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netLinkedin" id="netLinkedin" value="1">
                                    <label for="netLinkedin"><ion-icon name="logo-linkedin" style="--clr: #1969c0;"></ion-icon>LinkedIn</label>
                                </div>
                                <div>
                                    <select name="timeOptionLinkedin" id="timeOptionLinkedin">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostLinkedin" id="cantPostLinkedin" onchange="sumLinkedin()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectNet">
                                <div>
                                    <input type="checkbox" name="netSnapchat" id="netSnapchat" value="1">
                                    <label for="netSnapchat"><ion-icon name="logo-snapchat" style="--clr: #fffc00;"></ion-icon>Snapchat</label>
                                </div>
                                <div>
                                    <select name="timeOptionSnapchat" id="timeOptionSnapchat">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostSnapchat" id="cantPostSnapchat" onchange="sumSnapchat()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <!-- <div>
                <h3><ion-icon name="time-outline"></ion-icon>Horario de posteo</h3>
                <div>
                    <fieldset>
                        <ol>
                            <li style="--clr: var(--primary);">
                                <input type="checkbox" name="manana" id="manana" value="Manana">
                                <label for="manana">Mañana</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="checkbox" name="tarde" id="tarde" value="Tarde">
                                <label for="tarde">Tarde</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="checkbox" name="noche" id="noche" value="Noche">
                                <label for="noche">Noche</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="checkbox" name="variado" id="variado" value="Variado">
                                <label for="variado">Variado</label>
                            </li>
                        </ol>
                    </fieldset>
                </div>
            </div> -->
            <div>
                <h3><ion-icon name="extension-puzzle-outline"></ion-icon>Servicios Adicionales</h3>
                <div>
                    <fieldset>
                        <div>
                            <div class="selectService">
                                <div>Servicio</div>
                                <div>Frecuencia</div>
                                <div>Cantidad</div>
                                <div>Redes</div>
                            </div>

                            <div class="selectService" style="--clr: var(--primary);">
                                <div>
                                    <input type="checkbox" name="netHistoria" id="netHistoria" value="Historia">
                                    <label for="netHistoria">Historia</label>
                                </div>
                                <div>
                                    <select name="days_quantity" id="daysQuantity">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostHistoria" id="cantPostHistoria" onchange="sumHistoria()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div>
                                    <select name="redesHistoria" id="redesHistoria" onchange="sumHistoria()">
                                        <option value="1">Facebook</option>
                                        <option value="2">Instagram</option>
                                        <option value="3">Ambas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="selectService" style="--clr: var(--primary);">
                                <div>
                                    <input type="checkbox" name="netReel" id="netReel" value="Reel">
                                    <label for="netReel">Reels</label>
                                </div>
                                <div>
                                    <select name="days_quantity" id="daysQuantity">
                                        <option value="Semanal" selected>Semanal</option>
                                        
                                    </select>
                                </div>
                                <div>
                                    <select name="cantPostReel" id="cantPostReel" onchange="sumReel()">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div>
                                    <select name="redesReel" id="redesReel" onchange="sumReel()">
                                        <option value="1">Facebook</option>
                                        <option value="2">Instagram</option>
                                        <option value="3">Ambas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div>
                <h3><ion-icon name="newspaper-outline"></ion-icon>¿Quién provee el contenido?</h3>
                <div>
                    <fieldset>
                        <ol>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="contenidoEntregado" id="contenidoEntregadoCliente"  value="0" onchange="sumRedes()" required>
                                <label for="contenidoEntregadoCliente">Entregado por mi</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="contenidoEntregado" id="contenidoEntregadoEmpresa"  value="1" onchange="sumRedes()" required>
                                <label for="contenidoEntregadoEmpresa">Proveído por la empresa</label>
                            </li>
                        </ol>
                    </fieldset>
                </div>
            </div>
            <div>
                <h3><ion-icon name="time-outline"></ion-icon>Tiempo del servicio</h3>
                <div>
                    <fieldset>
                        <ol>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="tiempoContrato" id="tiempoContratoI" onchange="sumRedes()" value="0"  required>
                                <label for="tiempoContratoI">Indefinido (Sin contrato)</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="tiempoContrato" id="tiempoContrato6" onchange="sumRedes()" value="6" required>
                                <label for="tiempoContrato6">6 Meses (Con contrato)</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="tiempoContrato" id="tiempoContrato12" onchange="sumRedes()" value="12" required>
                                <label for="tiempoContrato12">12 Meses (Con contrato)</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="tiempoContrato" id="tiempoContrato18" onchange="sumRedes()" value="18" required>
                                <label for="tiempoContrato18">18 Meses (Con contrato)</label>
                            </li>
                            <li style="--clr: var(--primary);">
                                <input type="radio" name="tiempoContrato" id="tiempoContrato24" onchange="sumRedes()" value="24" required>
                                <label for="tiempoContrato24">24 Meses (Con contrato)</label>
                            </li>
                        </ol>
                    </fieldset>
                </div>
            </div>
            <div class="value">
                <h2>Costo total:</h2>
                <p>RD$<label name="totalCostLabel" id="totalCostLabel">0</label></p>
            </div>
                <input name="totalCost" id="totalCost" type="number" value=""  style="opacity: 0;">
            <div>
                <div>
                    <input type="checkbox" name="conditions" id="conditions" required>
                    <label for="conditions">Aceptar las condiciones y políticas del <a href="ña">Contrato de Suscripción</a>.</label>
                </div>
                <div>
                    <input type="submit" name="savePlan" id="savePlan" value="ACEPTAR">
                </div>
            </div>
        <?php
            }
        ?>
        </section>
        </form>
        
        <!-- <div class="network-filter-posts" id="netSel" hidden>
            <div class="net1"><span><ion-icon name="logo-facebook"></ion-icon></span></div>
            <div class="net2 selected"><span><ion-icon name="logo-instagram"></ion-icon></span></div>
            <div class="net3"><span><ion-icon name="logo-google"></ion-icon></span></div>
            <div></div>
        </div> -->
        <script>
            /*let net1 = document.querySelector(".net1");
            let net2 = document.querySelector(".net2");
            let net3 = document.querySelector(".net3");
            let netSel = document.getElementById("netSel");

            net1.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net2.classList.remove("selected");
                net3.classList.remove("selected");
                netSel.classList.add("activel");
                netSel.classList.remove("activer");
            });

            net2.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net1.classList.remove("selected");
                net3.classList.remove("selected");
                netSel.classList.remove("activel");
                netSel.classList.remove("activer");
            });

            net3.addEventListener("click", function ()
            {
                this.classList.add("selected");
                net2.classList.remove("selected");
                net1.classList.remove("selected");
                netSel.classList.remove("activel");
                netSel.classList.add("activer");
            });*/
        </script>
        <div class="post-sectioner" id="postSectioner" hidden>
            <!-- ================== -->
            <!-- TODOS LOS POST -->
            <div class="months" id="months">
                <div class="month">
                    <div class="month-head" id="monthHead" onclick="expandM(rotate, months)">VER TODOS
                        <span class="material-symbols-outlined" id="rotate">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head expanded" id="">TODOS</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================== -->

            <br><br>

            
            <!-- ================== -->
            <!-- ENERO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Enero'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months1">
                <div class="month">
                    <div class="month-head" id="monthHead1" onclick="expandM(rotate1, months1)">ENERO
                        <span class="material-symbols-outlined" id="rotate1">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-1" onclick="week1Expand(this, weekHead2_1, weekHead3_1, weekHead4_1)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Enero' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-1" onclick="week2Expand(weekHead1_1, this, weekHead3_1, weekHead4_1)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Enero' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-1" onclick="week3Expand(weekHead1_1, weekHead2_1, this, weekHead4_1)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Enero' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-1" onclick="week4Expand(weekHead1_1, weekHead2_1, weekHead3_1, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Enero' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- FEBRERO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Febrero'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months2">
                <div class="month">
                    <div class="month-head" id="monthHead2" onclick="expandM(rotate2, months2)">FEBRERO
                        <span class="material-symbols-outlined" id="rotate2">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-2" onclick="week1Expand(this, weekHead2_2, weekHead3_2, weekHead4_2)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Febrero' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-2" onclick="week2Expand(weekHead1_2, this, weekHead3_2, weekHead4_2)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Febrero' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-2" onclick="week3Expand(weekHead1_2, weekHead2_2, this, weekHead4_2)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Febrero' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-2" onclick="week4Expand(weekHead1_2, weekHead2_2, weekHead3_2, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Febrero' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- MARZO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Marzo'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months3">
                <div class="month">
                    <div class="month-head" id="monthHead3" onclick="expandM(rotate3, months3)">MARZO
                        <span class="material-symbols-outlined" id="rotate3">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-3" onclick="week1Expand(this, weekHead2_3, weekHead3_3, weekHead4_3)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Marzo' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-3" onclick="week2Expand(weekHead1_3, this, weekHead3_3, weekHead4_3)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Marzo' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-3" onclick="week3Expand(weekHead1_3, weekHead2_3, this, weekHead4_3)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Marzo' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-3" onclick="week4Expand(weekHead1_3, weekHead2_3, weekHead3_3, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Marzo' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- ABRIL -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Abril'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months4">
                <div class="month">
                    <div class="month-head" id="monthHead4" onclick="expandM(rotate4, months4)">ABRIL
                        <span class="material-symbols-outlined" id="rotate4">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-4" onclick="week1Expand(this, weekHead2_4, weekHead3_4, weekHead4_4)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Abril' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-4" onclick="week2Expand(weekHead1_4, this, weekHead3_4, weekHead4_4)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Abril' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-4" onclick="week3Expand(weekHead1_4, weekHead2_4 this, weekHead4_4)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Abril' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-4" onclick="week4Expand(weekHead1_4, weekHead2_4, weekHead3_4, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Abril' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- MAYO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Mayo'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months5">
                <div class="month">
                    <div class="month-head" id="monthHead5" onclick="expandM(rotate5, months5)">MAYO
                        <span class="material-symbols-outlined" id="rotate5">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-5" onclick="week1Expand(this, weekHead2_5, weekHead3_5, weekHead4_5)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Mayo' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-5" onclick="week2Expand(weekHead1_5, this, weekHead3_5, weekHead4_5)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Mayo' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-5" onclick="week3Expand(weekHead1_5, weekHead2_5, this, weekHead4_5)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Mayo' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-5" onclick="week4Expand(weekHead1_5, weekHead2_5, weekHead3_5, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Mayo' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- JUNIO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Junio'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months6">
                <div class="month">
                    <div class="month-head" id="monthHead6" onclick="expandM(rotate6, months6)">JUNIO
                        <span class="material-symbols-outlined" id="rotate6">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-6" onclick="week1Expand(this, weekHead2_6, weekHead3_6, weekHead4_6)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Junio' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-6" onclick="week2Expand(weekHead1_6, this, weekHead3_6, weekHead4_6)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Junio' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-6" onclick="week3Expand(weekHead1_6, weekHead2_6, this, weekHead4_6)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Junio' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-6" onclick="week4Expand(weekHead1_6, weekHead2_6, weekHead3_6, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Junio' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- JULIO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Julio'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months7">
                <div class="month">
                    <div class="month-head" id="monthHead7" onclick="expandM(rotate7, months7)">JULIO
                        <span class="material-symbols-outlined" id="rotate7">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-7" onclick="week1Expand(this, weekHead2_7, weekHead3_7, weekHead4_7)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Julio' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-7" onclick="week2Expand(weekHead1_7, this, weekHead3_7, weekHead4_7)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Julio' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-7" onclick="week3Expand(weekHead1_7, weekHead2_7, this, weekHead4_7)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Julio' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-7" onclick="week4Expand(weekHead1_7, weekHead2_7, weekHead3_7, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Julio' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- AGOSTO -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Agosto'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months8">
                <div class="month">
                    <div class="month-head" id="monthHead8" onclick="expandM(rotate8, months8)">AGOSTO
                        <span class="material-symbols-outlined" id="rotate8">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-8" onclick="week1Expand(this, weekHead2_8, weekHead3_8, weekHead4_8)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Agosto' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-8" onclick="week2Expand(weekHead1_8, this, weekHead3_8, weekHead4_8)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Agosto' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-8" onclick="week3Expand(weekHead1_8, weekHead2_8, this, weekHead4_8)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Agosto' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-8" onclick="week4Expand(weekHead1_8, weekHead2_8, weekHead3_8, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Agosto' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            


            <!-- ================== -->
            <!-- SEPTIEMBRE -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Septiembre'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months9">
                <div class="month">
                    <div class="month-head" id="monthHead9" onclick="expandM(rotate9, months9)">SEPTIEMBRE
                        <span class="material-symbols-outlined" id="rotate9">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-9" onclick="week1Expand(this, weekHead2_9, weekHead3_9, weekHead4_9)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Septiembre' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-9" onclick="week2Expand(weekHead1_9, this, weekHead3_9, weekHead4_9)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Septiembre' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-9"  onclick="week3Expand(weekHead1_9, weekHead2_9, this, weekHead4_9)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Septiembre' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-9" onclick="week4Expand(weekHead1_9, weekHead2_9, weekHead3_9, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Septiembre' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->


            
            <!-- ================== -->
            <!-- OCTUBRE -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Octubre'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months10">
                <div class="month">
                    <div class="month-head" id="monthHead10" onclick="expandM(rotate10, months10)">OCTUBRE
                        <span class="material-symbols-outlined" id="rotate10">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-10" onclick="week1Expand(this, weekHead2_10, weekHead3_10, weekHead4_10)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Octubre' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-10" onclick="week2Expand(weekHead1_10, this, weekHead3_10, weekHead4_10)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Octubre' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-10" onclick="week3Expand(weekHead1_10, weekHead2_10, this, weekHead4_10)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Octubre' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-10" onclick="week4Expand(weekHead1_10, weekHead2_10, weekHead3_10, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Octubre' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- NOVIEMBRE -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Noviembre'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months11">
                <div class="month">
                    <div class="month-head" id="monthHead11" onclick="expandM(rotate11, months11)">NOVIEMBRE
                        <span class="material-symbols-outlined" id="rotate11">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-11" onclick="week1Expand(this, weekHead2_11, weekHead3_11, weekHead4_11)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Noviembre' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-11" onclick="week2Expand(weekHead1_11, this, weekHead3_11, weekHead4_11)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Noviembre' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-11" onclick="week3Expand(weekHead1_11, weekHead2_11, this, weekHead4_11)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Noviembre' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-11" onclick="week4Expand(weekHead1_11, weekHead2_11, weekHead3_11, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Noviembre' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            

            
            <!-- ================== -->
            <!-- DICIEMBRE -->
            <?php
                $getPost = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Diciembre'");
                if (mysqli_num_rows($getPost) > 0) {
            ?>
            <div class="months" id="months12">
                <div class="month">
                    <div class="month-head" id="monthHead12" onclick="expandM(rotate12, months12)">DICIEMBRE
                        <span class="material-symbols-outlined" id="rotate12">expand_more</span>
                    </div>
                    <div class="weeks" id="weeks">
                        <div class="week">
                            <div class="week-head" id="weekHead1-12" onclick="week1Expand(this, weekHead2_12, weekHead3_12, weekHead4_12)">SEMANA 1</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query1w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Diciembre' AND week = '1'");
                                if(mysqli_num_rows($query1w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query1w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="height: 35px; display:flex; flex-direction:column; justify-content:center; align-items: flex-start;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead2-12" onclick="week2Expand(weekHead1_12, this, weekHead3_12, weekHead4_12)">SEMANA 2</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query2w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Diciembre' AND week = '2'");
                                if(mysqli_num_rows($query2w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query2w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead3-12" onclick="week3Expand(weekHead1_12, weekHead2_12, this, weekHead4_12)">SEMANA 3</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query3w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Diciembre' AND week = '3'");
                                if(mysqli_num_rows($query3w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query3w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="week">
                            <div class="week-head" id="weekHead4-12" onclick="week4Expand(weekHead1_12, weekHead2_12, weekHead3_12, this)">SEMANA 4</div>
                            <div class="posts-container" id="postsContainer">
                                <?php
                                $query4w = mysqli_query($con, "SELECT * FROM post WHERE code = '$code' AND month_p = 'Diciembre' AND week = '4'");
                                if(mysqli_num_rows($query4w) == 0) {
                                    echo "<div style='width:100%;'><h2 style='text-align:center;'>No hay post asignados para esta semana.</h2></div>";
                                } else {
                                while ($posts = mysqli_fetch_array($query4w)) { ?>
                                <div class="post">
                                    <div style="--bg:gray">
                                        <img src="data:image/*;base64,<?php echo base64_encode($posts['post']); ?>" alt="">
                                    </div>
                                    <div>
                                        <span style="display:flex; flex-direction:row; justify-content:space-between;">
                                            <span>Estatus:</span>
                                            <span style="color:<?php
                                                switch ($posts['estatus']) {
                                                    case 'EN ESPERA':
                                                        $posts['estatus'] = "REVISAR";
                                                        echo "#fd9825";
                                                        break;
                                                    
                                                    case 'REVISAR':
                                                        $posts['estatus'] = "ACTUALIZANDO";
                                                        echo "var(--primary)";
                                                        break;
                                                    
                                                    case 'ACEPTADO':
                                                        echo "#29c729";
                                                        break;
                                                    
                                                    default:
                                                        break;
                                                } ?>; " > <?php echo $posts['estatus'];?>
                                            </span>
                                        </span>
                                        <a href="post-edit.php?id=<?php echo $posts['id']; ?>&code=<?php echo $posts['code']; ?>" style="display:flex; text-align:center; justify-content:space-evenly;"><span class="material-symbols-outlined">edit</span>Editar post</a>
                                        <div style="display: flex; width: 100%; flex-direction: row; justify-content: center; align-items:center; font-size: 1.3em;">
                                            <?php
                                                viewNets($posts);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
            <!-- ================== -->
            
        </div>
    
        <script>
            let monthHead = document.getElementById("monthHead");
            let months = document.getElementById("months");
            let rotate = document.getElementById("rotate");
            
            let monthHead1 = document.getElementById("monthHead1");
            let months1 = document.getElementById("months1");
            let rotate1 = document.getElementById("rotate1");
            let weekHead1_1 = document.getElementById("weekHead1-1");
            let weekHead2_1 = document.getElementById("weekHead2-1");
            let weekHead3_1 = document.getElementById("weekHead3-1");
            let weekHead4_1 = document.getElementById("weekHead4-1");

            let monthHead2 = document.getElementById("monthHead2");
            let months2 = document.getElementById("months2");
            let rotate2 = document.getElementById("rotate2");
            let weekHead1_2 = document.getElementById("weekHead1-2");
            let weekHead2_2 = document.getElementById("weekHead2-2");
            let weekHead3_2 = document.getElementById("weekHead3-2");
            let weekHead4_2 = document.getElementById("weekHead4-2");

            let monthHead3 = document.getElementById("monthHead3");
            let months3 = document.getElementById("months3");
            let rotate3 = document.getElementById("rotate3");
            let weekHead1_3 = document.getElementById("weekHead1-3");
            let weekHead2_3 = document.getElementById("weekHead2-3");
            let weekHead3_3 = document.getElementById("weekHead3-3");
            let weekHead4_3 = document.getElementById("weekHead4-3");

            let monthHead4 = document.getElementById("monthHead4");
            let months4 = document.getElementById("months4");
            let rotate4 = document.getElementById("rotate4");
            let weekHead1_4 = document.getElementById("weekHead1-4");
            let weekHead2_4 = document.getElementById("weekHead2-4");
            let weekHead3_4 = document.getElementById("weekHead3-4");
            let weekHead4_4 = document.getElementById("weekHead4-4");

            let monthHead5 = document.getElementById("monthHead5");
            let months5 = document.getElementById("months5");
            let rotate5 = document.getElementById("rotate5");
            let weekHead1_5 = document.getElementById("weekHead1-5");
            let weekHead2_5 = document.getElementById("weekHead2-5");
            let weekHead3_5 = document.getElementById("weekHead3-5");
            let weekHead4_5 = document.getElementById("weekHead4-5");

            let monthHead6 = document.getElementById("monthHead6");
            let months6 = document.getElementById("months6");
            let rotate6 = document.getElementById("rotate6");
            let weekHead1_6 = document.getElementById("weekHead1-6");
            let weekHead2_6 = document.getElementById("weekHead2-6");
            let weekHead3_6 = document.getElementById("weekHead3-6");
            let weekHead4_6 = document.getElementById("weekHead4-6");

            let monthHead7 = document.getElementById("monthHead7");
            let months7 = document.getElementById("months7");
            let rotate7 = document.getElementById("rotate7");
            let weekHead1_7 = document.getElementById("weekHead1-7");
            let weekHead2_7 = document.getElementById("weekHead2-7");
            let weekHead3_7 = document.getElementById("weekHead3-7");
            let weekHead4_7 = document.getElementById("weekHead4-7");

            let monthHead8 = document.getElementById("monthHead8");
            let months8 = document.getElementById("months8");
            let rotate8 = document.getElementById("rotate8");
            let weekHead1_8 = document.getElementById("weekHead1-8");
            let weekHead2_8 = document.getElementById("weekHead2-8");
            let weekHead3_8 = document.getElementById("weekHead3-8");
            let weekHead4_8 = document.getElementById("weekHead4-8");

            let monthHead9 = document.getElementById("monthHead9");
            let months9 = document.getElementById("months9");
            let rotate9 = document.getElementById("rotate9");
            let weekHead1_9 = document.getElementById("weekHead1-9");
            let weekHead2_9 = document.getElementById("weekHead2-9");
            let weekHead3_9 = document.getElementById("weekHead3-9");
            let weekHead4_9 = document.getElementById("weekHead4-9");

            let monthHead10 = document.getElementById("monthHead10");
            let months10 = document.getElementById("months10");
            let rotate10 = document.getElementById("rotate10");
            let weekHead1_10 = document.getElementById("weekHead1-10");
            let weekHead2_10 = document.getElementById("weekHead2-10");
            let weekHead3_10 = document.getElementById("weekHead3-10");
            let weekHead4_10 = document.getElementById("weekHead4-10");

            let monthHead11 = document.getElementById("monthHead11");
            let months11 = document.getElementById("months11");
            let rotate11 = document.getElementById("rotate11");
            let weekHead1_11 = document.getElementById("weekHead1-11");
            let weekHead2_11 = document.getElementById("weekHead2-11");
            let weekHead3_11 = document.getElementById("weekHead3-11");
            let weekHead4_11 = document.getElementById("weekHead4-11");

            let monthHead12 = document.getElementById("monthHead12");
            let months12 = document.getElementById("months12");
            let rotate12 = document.getElementById("rotate12");
            let weekHead1_12 = document.getElementById("weekHead1-12");
            let weekHead2_12 = document.getElementById("weekHead2-12");
            let weekHead3_12 = document.getElementById("weekHead3-12");
            let weekHead4_12 = document.getElementById("weekHead4-12");
            
            function expandM(_rotate, _months) {
                _rotate.classList.toggle("rotate");
                _months.classList.toggle("expanded");
            }

            function week1Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead1.classList.contains("expanded")) {
                    _weekHead1.classList.remove("expanded");
                } else {
                    _weekHead1.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week2Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead2.classList.contains("expanded")) {
                    _weekHead2.classList.remove("expanded");
                } else {
                    _weekHead2.classList.add("expanded");
                }
                _weekHead1.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week3Expand(_weekHead1, _weekHead2, _weekHead3, _weekHead4) {
                if (_weekHead3.classList.contains("expanded")) {
                    _weekHead3.classList.remove("expanded");
                } else {
                    _weekHead3.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead1.classList.remove("expanded");
                _weekHead4.classList.remove("expanded");
            }
            
            function week4Expand(_weekHead1, _weekHead2, _weekHead3 ,_weekHead4) {
                if (_weekHead4.classList.contains("expanded")) {
                    _weekHead4.classList.remove("expanded");
                } else {
                    _weekHead4.classList.add("expanded");
                }
                _weekHead2.classList.remove("expanded");
                _weekHead3.classList.remove("expanded");
                _weekHead1.classList.remove("expanded");
            }
        </script>
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
<script src="calculoPlan.js"></script>
</html>