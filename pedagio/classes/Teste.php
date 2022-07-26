<?php

namespace Pedagio;

use DateTime;

class Teste
{
    private ?int $id;
    private ?string $nome;
    private ?DateTime $data;
    private ?float $valor;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getTodos()
    {
        echo $this->id . PHP_EOL;
        echo $this->nome . PHP_EOL;
        echo $this->data->format('Y-m-d') . PHP_EOL;
        echo $this->valor . PHP_EOL;
    }

    public function carregarObjeto($row)
    {
        $this->id = $row['id'];
        $this->nome = $row['nome'];
        $this->data = new DateTime($row['data']);
        $this->valor = $row['valor'];
    }
}
