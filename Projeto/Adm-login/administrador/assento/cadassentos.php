
 <?php
require_once('./crudassento.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Assentos</title>
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Estilos gerais */
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0; /* Cor de fundo para o corpo da página */
  display: flex;
  align-items: center;
  margin: 30px;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 30px;
  background-color: #ffffff; 
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave */
}

.informacoes {
  font-weight: bold;
  margin-top: 10px;
}

.dados {
  width: 100%;
  padding: 8px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-family: Arial, sans-serif; /* Altera a fonte */
  font-size: 14px; /* Altera o tamanho da fonte */
}

button.button {
  background-color: #b32900;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button.button a {
  text-decoration: none;
  color: white;
}

button.button:hover {
  background-color: #6c1305;
}

#cadastrar {
  background-color: #efac41;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 10px;
  transition: background-color 0.3s ease;
  margin-left: 30px;
}

#cadastrar:hover {
  background-color: #de8531;
}

/* Estilos para campos de seleção */
select.dados {
  width: 100%;
  padding: 8px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-family: Arial, sans-serif; /* Altera a fonte */
  font-size: 14px; /* Altera o tamanho da fonte */
}


</style>
<body>
    
 <div class="container">
    <form action="crudassento.php" method="get">
    <p class="informacoes"> Digite a fileira do assento: </p>
    <p> <input type="number" name="fileira" class="dados" require></p>
    <p class="informacoes"> Digite o número do assento: </p>
    <p> <input type="number" name="numero" class="dados" require></p>
    <p class="informacoes"> Selecione o numero da sessão: </p>
    <p>
        <select name="numero_s" class="dados" require>
            <?php
            //Loop que gera as opções do select
            foreach ($numero_s as $numero) {
                echo "<option value=\"$numero\">$numero</option>";
            }
            ?>
        </select>
    </p>
    <p class="informacoes"> Selecione a sala da Sessao: </p>
      <p>
        <select name="sala_s" id="" class="dados">
            <?php
            foreach($sala_s as $sala){
                echo"<option value=\"$sala\">$sala</option>";

            }
            ?>
        </select>
      </p>
        <input TYPE="hidden" NAME="form_submit" VALUE="OK"> 
        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar"> 
        <button class="button"><a href="../index.php">Voltar</a></button>
    </form>
 </div>
</body>
</html>