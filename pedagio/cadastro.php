<?php

use Pedagio\Conexao;
use Pedagio\Teste;
use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Cadastro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap" rel="stylesheet">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="alert/dist/sweetalert-dev.js"></script>
</head>

<body style="background-color:whitesmoke;">

    <h2 id="tituloMain" style="text-align: center; color: lightgreen; text-shadow: 2px 2px 3px black;">CADASTRO</h2>
    <form action="" method="post">

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">Nome</label>
            <input type="texte" class="form-control" name="nome" id="nome">
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data" value="today">
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">Valor</label>
            <input type="number" class="form-control" id="valor" name="valor">
        </div>

        <button type="submit" name="" id="Submit" value="Submit" class="btn btn-success p-2 m-4">Enviar</button>

    </form>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-info" style="color: white;" onclick="window.location.href='index.php'">VOLTAR</button>
    </div>


</body>

<script src="main.js"></script>

<?php

if (empty($_POST['nome'])) {
    die;
}
if (empty($_POST['data'])) {
    die;
}

if (empty($_POST['valor'])) {
    die;
}


if (empty($_GET["dado"])) {

    $nome = $_POST['nome'];

    $data = $_POST['data'];

    $valor = $_POST['valor'];

    $teste = new Teste();
    $teste->setNome($nome);
    $teste->setData(new DateTime($data));
    $teste->setValor($valor);
    $testeDAO->inserir($teste);
    header('Location: index.php?alert=1');
?>
<?php
} else {
    $id = $_GET["dado"];

    $dados = $testeDAO->buscarId($id);

    $nome = $_POST['nome'];

    $data = $_POST['data'];

    $valor = $_POST['valor'];

    $teste = new Teste();
    $teste->setNome($nome);
    $teste->setData(new DateTime($data));
    $teste->setValor($valor);
    $teste->setId($id);
    $testeDAO->atualizar($teste);
    header('Location: index.php?alert=2');
}

?>

</html>