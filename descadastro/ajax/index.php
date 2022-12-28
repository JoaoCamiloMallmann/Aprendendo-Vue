<?php

if ($_GET['act'] == 'cadastrar') {
    exit(json_encode(cadastrar()));
}


function cadastrar()
{
    $retorno['ok']=1;
    
    return $retorno;

}

  


