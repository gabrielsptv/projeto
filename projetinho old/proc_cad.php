<?php
	$id = "0";
	$email = $_POST['email'];                      
	$telefone = $_POST['telefone'];         
	$cep = $_POST['cep'];                  
	$rua = $_POST['rua'];                       
	$bairro = $_POST['bairro'];                  
	$cidade = $_POST['cidade'];                   
	$uf = $_POST['uf'];
	$sh = $_POST['senha']; 
	$bn = "";
	$servidor = "localhost";
	$usuario = "root";
	$senha = "1234";
	$dbname = "projetinho";
	
	
	
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	
	
$result_usuario = "INSERT INTO usuarios (id_usuario, EMAIL, TELEFONE, CEP, RUA, BAIRRO, CIDADE, ESTADO, SENHA, BONUS) VALUES('$id','$email','$telefone','$cep','$rua','$bairro','$cidade','$uf','$sh','$bn')";

$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: painel/index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cadastro.php");
}