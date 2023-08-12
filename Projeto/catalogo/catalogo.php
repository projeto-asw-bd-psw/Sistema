<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style_catalago.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_catalogo.css">
</head>

<body>

  <div class="header">

    <div class="superior">

      <div class="logo">
        <img src="logo.png" alt="">
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
    <div class="espacamento">
      
    </div>
  </div>

  <h2 style="margin-left: 100vh">Filmes</h2>
  <div class="main">
      
    <?php

    require_once "conexao.php";

    // Query SQL para buscar os nomes e códigos dos professores no banco de dados
    $sql = "SELECT id, nome FROM Filme";

    // Prepara a consulta
    $stmt = $conexao->prepare($sql);

    // Executa a consulta
    $stmt->execute();

    
    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);  



    if (count($filmes) > 0) {
      foreach ($filmes as $filme) {
        echo '<div class="filme1">' . $filme["nome"];
        echo '<form method="GET" action="../filme/index.php">';
        echo '<input name="idfilme" type="hidden" value="' . $filme['id'] . '"/>';
        echo '<button style="border-radius: 25px;," class="button" name="enviar" type="submit">detalhes</button>';
        echo '</form>';
     
        echo '</div>';
      }
    }

    ?>




    </p>
  </div>

  <div class="rodape">
    <h2>rodape</h2>

  </div>
</body>

</html>