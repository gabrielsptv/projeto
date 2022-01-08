<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="../projetinho/image/logo.png" type="image/x-icon">

  <link rel="stylesheet" href="./css/telalogin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/main.css">

  <!-- Adicionando JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
  <!-- Adicionando Javascript -->
  
  <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
          
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
         
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>


  <title>Crm Bonus</title>
</head>

<body>
  <!---Header---->
  <div id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light justify-content-between">

        <a class="navbar-brand" href="#"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Consultar Bonus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./entrar.php">Entrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Solicitar Proposta</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!---//Header---->
  <!---//formulario-login---->

  <main class="log">              
      <h2>Cadastro</h2>
      <form method="POST" action="proc_cad.php">
          <div class="input-field">
              <input type="email" name="email" id="email"
              placeholder="E-mail">
              <div class="underline"></div>
          </div>
          <div class="input-field">
              <input type="password" name="senha" id="senha"
                  placeholder="Senha">
              <div class="underline"></div>
          </div>
            <br>
          <div class="input-field">
              <input type="number" name="telefone" id="telefone"
                  placeholder="Telefone">
              <div class="underline"></div>
          </div>
            <br>
          <div class="input-field">
              <input type="number" name="cep" id="cep" placeholder="CEP">
              <div class="underline" maxlength="9" onblur="pesquisacep(this.value);">
              </div>
          </div>
            <br>
          <div class="input-field">
              <input type="text" name="rua" id="rua"
                  placeholder="Rua">
              <div class="underline"></div>
          </div>
          <br>
          <div class="input-field">
              <input type="text" name="bairro" id="bairro"
                  placeholder="Bairro">
              <div class="underline"></div>
          </div>
          <br>
          <div class="input-field">
              <input type="text" name="cidade" id="cidade"
                  placeholder="Cidade">
              <div class="underline"></div>
          </div>
          <br>
          <div class="input-field">
              <input type="text" name="uf" id="uf"
                  placeholder="UF" size="2">
              <div class="underline"></div>
          </div>
          <input type="submit" value="Cadastrar">
          <p class="txt_form">Já possui conta?<a class="txt_form" href="entrar.php"> Entrar</a></p>
      </form>
      
       
  </main>

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
    
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <script src="./js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>