<?php
  require_once'CLASSES/usuarios.php';
  $u = new Usuario;
?>
<!Doctype html>
<html lang="pt-br">

<head>
  
  <title>CRM Bonus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="../projetinho/image/logo.png" type="image/x-icon">
  

</head>

<body>
  <main class="log">              
      <h2>Login</h2>
      <form method="POST">
          <div class="input-field">
              <input type="text" name="email" id="email"
              placeholder="E-mail">
              <div class="underline"></div>
          </div>
          <div class="input-field">
              <input type="password" name="senha" id="senha"
                  placeholder="Senha">
              <div class="underline"></div>
          </div>
          <input type="submit" value="Continuar">
          <a style="text-decoration: none; color:black; margin-top: 40px; ">Não possui uma conta?</br><br><a href="./cadastro.php" style="text-decoration: none;">Cadastre-se</a></a>
      </form>
      <div class="footer">
       </div>
       
  </main>

<?php
// aqui fazemos a verificação//
//o 127.0.0.1 é o endereço local do seu server, isso serve para todos os servidores, seria mais ou menos como um localhost //
//verifica se o cliente clicou no botao//
  if(isset($_POST['email'])){  
     $email = addslashes ($_POST['email']); // TA VENDO QUE AQUI ESTA MINUSCULO, ISSO PQ LÁ NO USUSARIO NÓS ATRIBUIMOS 
      $senha = addslashes ($_POST['senha']);
      //verifica se esta vazio
      if(!empty($email) && !empty($senha))
      {
          $u->conectar("projetinho", "localhost", "root", "1234");
          if($u->msgErro == "") 
          //se está vazio ok
          {
              if($u->logar($email,$senha))
              {
                  header("location: painel/index.php");
              }
        }
      else{
          
       echo "Erro:".$u->$msgErro; // esse cara ai server para passar um msg // que está dentro do class
      }
  }

  else{

  }
  
}
?>
</body>  
</html>