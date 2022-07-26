<?php

use Pedagio\Conexao;
use Pedagio\Teste;
use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();

$lista = $testeDAO->listar();
echo "INICIO DA LISTA----------------------------------<br><br>";
foreach ($lista as $row) {
   imprimir($row);
}
echo ("FIM DA LISTA----------------------------------<br><br>");

echo "ATUALIZANDO ID 2----------------------------------<br><br>";
$teste = new Teste();
$teste->setNome('Carlos');
$teste->setData(new DateTime("2030-06-06 03:03:03"));
$teste->setValor(2930);
$teste->setId(49);
$atualizar = $testeDAO->atualizar($teste);
echo "FIM----------------------------------<br><br>";

$buscarId = $testeDAO->buscarId(49);
$buscarId->getTodos();
echo "<br>";

foreach ($lista as $row) {
   imprimir($row) ;
}

function imprimir($row)
{
   echo ($row['nome'] . " " . $row['valor']) . " " . $row['data'] . " " . $row['id'] . "<br>";
}

$buscarNome = $testeDAO->buscarNome('Rober');
$buscarNome->getTodos();
echo "<br><br>";

foreach ($lista as $row) {
   imprimir($row);
}

/*$teste = new Teste();
$teste->setNome('Testando');
$teste->setData(new DateTime("2030-03-03 03:03:03"));
$teste->setValor(456);
$inserir = $testeDAO->inserir($teste);*/

$deletar = $testeDAO->remover('35');
