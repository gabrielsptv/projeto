<?php  
  session_start();
  if(!isset($_SESSION['id_usuario']))
  {
    header("location: index.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>CRM BONUS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/styleix.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
  <header class="top"><a style="background-color:rgba(255, 255, 255, 0); float:right; width: 0px; height: 0px; margin-top:0px;" href="index.php?p=alteracao"><img style="width: 55px; float: right; margin-top:-5px; " src="../image/face28.png"></a></header>
  <input type="checkbox" id="chec">
  <label for="chec">
  <img  style="width: 30px; height: 30px;" src="../image/menu.svg">
  </label>
<nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="./index.php?p=clientes"><i class="fas fa-user-friends"></i> Clientes</a></li>
      <li><a href="./index.php?p=bonus"><i class="fas fa-hand-holding-usd"></i> Bonus</a></li>
      <li><a href="sair.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
    </ul>
</nav>


<?php
$valor = @$_GET['p'];       
if ($valor == 'clientes') {require_once 'clientes.php';}
if ($valor == 'bonus') {require_once 'users.php';}
if ($valor == 'alteracao') {require_once 'alteracao.php';}{  
    $id = $_GET['id'];
    
}

if ($valor == '') {require_once 'panel.php';}

?>

</body>
</html>