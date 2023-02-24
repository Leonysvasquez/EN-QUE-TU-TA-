<?php
include("../php/connection.php");
session_start();
$usermail = $_SESSION["usermail"];


// if(!isset($usermail))
// {
//     header("Location: ../php/logout.php");
// } else
// {
	$sql = "SELECT * FROM users WHERE email = '$usermail'";
	$query = mysqli_query($connection, $sql);

	$row = mysqli_fetch_array($query);
	$qrValue = "http://cloudcode.live/users-login.php?token=".$row['token'];
// }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
<script type="text/javascript" src="../html2canvas.js"></script>
<script type="text/javascript" src="../html2canvas.min.js"></script>
<link rel="stylesheet" href="../css/global.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/footer.css">
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/qr.css">
</head>
<body>

<header>
	<nav class="navbar">
		<div class="navbar-brand">
			<div class="navbar-brand-logo">
				<img src="../img/logocloudcode-W.svg" alt="">
			</div>
			<span class="navbar-brand-name"><a href="">CLOUDCODE</a></span>
		</div>
	</nav>
</header>
<br>
<div class="content">
	<div class="text">
		<h2>
			Este es su Código QR asignado
		</h2>
		<span>
			Puede descargarlo ahora,<br>pero siempre estará disponible en su perfil.
		</span>
	</div>
	<div class="codeContainer">
		<input id="text" type="text" value="<?php echo $qrValue; ?>" style="width:80%" /><button id="btnGetQR" onclick="makeCode()">Get QR</button><br />

		<div id="capture" style="">
			<div id="qrcode" style="width:300px; height:300px;"></div>
		</div>

		<div class="btns">
			<button onclick="downloadQR()">Descargar</button>
			<a class="button" href="../dashboard.php">Continuar</a>
		</div>
	</div>
</div>


<!-- FOOTER -->
<div class="footer-container">
	<footer>
		<span>© 2022 EPA MERCADEO & PUBLICIDAD - Todos los derechos reservados</span>
	</footer>
</div>


<script type="text/javascript">
	function downloadQR() {
		html2canvas(document.querySelector("#capture")).then(canvas => {
			var a = document.createElement('a');
			a.href = canvas.toDataURL('image/png');
			a.download = 'username.png';
			a.click();
			window.location.href = "../dashboard.php";
		});
	}

	var qrcode = new QRCode(document.getElementById("qrcode"), {
		width : 150,
		height : 150
	});

	function makeCode () {		
		var elText = document.getElementById("text");
		
		// if (!elText.value) {
		// 	alert("Input a text");
		// 	elText.focus();
		// 	return;
		// }
		
		qrcode.makeCode(elText.value);
	}

	makeCode();

	$("#text").
		on("blur", function () {
			makeCode();
		}).
		on("keydown", function (e) {
			if (e.keyCode == 13) {
				makeCode();
			}
		});
</script>
</body>