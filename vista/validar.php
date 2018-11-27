<?php 

include('../controladores/conexion.php');

try{
	$usuario = $_POST['nnombre'];
	$password = $_POST['npassword'];

	/*if(empty($usuario) || empty($password)){
		header("Location: index.php");
		exit();
	}*/

	$sql = "SELECT usuario, password FROM clientes WHERE usuario = '" . $usuario . "'";
	$result = $conn->query($sql);

	//$result = mysqli_query("SELECT * from usuarios where usuario='" . $usuario . "'");

	if($result->num_rows > 0){
		foreach ($result as $row) {
			$pass = $row['password'];
		}
			
		if(strcmp($pass, $password) == 0){
			session_start();

			$_SESSION['usuario'] = $usuario;

			header("Location: inicio.php");
		} else {
			session_destroy();
			echo 	"<div class='alert alert-danger' role='alert'>
						Usuario o Contraseña Incorrecta
					</div>";
			header("Location: index.php");
		}
		
	} else {
		session_destroy();
		echo 	"<div class='alert alert-danger' role='alert'>
						Usuario o Contraseña Incorrecta
					</div>";
		header("Location: index.php");
	}
} catch(Exception $e){
	throw $e;	
}

 ?>
