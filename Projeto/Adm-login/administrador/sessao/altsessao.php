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
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
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

   $idsessao= $_GET['idsessao'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM Sessao where idsessao= :idsessao";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':idsessao',$idsessao, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $horario = $array_retorno['horario'];
  $numero =$array_retorno['numero'];
  $sala =$array_retorno['sala'];
  $valor =$array_retorno['valor'];
  $data =$array_retorno['data'];
?>
<div class="container">
  <form method="GET" action="crudsessao.php">
    <p>Alterar horario da Sessao:</p>
        <input type="time" name="horario" class="butao" value= "<?php echo htmlspecialchars($horario)?>" >
        <p>Alterar sala da sessao:</p>            
        <input type="number" name="sala" class="butao" value= "<?php echo htmlspecialchars($sala)?>" >
        <p>Alterar numero da sessao:</p>        
        <input type="number" name="numero" class="butao" value= "<?php echo htmlspecialchars($numero)?>" >
        <p>Alterar valor da sessao:</p>        
        <input type="text" name="valor" class="butao" value= "<?php echo htmlspecialchars($valor)?>" >
        <p>Alterar data da sessao:</p>        
        <input type="date" name="data" class="butao" value= "<?php echo htmlspecialchars($data)?>" >   
                                           
        <input type="hidden" name="idsessao" value=<?php echo $idsessao?> >

        <input  class="submit" type="submit" name="update" value="Alterar">
  </form>
</div>
</body>
</html>