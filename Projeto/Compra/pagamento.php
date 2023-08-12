<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            background-image: url(fundo.jpg);
            background-size: cover;
        }

        .header {
            width: 100%;
            display: flex;
            flex-direction: column;
            background-color: black;
            background-size: cover;
        }


        .superior {
            display: flex;
            flex-direction: row;
            background-color: #ffffff09;
            height: 14vh;
        }

        .logo {
            width: 55%;
            padding-left: 40px;
            padding-top: 10px;
        }

        img {
            height: 80%;
        }

        .caixa1,
        .caixa2,
        .caixa3,
        .caixa4,
        .caixa5 {

            margin-left: 40px;
            padding-top: 40px;
            color: #D50000;
            font-size: 20px;

        }




        a:link {
            text-decoration: none;
        }

       
        img {
            width: 20%;
        }


        .conteudo {
            margin-top: 50px;
            height: 503px;
            width: 70%;
        }

        .titulos {
            height: 50px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .informacoes {
            background-color: #f0f0f0;
            height: 450px;
            width: 100%;
            border: solid 3px #de8531;
        }

        .assento,
        .sessao,
        .confirmar {
            height: 50px;
            width: 25%;
            background-color: #212121;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
        }

        .pagamento {
            background-color: #de8531;
            height: 50px;
            width: 25%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
        }

        button {
            position: relative;
            display: inline-block;
            margin: 15px;
            padding: 15px 30px;
            text-align: center;
            font-size: 18px;
            letter-spacing: 1px;
            text-decoration: none;
            color: #89a46f;
            background: transparent;
            cursor: pointer;
            transition: ease-out 0.5s;
            border: 2px solid #89a46f;
            border-radius: 10px;
            box-shadow: inset 0 0 0 0 #89a46f;
        }

        button:hover {
            box-shadow: inset 0 -100px 0 0 #89a46f;
        }

        button:active {
            transform: scale(0.9);
        }

        a:link {
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
    <div class="superior">

<div class="logo">
    <img src="../catalogo/logo.png" alt="">
</div>
<div class="caixa1">
    <a style=" color: #D50000;;" href="">
   
    </a>
</div>
<div class="caixa2">
    <a style=" color: #D50000;;" href="">

    </a>
</div>
<div class="caixa3">
    <a style=" color: #D50000;;" href="">

    </a>
</div>
<div class="caixa4">
    <a style=" color: #D50000;;" href="">

    </a>
</div>
<div class="caixa5">
    <a style=" color: #D50000;;" href="">

    </a>
            </div>
        </div>
    </div>

    </div>
    <div class="conteudo">
        <div class="titulos">
            <div class="sessao">
                <p style="color: red;">Sessão</p>
            </div>
            <div class="assento">
                <p style="color: red;">Assento</p>
            </div>
            <div class="pagamento">
                <p>Pagamento</p>
            </div>
            <div class="confirmar">
                <p style="color: red;">Confirmar</p>
            </div>
        </div>
        <div class="informacoes">
            
        <?php
require_once "conexao.php";

if(isset($_POST['enviar'])) {
    if(isset($_POST['assentos_selecionados'])) {
        $assentosSelecionados = $_POST["assentos_selecionados"];
        
        $sql = "INSERT INTO Ingresso (num_assento) VALUES (:num_assento)";
        $sqlcombanco = $conexao->prepare($sql);

        foreach ($assentosSelecionados as $assento) {
            $sqlcombanco->bindParam(":num_assento", $assento, PDO::PARAM_STR);
            $sqlcombanco->execute();
        }
    }

    if(isset($_POST['pagamento'])) {
        $pagamento = $_POST["pagamento"];

        $sql = "INSERT INTO Ingresso (form_pagamento) VALUES (:form_pagamento)";
        $sqlcombanco = $conexao->prepare($sql);
        $sqlcombanco->bindParam(":form_pagamento", $pagamento, PDO::PARAM_STR);

        if($sqlcombanco->execute()) {
            echo "O pagamento foi realizado";
        }
    }
}
?>

<div class="informacoes">
    <form action='confirmar.php' method='post'>
        <select name='pagamento' id='form_pagamento'>
            <option value='cartao'>Cartão de crédito</option>
            <option value='pix'>Pix</option>
        </select>
        <button class="button" name="enviar" type="submit" style="color:black;">Selecionar</button>
    </form>
</div>



        </div>
    </div>
</body>

</html>