<html>
<?php

use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();
$lista = $testeDAO->listar();



?>

<div class="m-4">
    <table class="table">

        <h1 style="text-align: center; color: #333333">LISTA DE DADOS</h1>

        <thead class="m-2">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="text-align: center;">NOME</th>
                <th scope="col" style="text-align: center;">CPF</th>
                <th scope="col" style="text-align: center;">VALOR</th>
                <th scope="col" style="text-align: center;">ALTERAR</th>
                <th scope="col" id="deletar" class="visible">DELETAR</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($lista as $row) { ?>

                <tr>
                    <th scope="row">
                        <?php
                        echo $row['id']
                        ?>
                        </td>
                    </th>

                    <td style="text-align: center;"> <?php
                                                        echo $row['nome']
                                                        ?> </td>
                    <td style="text-align: center;"> <?php
                                                        echo $row['cpf']
                                                        ?>
                    </td>

                    <td style="text-align: center;"> <?php
                                                        echo $row['valor']
                                                        ?>
                    </td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-info" onclick="window.location.href='cadastro.php?dado=<?php echo $row['id'] ?>'">
                            <i class="fas fa-info-circle" style="color: white;"></i>
                        </button>
                    </td>

                    <td id="deletar" class="visible">
                        <input type="checkbox" name="ids" style="text-align: center;" id="<?php echo $row['id'] ?>">
                        <i class="fas fa-trash"></i>

                    </td>

                </tr>
            <?php } ?>
            <div class="oi"></div>

        </tbody>

    </table>



</html>