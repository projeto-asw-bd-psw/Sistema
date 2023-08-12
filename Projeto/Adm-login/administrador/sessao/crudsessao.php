<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');

$sql_filme= "SELECT id FROM Filme";
$result_filme= $conexao->query($sql_filme);

$filme_s= array();

if($result_filme){
    if($result_filme->rowCount()>0){
        while($row_filme= $result_filme->fetch(PDO::FETCH_ASSOC)){
            $filme_s[]=$row_filme["id"];
        } }
        else{
            
        echo" <br> A tabela filme vazia nao possui um filme cadastrado";
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
        $numero= $_GET["numero"];
        $horario = $_GET["horario"];
        $sala= $_GET["sala"];
        $filme_s=$_GET["filme_s"];
         $valor=$_GET["valor"];
        $data=$_GET["data"];
       
        ##codigo SQL
        if (empty($numero) || empty($horario) || empty($sala)) {
            echo "<script>alert('Por favor, preencha todos os campos'); window.location.href = 'cadsessao.php';</script>";
        } elseif ($numero > 50) {
            echo "<script>alert('O número da sessao não pode ser maior que 50.');
            window.location.href = 'cadsessao.php';
            </script>";
        } elseif($valor > 40){
            echo "<script>alert('O valor da sessao não pode ser maior que 40 reais.');
            window.location.href = 'cadsessao.php';
            </script>";
        }
         else {
        $sql = "INSERT INTO Sessao (numero, horario, sala, id, valor, data) 
        VALUES('$numero',  '$horario', '$sala', '$filme_s', '$valor', '$data')";  
         
       
        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute()){          

            echo "<script>alert('A sessão de numero $numero foi incluida com sucessso!!');
            window.location.href = 'listasessao.php';
            </script>";
            }
        }
}

#######alterar
if(isset($_GET['update'])){

    ##dados recebidos pelo metodo POST
    $numero= $_GET["numero"];
    $horario= $_GET["horario"];
    $sala=$_GET["sala"];
    $valor=$_GET["valor"];
    $data=$_GET["data"];
    $idsessao= $_GET["idsessao"];
    
        $sql = "UPDATE  Sessao SET numero= :numero, horario= :horario , sala= :sala, valor= :valor, data=:data WHERE idsessao= :idsessao";
   
        ##junta o codigo sql a conexao do banco
        $stmt = $conexao->prepare($sql);
    
        ##diz o paramentro e o tipo  do paramentros
        $stmt->bindParam(':idsessao',$idsessao, PDO::PARAM_INT);
        $stmt->bindParam(':numero',$numero, PDO::PARAM_INT);
          $stmt->bindParam(':sala',$sala, PDO::PARAM_INT); 
          $stmt->bindParam(':horario',$horario, PDO::PARAM_STR); 
          $stmt->bindParam(':valor',$valor, PDO::PARAM_INT); 
          $stmt->bindParam(':data',$data, PDO::PARAM_STR); 
        $stmt->execute();
    
        if ($stmt->execute()) {
            echo "<script>alert('A sessão de id $idsessao foi alterada com sucessso!!');
            window.location.href = 'listasessao.php';
            </script>";
        } else {
            echo "<script>alert('Erro ao atualizar sessão!!');
            window.location.href = 'listasessao.php';
            </script>";
        }
        }

##Excluir
if(isset($_GET['excluir'])){
    $idsessao = $_GET['idsessao'];
    $sql ="DELETE FROM Sessao WHERE idsessao={$idsessao}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " A sessao de id
             $idsessao foi excluida!!!"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

}

?>