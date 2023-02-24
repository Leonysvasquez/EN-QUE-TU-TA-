<?php
include("connection.php");
session_start();
$usermail = $_SESSION["usermail"];

if (!isset($usermail))
{
    header("Location: logout.php");
} else
{
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $token = "";

    for ($i=0; $i < 20; $i++) {
        $token .= $string[rand(0,61)];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../qr/qr.php" method="GET">
        <input type="text" id="token" value="<?php echo $token; ?>" name="token" style="opacity:0;">
        <input type="submit" id="btn" value="" hidden>
    </form>

<?php
}
?>

</body>
<script>
    let btn = document.querySelector("#btn");

    window.onload = function click() {
        btn.click();
        console.log('action hgbfgh clicked');
    }
</script>
</html>
