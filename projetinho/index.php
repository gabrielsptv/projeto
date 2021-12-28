<!doctype html>
<html lang="pt-br">

<head>
  <title>Crm Bonus</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="icon" href="../projetinho/image/logo.png" type="image/x-icon">

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
              <a class="nav-link" href="#passo">Solicitar Proposta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./entrar.php">Entrar</a>
            </li>

          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!---//Header---->
  <!---//main---->
  <div id="slider" class="block">
    <div class="container pt-5">
      <div class="row pt-5">
        <div class="col-lg-6 align-self-center md-0 md-4">
        
          <h5 class="primeira">PRIMEIRA E ÚNICA PLATAFORMA FULL SERVICE DE GIFTBACK DO MUNDO.</h5>
          <h7 class="segunda">Um software completo de CRM em cashback, sem setup, e com garantia de aumentar
            suas vendas de 5% a 20% em até 3 meses, ou seu investimento de volta.</h7>
          <br>

          <a href="" class="btn btn-primary button d-md-inline-block d-block mb-md-0 md-2 mr-md-2 ">Saiba mais</a>

          <a href="" class="btn btn-outline-primary button d-md-inline-block d-block mb-md-0 md-2 mr-md-2">Contato</a>
        </div>
        <div class="col-lg-6 align-self-center">
          
          <img src="./imagem/group-45.png" class="img-fluid" />
        </div>
      </div>
    </div>
  </div> 
  <div class="carde">
        <div class="card ">
          <p class="title-head">+500</p>
          <span class="sub-title-head">marcas</span>
        </div>
        <div class="card">
          <p class="title-head">+10000</p>
          <span class="sub-title-head">pontos de venda</span>
        </div>
        <div class="card">
          <p class="title-head">+20M</p>
          <span class="sub-title-head">pessoas bonificadas</span>
        </div>
        </div>
  <!---//main---->
  <!---//Sobre---->
  <div id="sobre" class="block">
    <div class="container">
      <div class="row ">
        <div class="col-md-6 text-center align-self-center pt-5 order-md-1 order-2">
          <img src="./imagem/2 - Copia.jpg" class="img-fluid" />
        </div>
        <div class="col-md-6 align-self-center mb-0 mb-4 order-md-2 order-1">
          <h5 class="primeira">SOMOS A MAIOR PLATAFORMA DE GIFTBACK DO BRASIL</h5>
          <h7 class="segunda"> A CADA SEGUNDO, 10 BÔNUS
            SÃO ENVIADOS VIA CRM&BONUS.</h7>
        </div>
      </div>
    </div>
  </div>
  <!---//Sobre---->
  <!---//sub---->
  <div class="col-md-12  text-center">
    <div class="step-1">
      <p>O CRM&amp;Bonus é uma plataforma que tem por objetivo aumentar a venda de suas lojas em até 20% (em menos de 4
        meses) com desconto efetivo inferior a 2%.</p>
    </div>
  </div>

  <!---//sub---->
  <!---//final---->
  <div id="servicos" class="block">
    <div class="container">
      <h3 class="primeira text-center">ONDE ESTAMOS</h3>
      <h3 class="segunda text-center md-4">PAÍSES ONDE ATUAMOS</h7 3>
        <div class="row pt-5">
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <div class="img-container mb-3 text-center ">
              <img src="./imagem/mapa-mundi.svg">
            </div>
          </div>
        </div>
    </div>
  </div>
  <!--final-->
  <!--formulario-->
  <div id="servicos">                                                             
        <div class="teste">
          <div class="primeira">PRONTO PARA COMEÇAR?</div>

          <h5>PREENCHA O FORMULÁRIO E SOLICITE UM TESTE GRÁTIS</h5>

          <h3>Passo<span id="passo"></span></h3><br><br>
          
          <form method="post" action="proc_cad.php">

            <label>Nome Completo
            <input name="nome" type="text" size="40" id="nome" class="form-control">
            </label><br>  

            <label>Telefone
            <input name="telefone" type="text" size="40" id="telefone" class="form-control">
            </label><br>    

            <label>Cep
            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" class="form-control" onblur="pesquisacep(this.value);">
            </label><br>   

            <label>Rua
            <input name="rua" type="text" id="rua" size="60" class="form-control">
            </label><br>  

            <label>Bairro
            <input name="bairro" type="text" id="bairro" size="40" class="form-control">
            </label><br>   

            <label>Cidade
            <input name="cidade" type="text" id="cidade" size="40" class="form-control">
            </label><br>

            <label>Estado
            <input name="uf" type="text" id="uf" size="2" class="form-control">
            </label><br>   

            <input type="submit" name="submit" id="submit" value="Enviar Formulario " class="form-control">

          </form>
        </div>      
  </div>
  <!---//formulario---->
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