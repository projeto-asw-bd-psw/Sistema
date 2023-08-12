
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Reset some default styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
}

.container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

.box {
  font-weight: bold;
}

.id {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
}

.botao {
  padding: 10px 20px;
  background-color: #243757;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
}

.botao:hover {
  background-color: #0056b3;
}

a {
  display: block;
  text-align: center;
  margin-top: 10px;
  color: #007bff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

</style>
<body>


<div class="container">
  
  <form method="POST" action="testlogincliente.php">
    
<div class="meio">
<h2>LOGIN</h2>
    
    <p class="box">EMAIL:<br></p>
    <p><input type="email" name= "email" class="id"/> </p>

    <p class="box">SENHA:<br></p>
    <p><input type="password" name= "senha" class="id"/> </p>
    

    <input type="submit" name="Logar" class="botao" value="Logar">
</form>


<a href="cadcliente.php">Ainda não possui um cadastro?</a>
<a href="redsenha.php">Esqueceu a senha?</a>

 

</body>
</html>