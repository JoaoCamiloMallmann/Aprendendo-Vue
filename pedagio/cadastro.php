<?php

date_default_timezone_set('America/Sao_Paulo');

use Pedagio\Conexao;
use Pedagio\Teste;
use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();
$hoje = time();
$dataHoje = date('Y-m-d H:i:s', $hoje);

if (isset($_GET["dado"])) {
    $resultado = $testeDAO->buscarId($_GET["dado"]);
}

require_once 'inc\header.php';

?>


<body style="background-color:whitesmoke;">

    <h2 id="tituloMain" style="text-align: center; color: lightgreen; text-shadow: 2px 2px 5px black;">CADASTRO</h2>
    <form action="" method="post">

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">Nome</label>
            <input type="texte" class="form-control" name="nome" id="nome" placeholder="Nome Completo" <?php if (isset($resultado)) echo "value='" . $resultado->getNome() . "'" ?>>
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data" value="<?php ?>">
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">Valor</label>
            <input type="number" class="form-control" id="valor" name="valor" placeholder="R$ 0000" <?php if (isset($resultado)) echo "value='" . $resultado->getValor() . "'" ?>>
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">CPF</label>
            <input type='text' id='cpfInput' placeholder='000.000.000-00' oninput='cpfChange(this.value)' class="form-control" name="cpf" <?php if (isset($resultado)) echo "value='" . $resultado->getCpf() . "'" ?>>
        </div>

        <div class="mb-3 m-4">
            <label class="form-label" style="font-weight: bold;">Numero De Telefone</label>
            <input type="text" class="form-control telefone" id="valor" name="telefone" placeholder="(00) 00000-0000" <?php if (isset($resultado)) echo "value='" . $resultado->getNumeroDeTelefone() . "'" ?>>
        </div>


        <button type="submit" name="" id="Submit" value="Submit" class="btn btn-success p-2 m-4">Enviar</button>

    </form>

    <div class="d-flex justify-content-center m-3">
        <button type="button" class="btn btn-info" style="color: white;" onclick="window.location.href='index.php'">VOLTAR</button>
    </div>


</body>

<script src="Javascript/atualizaCadastro.js"></script>
<script src="Javascript/cpfFormat.js"></script>
<script src="Javascript/telefoneFormat.js"></script>

<?php

if (empty($_POST['nome'])) {
    die;
}
if (empty($_POST['data'])) {
    die;
}

if (empty($_POST['cpf'])) {
    die;
}

if (empty($_POST['valor'])) {
    die;
}

if (empty($_POST['telefone'])) {
    die;
}

if (empty($_GET["dado"])) {

    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];


    $teste = new Teste();
    $teste->setNome($nome);
    $teste->setData(new DateTime($data));
    $teste->setValor($valor);
    $teste->setCpf($cpf);
    $teste->setNumeroDeTelefone($telefone);
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
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];


    $teste = new Teste();
    $teste->setNome($nome);
    $teste->setData(new DateTime($data));
    $teste->setValor($valor);
    $teste->setCpf($cpf);
    $teste->setId($id);
    $teste->setNumeroDeTelefone($telefone);
    var_dump($teste);
    $testeDAO->atualizar($teste);
    header('Location: index.php?alert=2');
}

?>
<script src="inc\Bootstrap\css\bootstrap.min.css"></script>

</html>