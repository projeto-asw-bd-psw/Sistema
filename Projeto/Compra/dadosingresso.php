<?php
require_once('conexao.php');
        
if(isset($_GET['enviar'])){
    if(isset($_GET['num_sessao'])) {
        ##dados recebidos pelo metodo GET
        $sessao = $_GET["num_sessao"];

        $sql = "INSERT INTO Ingresso (num_sessao) VALUES(:sessao)";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ## Associa o parâmetro :sessao com o valor de $sessao
        $sqlcombanco->bindParam(":sessao", $sessao, PDO::PARAM_INT);

        try {
            ##executa o sql no banco de dados
            $sqlcombanco->execute();
            // Redirecionar para a página "assento.php"
            header("Location: assento.php");
            exit(); // Certifique-se de sair para evitar qualquer saída adicional
        } catch (PDOException $e) {
            echo "Erro ao inserir no banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Selecione pelo menos uma sessão.";
    }
}
?>