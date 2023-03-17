<?php
include("php/con.php");

$email = $_REQUEST['client'];

$getData = mysqli_query($con, "SELECT * FROM clientPlan WHERE plan_email = '$email'");
$plan = mysqli_fetch_array($getData);

$postValue = (548.75*4);

    $subTotal = (
        ($plan['plan_facebook']*$postValue)+
        ($plan['plan_instagram']*$postValue)+
        ($plan['plan_google']*$postValue)+
        ($plan['plan_youtube']*$postValue)+
        ($plan['plan_tiktok']*$postValue)+
        ($plan['plan_twitter']*$postValue)+
        ($plan['plan_linkedin']*$postValue)+
        ($plan['plan_snapchat']*$postValue)+
        ($postValue*($plan['plan_historia']*$plan['plan_historia_redes']))+
        ($postValue*($plan['plan_reel']*$plan['plan_historia_redes']))
    );

    $pDescuento = 0.0;
    $pAumento = 0.0;

    switch ($plan['plan_contrato']) {
        case 6:
            $pDescuento = 0.03;
            if ($plan['plan_contenido'] == 1) {
                $pAumento = 0.12;
            } else {
                $pAumento = 0.0;
            }
            break;
        
        case 12:
            $pDescuento = 0.06;
            if ($plan['plan_contenido'] == 1) {
                $pAumento = 0.09;
            } else {
                $pAumento = 0.0;
            }
            break;
        
        case 18:
            $pDescuento = 0.09;
            $descuento = ($subTotal*$pDescuento);
            if ($plan['plan_contenido'] == 1) {
                $pAumento = 0.06;
            } else {
                $pAumento = 0.0;
            }
            break;
        
        case 24:
            $pDescuento = 0.12;
            if ($plan['plan_contenido'] == 1) {
                $pAumento = 0.03;
            } else {
                $pAumento = 0.0;
            }
            break;
        
        default:
            $pDescuento = 0.0;
            if ($plan['plan_contenido'] == 1) {
                $pAumento = 0.15;
            } else {
                $pAumento = 0.0;
            }
            break;

    }


    $descuento = ($subTotal*$pDescuento);
    $aumento = ($subTotal*$pAumento);

$total = (($subTotal-$descuento)+$aumento)*4;
;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA PLAN</title>    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    
    
<style>
    h3 {
        text-align: center;
        margin: 60px 0;
    }
    .factura {
        width: 850px;
        height: auto;
        min-height: 1100px;
        top: 80px;
        box-shadow: 0 0 2px #555;
        position: relative;
    }
    .factura .container {
        padding: 40px;
        width: 100%;
        height: inherit;
        min-height: inherit;
    }

    .factura .container .top-factura > div {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .factura .container .top-factura > div div {
        text-align: right;
    }
    .factura .container .top-factura > div div p {
        padding: 2.5px 0;
        font-style: italic;
    }
    .factura .container .detalles-factura {
        width: 100%;
        height: auto;
    }
    .factura .container .detalles-factura table {
        width: 100%;
        height: 100%;
        text-align: center;
    }
    .factura .container .detalles-factura table tr td:first-child,
    .factura .container .detalles-factura table tr.total th:first-child {
        text-align: left;
    }
    .factura .container .detalles-factura table tr th,
    .factura .container .detalles-factura table tr td {
        border-right: 1px solid #ccc;
        padding: 10px 15px;
    }
    .factura .container .detalles-factura table tr th:last-child,
    .factura .container .detalles-factura table tr td:last-child {
        border-right: none;
    }
    
    .factura .container .detalles-factura table thead tr:first-child th {
        border-bottom: 2px solid #000;
        border-top: 2px solid #000;
    }
    .factura .container .detalles-factura table tr.total th {
        border-bottom: none;
        border-top: 3px solid #000;
        border-right: none;
        font-size: 1.3em;
    }


    .factura  .container .conditions {
        position:absolute;
        bottom: 20px;
        height: fit-content;
        font-weight: 100;
        width: 100%;
        left: 0;
    }
    .factura  .container .conditions h6 {
        font-weight: 400;
        text-align: center;
    }


#reload {
    position: absolute;
    top: 10px;
    left: 30px;
    text-decoration: none;
    color: var(--primary);
    font-size: 1.1em;
    font-weight: 500;
    background: var(--white);
    padding: 9px 15px;
    white-space: nowrap;
}
#reload::before {
    content: "";
    position: absolute;
    left: -14px;
    top: 6px;
    width: 26px;
    height: 26px;
    background: var(--white);
    z-index: -1;
    transform: rotate(45deg);
}
</style>
</head>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<body>

    
    <header>
        <a href="index.php" id="reload">Volver atrás</a>
    </header>

    <section class="factura">
        <div class="container">
            <div class="top-factura">
                <div>
                    <h1>CLOUD ENTERPRISES</h1>
                    <div>
                        <p><?php echo date("d/m/Y"); ?></p>
                        <p>Calle Hermanas Bosch Gaviño. 53</p>
                        <p>La Feria, Distrito Nacional, Sto. Dgo.</p>
                        <p>+1 (829) 245 - 3271</p>
                    </div>
                </div>
            </div>
            <h3>FACTURA / DETALLES DEL PLAN</h3>
            <div class="detalles-factura">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio x Unidad</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Posteo Facebook</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_facebook']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_facebook']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo Instagram</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_instagram']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_instagram']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo Google</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_google']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_google']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo Youtube</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_youtube']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_youtube']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo TikTok</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_tiktok']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_tiktok']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo Twitter</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_twitter']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_twitter']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo LinkedIn</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_linkedin']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_linkedin']); ?></td>
                        </tr>
                        <tr>
                            <td>Posteo Snapchat</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_snapchat']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_snapchat']); ?></td>
                        </tr>
                        <tr>
                            <td>Historias (Stories)</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_historia']; ?></td>
                            <td><?php echo ($postValue*$plan['plan_historia']); ?></td>
                        </tr>
                        <tr>
                            <td>Reels</td>
                            <td><?php echo $postValue; ?></td>
                            <td><?php echo $plan['plan_reel']; ?></td>
                            <td><?php echo ($postValue*($plan['plan_reel']*$plan['plan_reel_redes'])); ?></td>
                        </tr>
                        <tr>
                            <td>Contenido entregado por el cliente</td>
                            <td>0</td>
                            <td><?php
                                if ($plan['plan_contenido'] == '1') {
                                    echo 0;
                                }else {
                                    echo 1;
                                }
                                ?></td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>Contenido suplido por la empresa</td>
                            <td><?php echo $aumento ?></td>
                            <td><?php
                                if ($plan['plan_contenido'] == '1') {
                                    echo $plan['plan_contenido'];
                                } else {
                                    echo 0;
                                }
                                ?></td>
                            <td><?php
                                if ($plan['plan_contenido'] == '1') {
                                    echo $aumento;
                                } else {
                                    echo 0;
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Contrato <?php echo $plan['plan_contrato']; ?> meses</td>
                            <td><?php echo "-".$descuento ?></td>
                            <td>1</td>
                            <td><?php echo "-".$descuento ?></td>
                        </tr>
                        <tr class="total">
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th>RD$ <?php echo $plan['plan_costo']; ?></th>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="conditions"><h6>El monto total contemplado en esta factura/detalle está sujeto a ser pagado por el cliente cada mes hasta el día de conclusión del contrato.</span></div>
        </div>
    </section>
</body>
</html>