<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina De Descadastro</title>

    <link rel="stylesheet" href="./inc/bootstrap/css/bootstrap.min.css">
    <script src="./inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="./inc/jquery.js"></script>

</head>

<style>
    .titulo {
        padding: .5rem;
        background-color: red;
        color: white;
        text-align: center;
    }

    .label {
        font-weight: bold;
        margin-top: 0.5rem;
        margin-bottom: .2rem;
    }

    .form-control {
        margin: 0;
        padding: .5rem;
        border-radius: 12px;
        border: 1px solid lightgrey;
    }

    .botao {
        background-color: red;
        color: wheat;
        border: none;
        padding: 0.6rem;
        margin: 1rem 0;
        border-radius: 8px;
    }

    p {
        display: flex;
    }
</style>


<body>

    <h2 class="titulo"> Descadastrar </h2>

    <div class="container">

        <form id="formulario" method="POST">

            <label for="cpfcnpj" class="label">CPF - CNPJ:</label>
            <input name="cpfcnpj" id="cpfcnpj" type="text" onkeypress='mascaraMutuario(this,cpfCnpj)' maxlength="18" class="form-control floating" required>

            <label for="email" class="label">Email:</label>
            <input name="email" type="email" class="form-control floating" id="email" placeholder="" required>

            <label for="telefone" class="label">Telefone:</label>
            <input name="telefone" class="form-control floating" id="telefone" placeholder="" maxlength="15" required>

            <label for="mensagem" class="label">Mensagem:</label>
            <textarea name="mensagem" rows="5" style="resize: none;" class="form-control" placeholder=" " id="mensagem"></textarea>

            <button class="botao" name="enviar">CONFIRMAR</button>

            <p> Por favor, informe os dados para solicitar a remoção das sua conta.<br>
                Nossa equipe irá avaliar sua solicitação em até 72 horas.
            </p>
        </form>
    </div>
</body>

<!-- marcara cpf cnpf ---->
<script>
    function mascaraMutuario(o, f) {
        v_obj = o
        v_fun = f
        setTimeout('execmascara()', 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function cpfCnpj(v) {

        //Remove tudo o que não é dígito
        v = v.replace(/\D/g, "")

        if (v.length <= 14) { //CPF

            //Coloca um ponto entre o terceiro e o quarto dígitos
            v = v.replace(/(\d{3})(\d)/, "$1.$2")

            //Coloca um ponto entre o terceiro e o quarto dígitos
            //de novo (para o segundo bloco de números)
            v = v.replace(/(\d{3})(\d)/, "$1.$2")

            //Coloca um hífen entre o terceiro e o quarto dígitos
            v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

        } else { //CNPJ

            //Coloca ponto entre o segundo e o terceiro dígitos
            v = v.replace(/^(\d{2})(\d)/, "$1.$2")

            //Coloca ponto entre o quinto e o sexto dígitos
            v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")

            //Coloca uma barra entre o oitavo e o nono dígitos
            v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")

            //Coloca um hífen depois do bloco de quatro dígitos
            v = v.replace(/(\d{4})(\d)/, "$1-$2")

        }

        return v

    }
</script>

<!-- marcara telefone ---->
<script>
    /* Máscaras ER */
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }

    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }

    function mtel(v) {
        v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }

    function id(el) {
        return document.getElementById(el);
    }
    window.onload = function() {
        id('telefone').onkeyup = function() {
            mascara(this, mtel);
        }
    }
</script>

<!-- enviar ---->
<script>
    $("#formulario").submit(function(e) {
        e.preventDefault();
        cadastrar();
    });

    function cadastrar() {
        event.preventDefault()
        var cpfcnpj = $("#cpfcnpj").val();
        var email = $("#email").val();
        var telefone = $("#telefone").val();
        var mensagem = $("#mensagem").val();
        $.ajax({
            url: "ajax/index.php?act=cadastrar",
            type: "POST",
            dataType: "json",
            data: {
                cpfcnpj,
                email,
                telefone,
                mensagem,
            },

            beforeSend: function() {},
            complete: function(e) {},
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError);
            },
            success: function(result) {
                //console.log(result);
                if (result.ok == 1) {
                    console.log("ok");
                    var form2 = document.getElementById('formulario')
                    form2.reset();
                } else {
                    var msg = "";
                    Object.keys(result.msg).forEach((item) => {
                        msg += result.msg[item];
                    });
                    alertaErro(msg);
                }
            },
        });
    }
</script>

</html>