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

   $idassento= $_GET['idassento'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM Assento where idassento= :idassento";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':idassento',$idassento, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $fileira = $array_retorno['fileira'];
  $numero =$array_retorno['numero'];
  $numero_Sessao=$array_retorno['numero_Sessao'];
  $sala_sessao=$array_retorno['sala_sessao'];
?>
   <div class="container">
  <form method="GET" action="crudassento.php">
    <p>Alterar fileira do Assento:</p>
        <input type="number" name="fileira" class="butao" value= "<?php echo htmlspecialchars($fileira)?>" >
        <p>Alterar numero do Assento:</p>            
        <input type="number" name="numero" class="butao" value= "<?php echo htmlspecialchars($numero)?>" >
                                                
        <p>Alterar numero da sessao:</p> 
                   <select name="numero_Sessao" id="">
                   <?php 
        include_once('./crudassento.php');
        foreach ($numero_s as $num) {
                echo "<option value=\"$num\">$num</option>";
            } ?>" >
    </select>
                                                
        <p>Alterar sala do assento:</p>            
        <select name="sala_sessao" id="">
                   <?php 
        include_once('./crudassento.php');
        foreach ($sala_s as $sala_sessao) {
                echo "<option value=\"$sala_sessao\">$sala_sessao</option>";
            } ?>" >
    </select>
                                                
        <input type="hidden" name="idassento" value=<?php echo $idassento?> >

        <input  class="submit" type="submit" name="update" value="Alterar">
  </form>
</div>
</body>
</html>