<?php
// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = filter_input(INPUT_POST, 'id_usuario');
    $email = filter_input(INPUT_POST, 'email');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $cep = filter_input(INPUT_POST, 'cep');
    $rua = filter_input(INPUT_POST, 'rua');
    $bairro = filter_input(INPUT_POST, 'bairro');
    $cidade = filter_input(INPUT_POST, 'cidade');
    $estado = filter_input(INPUT_POST, 'estado');
    $senha = filter_input(INPUT_POST, 'senha');
    $bonus = filter_input(INPUT_POST, 'bonus');
} else if (!isset($id_usuario)) {
// Se não se não foi setado nenhum valor para variável $id
    $id_usuario = (isset($_GET["id_usuario"]) && $_GET["id_usuario"] != null) ? $_GET["id_usuario"] : "";
}

// Cria a conexão com o banco de dados
try {
    $conexao = new PDO("mysql:host=localhost;dbname=projetinho", "root", "1234");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "<p class=\"bg-danger\">Erro na conexão:" . $erro->getMessage() . "</p>";
}

// Bloco If que Salva os dados no Banco - atua como Create e Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $email != "") {
    try {
        if ($id_usuario != "") {
            $stmt = $conexao->prepare("UPDATE usuarios SET EMAIL=?, TELEFONE=?,CEP=?, RUA=?, BAIRRO=?, CIDADE=?, ESTADO=?, SENHA=?, BONUS=? WHERE id_usuario = ?");
            $stmt->bindParam(10, $id_usuario);
        } else {
            $stmt = $conexao->prepare("INSERT INTO usuarios (EMAIL, TELEFONE, CEP, RUA, BAIRRO, CIDADE, ESTADO, SENHA, BONUS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        }
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $telefone);
        $stmt->bindParam(3, $cep);
        $stmt->bindParam(4, $rua);
        $stmt->bindParam(5, $bairro);
        $stmt->bindParam(6, $cidade);
        $stmt->bindParam(7, $estado);
        $stmt->bindParam(8, $senha);
        $stmt->bindParam(9, $bonus);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<p class=\"bg-success\">Dados cadastrados com sucesso!</p>";
                $id_usuario = null;
                $email = null;
                $telefone = null;
                $cep = null;
                $rua = null;
                $bairro = null;
                $cidade = null;
                $estado = null;
                $senha = null;
                $bonus = null;
            } else {
                echo "<p class=\"bg-danger\">Erro ao tentar efetivar cadastro</p>";
            }
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id_usuario != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id_usuario = $rs->id_usuario;
            $email = $rs->EMAIL;
            $telefone = $rs->TELEFONE;
            $cep = $rs->CEP;
            $rua = $rs->RUA;
            $bairro = $rs->BAIRRO;
            $cidade = $rs->CIDADE;
            $estado = $rs->ESTADO;
            $senha = $rs->SENHA;
            $bonus = $rs->BONUS;
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
    }
}

// Bloco if utilizado pela etapa Delete
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id_usuario != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "<p class=\"bg-success\">Registo foi excluído com êxito</p>";
            $id_usuario = null;
        } else {
            echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
        }
    } catch (PDOException $erro) {
        echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</a>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" >
        <title>Painel</title>
        <link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="assets/js/bootstrap.js" type="text/javascript" ></script>
    </head>
    <body>
        <div class="container">
            <header class="row">
                <br />
            </header>
            <article>
                <div class="row">
                    <form action="?act=save" method="POST" name="form1" class="form-horizontal" >
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="panel-title">Contato</span>
                            </div>
                            <div class="panel-body">

                                <input type="hidden" name="id_usuario" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id_usuario) && ($id_usuario != null || $id_usuario != "")) ? $id_usuario : '';
                                ?>" />
                                <div class="form-group">
                                    <label for="email" class="col-sm-1 control-label">Email:</label>
                                    <div class="col-md-5">
                                        <input type="email" name="email" value="<?php
                                        // Preenche o nome no campo email com um valor "value"
                                        echo (isset($email) && ($email != null || $email != "")) ? $email : '';

                                        ?>" class="form-control"/>
                                    </div>
                                    <label for="telefone" class="col-sm-1 control-label">Telefone:</label>
                                    <div class="col-md-4">
                                        <input type="tel" name="telefone" value="<?php
                                        // Preenche o servico no campo contato com um valor "value"
                                        echo (isset($telefone) && ($telefone != null || $telefone != "")) ? $telefone : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cep" class="col-sm-1 control-label">CEP:</label>
                                    <div class="col-md-4">
                                        <input type="number" name="cep" value="<?php
                                        // Preenche o email no campo contato com um valor "value"
                                        echo (isset($cep) && ($cep != null || $cep != "")) ? $cep : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="rua" class="col-sm-2 control-label">Rua:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="rua" value="<?php
                                        // Preenche o email no campo funcao com um valor "value"
                                        echo (isset($rua) && ($rua != null || $rua != "")) ? $rua : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bairro" class="col-sm-1 control-label">Bairro:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="bairro" value="<?php
                                        // Preenche o celular no campo email com um valor "value"

                                        echo (isset($bairro) && ($bairro != null || $bairro != "")) ? $bairro : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="cidade" class="col-sm-2 control-label">Cidade:</label>
                                    <div class="col-md-2">
                                        <input type="text" name="cidade" value="<?php
                                        // Preenche o celular no campo telefone com um valor "value"
                                        echo (isset($cidade) && ($cidade != null || $cidade != "")) ? $cidade : '';

                                        ?>" class="form-control" />
                                    </div>
                                    <label for="estado" class="col-sm-1 control-label">Estado:</label>
                                    <div class="col-md-1">
                                        <input type="text" name="estado" value="<?php
                                        // Preenche o celular no campo ramal com um valor "value"
                                        echo (isset($estado) && ($estado != null || $estado != "")) ? $estado : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="senha" class="col-sm-1 control-label">Senha:</label>
                                    <div class="col-md-2">
                                        <input type="password" name="senha" <?php
                                        // Preenche o celular no campo celular 1 com um valor "value"
                                        echo (isset($senha) && ($senha != null || $senha != "")) ? $senha : '';

                                        ?> class="form-control" />
                                    </div>
                                    <label for="bonus" class="col-sm-4 control-label">Bonus:</label>
                                    <div class="col-md-2">
                                        <input type="text" name="bonus" value="<?php
                                        // Preenche o celular no campo celular 2 com um valor "value"
                                        echo (isset($bonus) && ($bonus != null || $bonus != "")) ? $bonus : '';

                                        ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" /><span class="glyphicon glyphicon-ok"></span> salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>CEP</th>
                                    <th>Rua</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>Estado</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /**
                                 *  Bloco que realiza o papel do Read - recupera os dados e apresenta na tela
                                 */
                                try {
                                    $stmt = $conexao->prepare("SELECT * FROM usuarios");
                                    if ($stmt->execute()) {
                                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {

                                            ?><tr>
                                                <td><?php echo $rs->EMAIL; ?></td>
                                                <td><?php echo $rs->TELEFONE; ?></td>
                                                <td><?php echo $rs->CEP; ?></td>
                                                <td><?php echo $rs->RUA; ?></td>
                                                <td><?php echo $rs->BAIRRO; ?></td>
                                                <td><?php echo $rs->CIDADE; ?></td>
                                                <td><?php echo $rs->ESTADO; ?></td>
                                                <td><center>
                                            <a href="?act=upd&id_usuario=<?php echo $rs->id_usuario; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                            <a href="/dev/projeto/projetinho/painel/users.php?act=del&id_usuario=<?php echo $rs->id_usuario; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span> Excluir</a>
                                        </center>
                                        </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                                }
                            } catch (PDOException $erro) {
                                echo "Erro: " . $erro->getMessage();
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </body>
</html>
