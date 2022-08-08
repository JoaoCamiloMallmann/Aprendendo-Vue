<?php

namespace Pedagio;

class CurlGit extends Curl
{

    public function __construct()
    {
    }
    public function converteDataBr($data)
    {
        $dataBr = date('d/m/Y H:i:s', strtotime($data));
        return $dataBr;
    }

    public function montaTabela($dados)
    {

        $html = '';
        $html .= '<table class="table table-striped table-dark table-bordered " style="padding-bottom: 18px; color:forestgreen;"';
        $html .= '<thead>';
        $html .= ' <tr>';
        $html .= '   <th scope="col" style="color: forestgreen; text-align: center">ID</th>';
        $html .= '   <th scope="col" style="color: forestgreen; text-align: center">Nome Do Projeto</th>';
        $html .= '   <th scope="col" style="color: forestgreen; text-align: center">Linguagem</th>';
        $html .= '   <th scope="col" style="color: forestgreen; text-align: center">Data Criaçao</th>';
        $html .= '   <th scope="col" style="color: forestgreen; text-align: center">Data De Atualização</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody class="table-group-divider">';

        foreach ($dados as $row) {

            if ($row['language'] == NULL) $row['language'] = 'Não Definida';
?>
            <style>
                a {
                    text-decoration: none;
                    color: white;
                    text-align: center;
                }

                a:hover {
                    color: green;
                }
            </style>

<?php
            $html .= '<tr>';
            $html .= '    <th scope="row">' . $row['id'] . '</th>';
            $html .= '    <td style=" text-align: center color:green;"> <a href=" ' . $row['svn_url'] . '"  > ' . $row['name'] . '</a>  </td>';
            $html .= '    <td style=" text-align: center">' . $row['language'] . '</td>';
            $html .= '    <td style=" text-align: center">' . $this->converteDataBr($row['created_at']) . '</td style=" text-align: center">';
            $html .= '    <td style=" text-align: center">' . $this->converteDataBr($row['updated_at'])  . '</td>';
        }
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }
    public function mostraErro($NumeroDoErro)
    {
        return  $html = ' <p style="color:white; font-size:45px; text-align: center;"> Erro ' . $NumeroDoErro . '</p>';
    }
}
