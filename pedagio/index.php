<?php

use Pedagio\Conexao;
use Pedagio\TesteDAO;

require_once "vendor/autoload.php";

$testeDAO = new TesteDAO();
$lista = $testeDAO->listar();


require_once 'inc\header.php';
?>

<style>
   .visible {
      display: none;
   }

   .alert span:hover {
      cursor: pointer;
   }

   #deletar {
      text-align: center;
   }
</style>

<body style="background-color: #e5e7eb;">

   <?php
   if (!empty($_GET["alert"])) {
   ?>
      <div class="alert position-absolute top-0" style=" width: 25%; right: 40%;   text-align: center;">
         <bold class="texto" style="font-size: 20px;"> Adicionado Com Sucesso </bold>
      </div>
   <?php
   }
   ?>
   <header class="d-flex m-2 p-3" style="background-color: #333333; border-radius: 4rem; justify-content: space-evenly;">

      <button type="button" class="btn btn-danger btnclick">DELETAR</button>


      <img class="img-fluid prim logoUni" src="https://www.liquidworks.com.br/wp-content/themes/liquid/imagens/logo.png" style="height: 70px;">

      <button type="button" class="btn btn-success" onclick="window.location.href='cadastro.php'" style="color: white;">CADASTRO
      </button>

   </header>



   <script src="Javascript/master.js"></script>

   <div class="result"></div>

   </div>

   <script src="Javascript/btnDelete.js"></script>
   <script src="Javascript/alertaIndex.js"></script>

   <div class="d-flex m-4 botoes" style="align-items: center; justify-content: space-around;">
      <button type="button" class="btn" onclick="window.location.href='gitpage.php'" style="color: white; background-color: #6cc644;"><img src="https://logos-world.net/wp-content/uploads/2020/11/GitHub-Emblem.png" style=" height: 40px;  ">
      </button>

      <button id="deletar" type="button" class="btn btn-danger visible apagarTudo" style="height: 70px;">
         <i class="fa-solid fa-triangle-exclamation"></i> <BR> APAGAR TUDO</BR>
      </button>


</body>
<script src="inc\jquery.js"></script>
<script src="master.js"></script>



</html>