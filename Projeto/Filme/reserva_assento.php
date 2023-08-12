<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_reserva.css">
    <title>Document</title>
</head>
<body>

<header>

    <div class="logo">
      <img src="logo.png" alt="">
    </div>

    <div class="caixa1">
      <a style=" color: white;" href="">
        <p>ABOUT</p>
      </a>
    </div>
    <div class="caixa2">
      <a style=" color: white;" href="">
        <p>SERVICES</p>
      </a>
    </div>
    <div class="caixa3">
      <a style=" color: white;" href="">
        <p>CLIENTS</p>
      </a>
    </div>
    <div class="caixa4">
      <a style=" color: white;" href="">
        <p>BLOG</p>
      </a>
    </div>
    <div class="caixa5">
      <a style=" color: white;" href="">
        <p>CONTACTS</p>
      </a>
    </div>
  </header>

<div class="centro">
        <div class="titulo"><h2>Asssentos</h2></div>
        <div class="conteudo">   
            <div class="assentos">
        <img src="imagem_cinema.jpg" alt=""></div>
       </div>
       <div class="selecao">
        Assentos livres:
        <form action="dados_reserva.php" method="post">
        <select name="selection" id="selection">
            <option>assento1</option>
            <option>assento2</option>
            <option>assento3</option>
            <option>assento4</option>
            <option>assento5</option>
            <option>assento6</option>
            <option>assento7</option>
            <option>assento8</option>
            <option>assento9</option>
            <option>assento10</option>
            <option>assento11</option>
            <option>assento12</option>
        </select>
        <button type="submit" class="bnt"> <b> Confirmar</b> </button>
        </form>
        </div></div>        
         
</body>
</html>