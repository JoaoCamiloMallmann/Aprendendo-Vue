<?php

namespace Pedagio;

use DateTime;

class TesteDAO extends Conexao
{
    public function __construct()
    {
        $this->abreConexao();
    }
    public function listar(): array
    {
        $query = "SELECT id, nome, valor, data from teste";
        $rs = $this->getConexao()->Execute($query);
        if ($rs && $rs->RecordCount()) {
            return $rs->getAll();
        }
        return [];
    }

    public function atualizar(Teste $teste): bool
    {
        $query = "UPDATE teste SET  nome =  ?, data = ?, valor = ?  
        WHERE id = ? ";
        $bind =
            [
                $teste->getNome(),
                $teste->getData()->format("Y-m-d H:i:s"),
                $teste->getValor(),
                $teste->getId(),
            ];
        if (!$this->getConexao()->Execute($query, $bind)) {
            return false;
        }
        return true;
    }

    public function buscarId($id): Teste
    {
        $query = "SELECT * FROM teste
        WHERE id = ?";
        $bind =
            [
                $id,
            ];
        $rs = $this->getConexao()->Execute($query, $bind);
        $teste = new Teste();
        if ($rs && $rs->RecordCount() > 0) {
            $row = $rs->fetchRow();
            $teste->carregarObjeto($row);
        }
        return $teste;
    }

    public function buscarNome ($nome): Teste
    {
        $query = "SELECT * FROM teste 
        WHERE nome LIKE ?";
        $bind = 
            [
                '%' . $nome . '%',
            ];
        $rs = $this->getConexao()->Execute($query, $bind);
        $teste = new Teste();
        if ($rs && $rs->RecordCount() > 0) {
            $row = $rs->fetchRow();
            $teste->setId($row['id']);
            $teste->setNome($row['nome']);
            $teste->setData(new DateTime($row['data']));
            $teste->setValor($row['valor']);
              
        }
        return $teste;
    }

    public function inserir(Teste $teste): bool
    {
        $query = "INSERT INTO teste (nome, data, valor)
        VALUES (?,?,?);";
        $bind =
            [
                $teste->getNome(),
                $teste->getData()->format("Y-m-d H:i:s"),
                $teste->getValor()
            ];
        if (!$this->getConexao()->Execute($query, $bind)) 
        {
            return false;
        }
        return true;
    }
    public function remover( int $id): bool
    {
        $query = "DELETE FROM teste 
        WHERE id = ?";
        $bind = 
            [
                $id
            ];
        if(!$this->getConexao()->Execute($query, $bind))
        {
            return false;
        }
        return true;
    }
}
