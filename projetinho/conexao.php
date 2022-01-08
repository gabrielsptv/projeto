<?php

$servidor="localhost";
$usuario="root";
$senha="1234";
$dbname="projetinho";

$conexao=mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conexao){
    echo "Erro";
    die();
}
?> 



