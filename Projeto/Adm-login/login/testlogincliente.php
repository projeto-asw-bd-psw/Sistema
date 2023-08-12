<?php
require_once('conexao.php');

if (isset($_POST['Logar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM Cliente WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if ($result->rowCount() > 0) { // Usando rowCount() para verificar o número de linhas
        echo "Login realizado com sucesso!";

        header('Location: ../../catalogo/catalogo.php');

        exit; // Importante adicionar "exit" após o redirecionamento para evitar problemas
    } else {
        echo "Erro no login. Verifique suas credenciais.";
    }
}
?>