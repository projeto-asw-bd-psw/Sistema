<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        /* Styling for the body and container */
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 500px;
  margin: 50px auto;
  background-color: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Styling for the header (topo) */
.topo {
  /* Add your styles for the header if needed */
}

/* Styling for the form */
form {
  display: flex;
  flex-direction: column;
}

/* Styling for the input fields and labels */
.box {
  font-size: 14px;
  font-weight: bold;
}

.id {
  width: 90%;
  padding: 10px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Styling for the submit button */
.botao {
  background-color: #4caf50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
  border-radius: 5px;
}

/* Styling for the "Voltar" button */
.button {
  background-color: #ccc;
  border: none;
  color: #000;
  padding: 10px 20px;
  margin-top: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 5px;
  cursor: pointer;
}

/* Styling for the link inside the "Voltar" button */
.button a {
  color: #000;
  text-decoration: none;
}

/* Hover effect for buttons */
.botao:hover, .button:hover {
  opacity: 0.8;
}

    </style>
    
</body>
</html>

<body>
  <div class="container">
<div class="topo"></div>
  
  <form method="POST" action="crudadm.php">
    
<div class="meio">
<h2>CADASTRO DO ADMINISTRADOR</h2>

    <p class="box">NOME COMPLETO:<br></p>
    <p><input type="text" name= "nome" class="id" /></p>

    <p class="box">EMAIL:<br></p>
    <p><input type="email" name= "email" class="id"/> </p>

    <p class="box">CPF:<br></p>
    <p><input type="text" name= "cpf" class="id"/> </p>

    <p class="box">SENHA:<br></p>
    <p><input type="password" name= "senha" class="id"/> </p>
    

    <input type="submit" name="cadastrar" class="botao" value="cadastrar">
</form>

     <button class="button"><a href="../index.php">Voltar</a></button>
     </div>
</body>
</html>