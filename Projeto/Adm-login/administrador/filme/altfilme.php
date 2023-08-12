<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  /* Estilos gerais */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2; 
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 30px;
    max-width: 800px;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 400px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 600px;
}

.butao {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.submit {
    background-color: #efac41;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.submit:hover {
    background-color: #de8531;
}

</style>
<body>
<?php
    require_once('conexao.php');

   $id= $_GET['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM Filme where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $genero = $array_retorno['genero'];
   $data_lancamento = $array_retorno['data_lancamento'];
   $direcao= $array_retorno['direcao'];
   $duracao = $array_retorno['duracao'];
   $sinopse = $array_retorno['sinopse'];
   $roteiro = $array_retorno['roteiro'];
   $elenco = $array_retorno['elenco'];

?>
<div class="container">

  <form method="GET" action="crudfilme.php">
  <p>Alterar nome do filme:</p> 
        <input type="text" name="nome" class="butao" value= "<?php echo htmlspecialchars($nome)?>" >
        <p>Alterar genero do filme:</p>                                     
        <input type="text" name="genero" class="butao" value="<?php echo htmlspecialchars($genero) ?>" >
        <p>Alterar a data de lançamento do filme:</p> 
        <input type="date" name="data_lancamento" class="butao" value="<?php echo htmlentities($data_lancamento) ?>" >
        <p>Alterar a direção do filme:</p> 
        <input type="text" name="direcao" class="butao" value="<?php echo htmlspecialchars( $direcao)?> ">
        <p>Alterar a duração do filme:</p> 
        <input type="text" name="duracao" class="butao" value="<?php echo htmlspecialchars($duracao) ?> ">
        <p>Alterar a sinopse do filme:</p> 
        <input type="text" name="sinopse" class="butao" value="<?php echo htmlspecialchars($sinopse ) ?> ">
        <p>Alterar o roteiro do filme:</p> 
        <input type="text" name="roteiro" class="butao" value="<?php echo htmlspecialchars($roteiro)?>" >
        <p>Alterar elenco do filme:</p> 
        <input type="text" name="elenco" class="butao" value="<?php echo htmlspecialchars($elenco)?> ">
        <input type="hidden" name="id" value=<?php echo $id?> >

        <input  class="submit" type="submit" name="update" value="Alterar">
  </form>
</div>
</body>
</html>