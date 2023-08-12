<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index- pagina inicial</title>
</head>
<style>
  /* Reset de estilos para garantir uma base consistente */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  /* Estilos gerais da página */
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #6c1305;
    display: flex;

    align-items: center;
    justify-content: center;
    border-radius: 25px;
    padding-left: 50px;
  }

  .titulo {
    margin-top: 100px;
    font-size: 40px;
    font-weight: bold;
    margin-bottom: 20px;

  }

  .button {
    display: inline-block;
    padding: 10px 100px;
    margin: 10px;
    border: none;
    border-radius: 5px;
    background-color: #6c1305;
    color: white;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .button a {
    color: white;
    /* Adicionei esta linha para tornar o link branco */
    text-decoration: none;
    font-size: 20px;
  }

  .button:hover {
    background-color: #B32900;
  }

  /* Estilos específicos para a área de botões de cadastro e login */
  .cad,
  .lista {
    margin-top: 30px;
    flex-direction: row;
  }
</style>

<body>
  <h2 class="titulo">Sistema de Cadastros do administrador</h2>
  <div class="container">

    <div class="cad">
      <button class="button"><a href="./filme/cadfilme.php">Cadastrar Filmes</a></button>
      <button class="button"><a href="./sessao/cadsessao.php">Cadastrar Sessao</a></button>
      <button class="button"><a href="./assento/cadassentos.php">Cadastrar Assentos</a></button>
      <br> <br>
    </div>
    <div class="lista">
      <button class="button"><a href="./filme/listafilme.php">Lista de Filmes</a></button>
      <button class="button"><a href="./sessao/listasessao.php">Lista de Sessoes</a></button>
      <button class="button"><a href="./assento/listaassento.php"> Lista de Assentos</a></button>
      <br> <br>
    </div>


  </div>
  <button class="button"><a href="../../catalogo/catalogo.php">Visualizar catalogo</a></button> 
  <button class="button"><a href="../index.php">sair </a></button>
</body>

</html>