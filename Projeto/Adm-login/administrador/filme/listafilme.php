<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
</head>
<style>
     /* Estilos gerais */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 90%;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dddddd;
    white-space: pre-line;
   
}

th {
    background-color: #f2f2f2; 
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.button {
    background-color: #efac41;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
}

.button:hover {
    background-color: #de8531;
}

.button a {
    color: white;
    text-decoration: none;
}

.button3 {
    background-color: #efac41;
}

.button3:hover {
    background-color: #de8531;
}

.buttonvoltar {
    background-color: #b32900;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    margin-left: 600px;
}

.buttonvoltar:hover {
    background-color: #6c1305;
}
</style>

<body>
    

<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM Filme');
  $retorno->execute();

?>       <div class="container">
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>GENERO</th>
                    <th>DATA DE LANÇAMENTO</th>
                    <th>DIREÇÃO</th>
                    <th>DURAÇÃO</th>
                    <th>SINOPSE</th>
                    <th>ROTEIRO</th>
                    <th>ELENCO</th>
                    <th>ALTERAR FILME</th>
                    <th>EXCLUIR FILME</th>
                    

                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                        <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['genero']?> </td> 
                            <td> <?php echo $value['data_lancamento']?> </td> 
                            <td> <?php echo $value['direcao']?> </td> 
                            <td> <?php echo $value['duracao']?> </td> 
                            <td> <?php echo $value['sinopse']?> </td> 
                            <td> <?php echo $value['roteiro']?> </td> 
                            <td> <?php echo $value['elenco']?> </td> 
                            <td>
                               <form method="GET" action="altfilme.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button  class='button button3' name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                               <form method="GET" action="crudfilme.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button  class='button button3' name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
      </div>
<?php         
   echo "<button class='buttonvoltar'><a href='../index.php'>voltar</a></button>";
?>
</body>
</html>