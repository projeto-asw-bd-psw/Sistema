<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Sessão</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
   
</head> 
<style>
    /* Reset de estilos padrão para garantir consistência */
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
.dinheiro {
  width: 92%;
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
   <form action="crudsessao.php" method="get">
   <p class="informacoes"> Digite o número da sessão: </p>
            <p> <input type="number" name="numero" class="dados" require></p>
            <p class="informacoes"> Digite o horario da Sessao: </p>
            <p> <input type="time" name="horario" class="dados" require></p>
            <p class="informacoes"> Selecione a sala da sessão: </p>
            <select name="sala" id="" class="dados" require >
           <option value=""></option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
            </select>
            <p  class="informacoes">Selecione o id do filme da sessão</p>
            <select name="filme_s" class="dados" require>
            <?php
            //Loop que gera as opções do select
            require_once('./crudsessao.php');
            foreach ($filme_s as $filme) {
                echo "<option value=\"$filme\">$filme</option>";
            }
            ?>
        </select>
        <p class="informacoes"> Digite o valor da sessão: </p>
        <label for="dinheiro">R$</label><input type="text" id="dinheiro" name="valor" class="dinheiro" />

            <p class="informacoes"> Digite a data da sessão: </p>
            <p> <input type="date" name="data" class="dados" require></p>
    
            <input TYPE="hidden" NAME="form_submit" VALUE="OK"> 
        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar"> 
        <button class="button"><a href="../index.php">Voltar</a></button>
   </form>
   
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('.dinheiro').mask('#.##0,00', {reverse: true});
        });

    </script>
    
</body>
</html>