<?php
// Se utiliza para llamar al archivo que contine la conexion a la base de datos
require 'conexion.php';

// Validamos que el formulario y que el boton login haya sido presionado
if(isset($_POST['login'])) {

// Obtener los valores enviados por el formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rango = $_POST['id_cargo'];

// Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contrasena = '$contrasena'";
$resultado = mysqli_query($conexion,$sql);
$numero_registros = mysqli_num_rows($resultado);

$sql1 = "SELECT * FROM usuarios WHERE id_cargo = '$rango'";
$result = mysqli_query($conexion,$sql1);
$numero_rango = mysqli_num_rows($result);

	if($numero_registros != 0) {
		// Inicio de sesión exitoso
		echo "Inicio de sesión exitoso. Bienvenido, " . $usuario . "!";
		
		if($numero_rango == 1) {
			echo"Usuario con rol de Administrador";
		}else if($numero_rango == 2) {
			echo"Usuario con rol de Cliente";
		}

	} else {
		// Credenciales inválidas
		echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña."."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>

