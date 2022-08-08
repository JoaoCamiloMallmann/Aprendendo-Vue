<?php

use Pedagio\CurlGit;

require_once("../vendor/autoload.php");

if($_GET['act']=='buscar')
{
    exit(json_encode(buscarGitHub()));
}

function buscarGitHub()
{


    $curlGit = new CurlGit();

    $dados['ok'] = "0";
    if (empty($_GET["nome"])) 
    {
        return $dados;
    }

    $nome = $_GET['nome'];
    $resultado = $curlGit->get("https://api.github.com/users/" . $nome . "/repos");
    $dados['dados'] = json_decode($resultado['data'], true);
    $status = json_decode($resultado['statusCode'], true);

    if ($status != 200) 
    {
        $dados['erro'] = 'Sem Dados';
        return $dados;
    }
    $dados['ok'] = "1";
    return $dados;
}