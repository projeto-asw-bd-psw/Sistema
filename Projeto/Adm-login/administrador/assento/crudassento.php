<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');
$sql_numero = "SELECT numero FROM Sessao";
$result_numero = $conexao->query($sql_numero);

$numero_s = array();

if ($result_numero) {
    if ($result_numero->rowCount() > 0) {
        while ($row_numero = $result_numero->fetch(PDO::FETCH_ASSOC)) {
            $numero_s[] = $row_numero["numero"];
        }
    } else {
        echo "A tabela Sessao não possui uma sessao cadastrada.";
    }
} else {
    $errorInfo = $conexao->errorInfo();
    echo "Erro ao executar a consulta SQL: " . $errorInfo[2];
    exit;
}

$sql_sala= "SELECT sala FROM Sessao";
$result_sala= $conexao->query($sql_sala);

$sala_s= array();

if($result_sala){
    if($result_sala->rowCount()>0){
        while($row_sala= $result_sala->fetch(PDO::FETCH_ASSOC)){
            $sala_s[]=$row_sala["sala"];
        } }
        else{
            
        echo" <br> A tabela Sessao vazia nao possui uma sala cadastrada";
        } 
    }
            else{
                $errorInfo=$conexao->errorInfo();
               echo "Erro ao executar a consulta SQL: " . $errorInfo[2];
                exit;
            }
        
    

##cadastrar
if(isset($_GET['cadastrar'])){
    ##dados recebidos pelo metodo GET
    $fileira= $_GET["fileira"];
    $numero= $_GET["numero"];
    $numero_Sessao= $_GET["numero_s"];
    $sala_s= $_GET["sala_s"];
    ##codigo SQL
    if (empty($fileira) || empty($numero) || empty($numero_Sessao) || empty($sala_s)) {
        echo"
        <script> 
       alert( 'Por favor, preencha todos os campos');
       window.location.href = 'cadassentos.php';
        </script>";

    } 
    elseif ($numero > 100 || $numero_Sessao > 100 || $sala_s > 100) {
        echo "<script>alert('Os registros não podem ser maiores que 100.');
        window.location.href = 'cadassentos.php';
        </script>";
     } 
     $sql_verifica_assento = "SELECT COUNT(*) FROM Assento WHERE numero = :numero AND sala_sessao = :sala_sessao AND numero_Sessao = :numero_Sessao";
     $stmt_verifica = $conexao->prepare($sql_verifica_assento);
     $stmt_verifica->bindParam(':numero', $numero, PDO::PARAM_INT);
     $stmt_verifica->bindParam(':sala_sessao', $sala_s, PDO::PARAM_INT);
     $stmt_verifica->bindParam(':numero_Sessao', $numero_Sessao, PDO::PARAM_INT);
     $stmt_verifica->execute();
 
     $assento_existente = $stmt_verifica->fetchColumn();
 
     if ($assento_existente > 0) {
         echo "<script>alert('Já existe um assento com o mesmo número, sala e sessão.');
         window.location.href = 'cadassentos.php';
         </script>";
        }

     else{
    $sql = "INSERT INTO Assento (fileira, numero, numero_Sessao, sala_sessao) VALUES('$fileira', '$numero', '$numero_Sessao', '$sala_s')";
     

    ##junta o codigo sql a conexao do banco
    $sqlcombanco = $conexao->prepare($sql);

    ##executa o sql no banco de dados
    if($sqlcombanco->execute()){
        echo " <script>
        alert('O Assento da fileira $fileira foi Incluido com sucesso!!');
             window.location.href = 'listaassento.php';
        </script>";
    }
}}
#######alterar
if(isset($_GET['update'])) {
    $fileira = $_GET["fileira"];
    $idassento = $_GET["idassento"];
    $numero = $_GET["numero"];
    $numero_Sessao = $_GET["numero_Sessao"];
    $sala_sessao = $_GET["sala_sessao"];

    ##codigo sql
    $sql = "UPDATE Assento SET fileira = :fileira, numero = :numero, numero_Sessao= :numero_Sessao, sala_sessao=:sala_sessao WHERE idassento = :idassento";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o parametro e o tipo do parametro
    $stmt->bindParam(':idassento', $idassento, PDO::PARAM_INT);
    $stmt->bindParam(':fileira', $fileira, PDO::PARAM_INT);
    $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
    $stmt->bindParam(':numero_Sessao', $numero_Sessao, PDO::PARAM_INT);
    $stmt->bindParam(':sala_sessao', $sala_sessao, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo " O assento $numero da Sessao $numero_Sessao foi Alterada com sucesso!!!";
        echo "<button class='button'><a href='listaassento.php'>voltar</a></button>";
    } else {
        echo "Erro ao atualizar o assento.";
    }
}


##Excluir
if(isset($_GET['excluir'])){
    $idassento = $_GET['idassento'];
    $sql ="DELETE FROM Assento WHERE idassento={$idassento}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " O Assento de id
             $idassento foi excluido!!!"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

} 
?>