<?php 
session_start();

$usuario = $_SESSION['usuario'];
$pass_actual = $_REQUEST['passActual'];
$pass_nueva = $_REQUEST['passNueva'];

include('../controladores/conexion.php');

$sql = "UPDATE clientes SET password = '". $pass_nueva . "' WHERE usuario = '" . $usuario ."' AND password = '" . $pass_actual . "'";
$result = $conn->query($sql);

$script =  "<script type='text/javascript'>
				alert('Contraseña Incorrecta');
			</script>";

if (!$result) {
	header('Location: ../vista/configuracion.php');
	echo $script;
}else{
	header('Location: ../vista');
}

 ?>
