<?php
// Conectamos a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "basededatos";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtenemos los datos del formulario
$nombre_cliente=["nombre-cliente"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];

// Insertamos los datos en la base de datos
$sql = "INSERT INTO productos (nombre, tipo, precio, categoria, stock) VALUES ('$nombre', '$tipo', '$precio', '$categoria', '$stock')";
if ($conn->query($sql) === TRUE) {
    echo "Producto guardado exitosamente";
} else {
    echo "Error al guardar el producto: " . $conn->error;
}

$conn->close();
?>
