<?php
include("con.php");
$planEmail = $_REQUEST['mail'];

if (isset($_POST["savePlan"])) {
    $planFacebook = $_POST["cantPostFacebook"];
    $planInstagram = $_POST["cantPostInstagram"];
    $planGoogle = $_POST["cantPostGoogle"];
    $planYoutube = $_POST["cantPostYoutube"];
    $planTiktok = $_POST["cantPostTiktok"];
    $planTwitter = $_POST["cantPostTwitter"];
    $planLinkedin = $_POST["cantPostLinkedin"];
    $planSnapchat = $_POST["cantPostSnapchat"];

    $planHistoria = $_POST["cantPostHistoria"];
    $planHistoriaRedes = $_POST["redesHistoria"];
    if ($planHistoria == 0 || $planHistoria == NULL) {
        $planHistoriaRedes = 0;
    }

    $planReel = $_POST["cantPostReel"];
    $planReelRedes = $_POST["redesReel"];
    if ($planReel == 0 || $planReel == NULL) {
        $planReelRedes = 0;
    }

    $planContenido = $_POST["contenidoEntregado"];

    $tiempoContrato = $_POST["tiempoContrato"];
    $costoTotal = $_POST["totalCost"];

    $verifyClient = mysqli_query($con, "SELECT * FROM clientPlan WHERE plan_email = '$planEmail'");
    $verifyClientArray = mysqli_num_rows($verifyClient);
    if ($verifyClientArray > 0) {
        $planConfig = "UPDATE clientPlan SET
            plan_facebook = $planFacebook,
            plan_instagram = $planInstagram,
            plan_google = $planGoogle,
            plan_youtube = $planYoutube,
            plan_tiktok = $planTiktok,
            plan_twitter = $planTwitter,
            plan_linkedin = $planLinkedin,
            plan_snapchat = $planSnapchat,
            plan_historia = $planHistoria,
            plan_historia_redes = $planHistoriaRedes,
            plan_reel = $planReel,
            plan_reel_redes = $planReelRedes,
            plan_contenido = $planContenido,
            plan_contrato = $tiempoContrato,
            plan_costo = $costoTotal,
            plan_edit = 0 WHERE plan_email = '$planEmail'";

            $planMessage =  "<script>alert('Plan ACTUALIZADO correctamente.');</script>";
    }
    else {
        $planConfig = "INSERT INTO 
        clientPlan(
            plan_email, 
            plan_facebook, 
            plan_instagram, 
            plan_google, 
            plan_youtube, 
            plan_tiktok, 
            plan_twitter, 
            plan_linkedin, 
            plan_snapchat, 
            plan_historia, 
            plan_historia_redes, 
            plan_reel, 
            plan_reel_redes, 
            plan_contenido, 
            plan_contrato, 
            plan_costo, 
            plan_edit) 
        VALUES (
            '$planEmail', 
            $planFacebook , 
            $planInstagram, 
            $planGoogle, 
            $planYoutube, 
            $planTiktok, 
            $planTwitter, 
            $planLinkedin, 
            $planSnapchat, 
            $planHistoria, 
            $planHistoriaRedes, 
            $planReel, 
            $planReelRedes, 
            $planContenido, 
            $tiempoContrato, 
            $costoTotal, 
            0)";

            $planMessage =  "<script>alert('Plan de posteo CONFIGURADO correctamente.');</script>";
    }

    $savePlanConfig = mysqli_query($con, $planConfig);

    if ($savePlanConfig) {
        echo $planMessage;
        header("Location:../index.php");
    } else {
        echo "<script>alert('No.');</script>";
        echo "<script>alert('".mysqli_error()."');</script>";
    }


}

?>