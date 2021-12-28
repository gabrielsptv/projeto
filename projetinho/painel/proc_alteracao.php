<?php
	$email = $_POST['email'];
	$sh = $_POST['sh'];
	$servidor = "localhost";
	$usuario = "root";
	$senha = "1234";
	$dbname = "projetinho";
	

	
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	
	
	$result_usuario = "UPDATE usuarios SET  EMAIL = '$email', SENHA = '$sh' WHERE id_usuario = 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
    header("Location: index.php");
?>