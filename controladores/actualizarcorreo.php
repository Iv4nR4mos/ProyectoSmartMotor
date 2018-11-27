<?php 
session_start();

$usuario = $_SESSION['usuario'];
$correo = $_REQUEST['correoCliente'];

include('../controladores/conexion.php');

$sql = "UPDATE clientes SET correo = '". $correo . "' WHERE usuario = '" . $usuario ."'";
$result = $conn->query($sql);

$script =  "<script type='text/javascript'>
				alert('No se pudo cambiar el correo');
			</script>";

$script2 =  "<script type='text/javascript'>
				alert('No se pudo cambiar el correo');
			</script>";

if (!$result) {
	header('Location: ../vista/configuracion.php');
	echo $script;
}else{
	header('Location: ../vista/configuracion.php');
	echo $script2;
}

 ?>