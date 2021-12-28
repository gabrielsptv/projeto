<?php

include("./conexao.php");
Class usuario
{ 
	private $pdo;
	public $msgErro = ""; //tudo ok



	public function conectar($nome, $host, $usuario, $senha)
		{
			global $pdo;
			global $msgErro;
			try 
			{
				$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario,$senha);
			} 
			catch (PDOException $e)
			{
				$msgErro = $e->getMessage();
			}
		}


	public function logar($email, $senha)
	{
		global $pdo;
		//verifica se o cliente está cadastrado no db
		$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE EMAIL = :e AND SENHA = :s");    
		$sql->bindValue(":e",$email); 
		$sql->bindValue(":s",$senha);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			return true; //logado com sucesso
		}
		else
		{
			return false; //nao foi possivel logar
		}

	}


} 

?>