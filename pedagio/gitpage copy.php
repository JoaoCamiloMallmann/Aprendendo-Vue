<?php

require_once 'inc\header.php';

?>

<style>
    body {
        background-color: #2c2f34;
        font-family: 'Lato', sans-serif;
        font-family: 'Roboto', sans-serif;
    }

    td a {
        color: green;
    }

    h2 {
        color: #6cc644;
    }

    article #foto {
        border: white 3px solid;
        border-radius: 100px;
        text-align: center;

    }
</style>

<header class="m-2">
    <article>
        <div class="d-flex m-1" style="align-items: center;">
            <img src="https://icones.pro/wp-content/uploads/2021/06/icone-github-verte.png" alt="LogoGit" style="height: 30px;">
            <label for="nome" class="fs-4" style="color: #228823; text-align: center; margin-left: 6px;">Nome GitHub</label>

            <button class=" btn position-absolute" style="top: 25px; right: 15px; background-color: #228823;" id="voltar">
                Voltar
            </button>
        </div>
        <input type="text" id="nome" class="NomeDaPessoas form-control border-success " style=" width: 20%; color:white; background-color:#2c2f34">
        <button onclick="buscar()" class="btn" style="color:black; background-color:#228823; margin-top: 8px;">Buscar</button>
    </article>

    <script src="Javascript/paginaGit.js"></script><script src="Javascript/paginaGit.js"></script>
</header>


<?php

use Pedagio\CurlGit;

require_once "vendor/autoload.php";


$curlGit = new CurlGit();

$dados = "";
if (empty($_GET["nome"])) {
    die;
}

$nome = $_GET['nome'];
$resultado = $curlGit->get("https://api.github.com/users/" . $nome . "/repos");
$dados = json_decode($resultado['data'], true);
$erro = json_decode($resultado['statusCode'], true);

if ($erro != 200) {
    $nome = 'Não Encontrado';
    $valorErro = true;
    $dados = [];
}

if (empty($dados)) {

    $nome = 'Não Encontrado';
    $valorErro = true;
} else {
    $valorErro = false;
    $nome = $_GET['nome'];
    foreach ($dados as $row) {
        if (!empty($row['owner']['avatar_url'])) {
            $link =  $row['owner']['avatar_url'];
            break;
        }
    }
}

?>


<body>

    <article class="m-4" style="background-color: #212529; border-radius: 70px; padding: 25px 0px ;">

        <div class=" d-flex justify-content-around p-2" style="align-items: center; flex-direction: column;">
            <?php if ($valorErro == false) { ?>
                <img src="<?php echo $link; ?>" alt="Logo" id="foto" style="width: 150px; height:150px  ;" class="d-flex m-2">
            <?php } ?>
            <h2 style="color:forestgreen; text-align: center; text-transform: capitalize; font-size: 40px" class="m-1"> <?php echo $nome ?></h2>
        </div>

        <section class="m-2">

            <?php

            if ($valorErro == false && !empty($dados)) {
                echo ($curlGit->montaTabela($dados));
            }
            ?>
        </section>


    </article>


    <?php
    if ($valorErro == true) {
        echo  $curlGit->mostraErro($erro);
    }
    ?>

</body>


</html>