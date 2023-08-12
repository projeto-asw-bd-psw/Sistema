<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sessoes</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
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
   
  $retorno = $conexao->prepare('SELECT * FROM Sessao');
  $retorno->execute();

?>       <div class="container">
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NUMERO</th>
                    <th>HORARIO</th>
                    <th>SALA</th>
                    <th>ID FILME</th>
                    <th>VALOR </th>
                    <th>DATA</th>
                    <th>ALTERAR </th>
                    <th>EXCLUIR </th>
                    

                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                        <td> <?php echo $value['idsessao'] ?>   </td> 
                            <td> <?php echo $value['numero']?>  </td> 
                            <td> <?php echo $value['horario']?> </td> 
                            <td> <?php echo $value['sala']?> </td>  
                            <td> <?php echo $value['id']?> </td> 
                            <td> <?php echo $value['valor']?> </td> 
                            <td> <?php echo $value['data']?> </td> 
                           
                               <td>
                               <form method="GET" action="altsessao.php">
                                        <input name="idsessao" type="hidden" value="<?php echo $value['idsessao'];?>"/>
                                        <button  class='button button3' name="alterar"  type="submit">Alterar</button>
                                </form>
                    </td>
                             <td>
                               <form method="GET" action="crudsessao.php">
                                        <input name="idsessao" type="hidden" value="<?php echo $value['idsessao'];?>"/>
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