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

echo "ATUALIZANDO ID ----------------------------------<br><br>";
$teste = new Teste();
$teste->setNome('Uelinto');
$teste->setData(new DateTime("2019-03-12 03:45:12"));
$teste->setValor(365);
$teste->setCpf('123.321.231-12');
$teste->setNumeroDeTelefone('99999999999');
$teste->setId(70);
$atualizar = $testeDAO->atualizar($teste);


echo "FIM----------------------------------<br><br>";

echo "Buscar id----------------------------------<br><br>";

$buscarId = $testeDAO->buscarId(49);
$buscarId->getTodos();
echo "<br>";

foreach ($lista as $row) {
   imprimir($row) ;
}

function imprimir($row)
{
   echo ($row['nome'] . " " . $row['valor']) . " " . $row['data'] . " " . $row['id'] . " " . $row['cpf'] . " " . 
   $row['numeroDeTelefone'] . "<br>";
}

echo "FIM----------------------------------<br><br>";

echo "Buscar nome----------------------------------<br><br>";

$buscarNome = $testeDAO->buscarNome('Uel');
$buscarNome->getTodos();
echo "<br><br>";

foreach ($lista as $row) {
   imprimir($row);
}

echo "FIM----------------------------------<br><br>";

echo "Buscar cpf----------------------------------<br><br>";
$buscarCpf = $testeDAO->buscarCpf('111.111.111-11');
$buscarCpf->getTodos();
echo "<br><br>";

echo "FIM----------------------------------<br><br>";

/*$teste = new Teste();
$teste->setNome('Thanos');
$teste->setData(new DateTime("2016-11-20 19:13:18"));
$teste->setValor(189);
$teste->setCpf('019.609.195-02');
$teste->setnumeroDeTelefone('61997286483');
$inserir = $testeDAO->inserir($teste);*/

/*echo $inserir;*/

/*$deletar = $testeDAO->remover('35');*/
