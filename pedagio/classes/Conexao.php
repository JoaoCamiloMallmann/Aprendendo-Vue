<?php

namespace Pedagio;

class Conexao
{

    public static $instance;
    public $conexao = NULL;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Conexao();
            //include_once(DIR_FS_CONFIG . "/config.php");
            $conexao = ADONewConnection(BD_TIPO_CONEXAO);
            if ($conexao->Connect(BD_HOST, BD_USR, BD_PASS, BD_BANCO_DE_DADOS)) {
                $conexao->debug = FALSE;
                $conexao->setFetchMode(ADODB_FETCH_ASSOC);
                $conexao->setCharset('utf8');
                self::$instance->conexao = $conexao;
            }
        } else {
            if (is_a(self::$instance->conexao, '__PHP_Incomplete_Class')) {
                //include_once(DIR_FS_CONFIG . "/config.php");
                $conexao = ADONewConnection(BD_TIPO_CONEXAO);
                if ($conexao->Connect(BD_HOST, BD_USR, BD_PASS, BD_BANCO_DE_DADOS)) {
                    $conexao->debug = FALSE;
                    $conexao->setFetchMode(ADODB_FETCH_ASSOC);
                    $conexao->setCharset('utf8');
                    self::$instance->conexao = $conexao;
                }
            }
        }
        return self::$instance;
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    function abreConexao()
    {
        $objConexao = Conexao::getInstance();
        $this->conexao = $objConexao->getConexao();
        if ($this->conexao == NULL) {
            return false;
        }
        return true;
    }
}
