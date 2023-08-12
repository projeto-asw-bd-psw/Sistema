<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do filme</title>
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
  background-color: #f0f0f0;
  margin: 30px;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #ffffff; /* Cor de fundo para o formulário */
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
  margin-left: 180px;
}

#cadastrar:hover {
  background-color: #de8531;
}

select.dados {
  width: 100%;
  padding: 8px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-family: Arial, sans-serif; 
  font-size: 14px; 
}

input[type="date"].dados {
  width: 100%;
  padding: 8px;
  margin: 6px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-family: Arial, sans-serif; 
  font-size: 14px; 
}

input[type="hidden"].dados {
  display: none;
}

</style>
<body>
    <div class="container">
  <form action="crudfilme.php" method="get">
  <p class="informacoes"> Digite o nome do filme: </p>
            <p> <input type="text" name="nome" class="dados" require></p>
           <p class="informacoes"> Escolha o genero do filme: </p>  
           <select name="genero" id="" class="dados">
           <option value="">Selecione</option>
           <option value="acao">Ação</option>
           <option value="romance">Romance</option>
           <option value="comedia">Comédia</option>
           <option value="drama">Drama</option>
           <option value="fc">Ficção científica</option>
            </select>
            <p class="informacoes"> Digite o elenco do filme: </p>
            <p> <input type="text" name="elenco" class="dados" require ></p>
            <p class="informacoes"> Digite roteiro do filme: </p>
            <p> <input type="text" name="roteiro" class="dados" require ></p>
            <p class="informacoes"> Digite a data de lançamento do filme: </p>
            <p> <input type="date" name="data_lancamento" class="dados" require ></p>
            <p class="informacoes"> Digite a sinopse do filme: </p>
            <p> <input type="text" name="sinopse" class="dados" require ></p>
            <p class="informacoes"> Digite a duração do filme: </p>
            <p> <input type="text" name="duracao" class="dados" require ></p>
            <p class="informacoes"> Digite a direção do filme: </p>
            <p> <input type="text" name="direcao" class="dados" require ></p>
            <input TYPE="hidden" NAME="form_submit" VALUE="OK"> 
        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar"> 
        <button class="button"><a href="../index.php">Voltar</a></button>
  </form>
    </div>
</body>
</html>