<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome= $_GET["nome"];
        $genero = $_GET["genero"];
        $data_lancamento= $_GET["data_lancamento"];
        $direcao= $_GET["direcao"];
        $duracao= $_GET["duracao"]; 
        $sinopse= $_GET["sinopse"]; 
        $roteiro= $_GET["roteiro"]; 
        $elenco= $_GET["elenco"]; 
        ##codigo SQL
        
    if (empty($nome) || empty($genero) || empty($data_lancamento) || empty($direcao) || empty($duracao) || empty($sinopse) || empty($roteiro) || empty($elenco)) {
        echo "<script>alert('Por favor, preencha todos os campos'); window.location.href = 'cadfilme.php';</script>";
    }
    else{
        $sql = "INSERT INTO Filme (nome, genero, data_lancamento, direcao, duracao, sinopse, roteiro, elenco) 
        VALUES('$nome',  '$genero', '$data_lancamento', '$direcao', '$duracao', '$sinopse', '$roteiro','$elenco')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " O Filme
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='listafilme.php'>voltar</a></button>";
            }
        }
    }
#######alterar
if(isset($_GET['update'])){

    ##dados recebidos pelo metodo POST
    $nome= $_GET["nome"];
    $genero = $_GET["genero"];
    $data_lancamento= $_GET["data_lancamento"];
    $direcao= $_GET["direcao"];
    $duracao= $_GET["duracao"]; 
    $sinopse= $_GET["sinopse"]; 
    $roteiro= $_GET["roteiro"]; 
    $elenco= $_GET["elenco"]; 
    $id=$_GET["id"];

      ##codigo sql
    $sql = "UPDATE  Filme SET nome= :nome, genero= :genero , data_lancamento= :data_lancamento, direcao= :direcao , duracao= :duracao, sinopse= :sinopse, roteiro= :roteiro, elenco= :elenco WHERE id= :id";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
      $stmt->bindParam(':genero',$genero, PDO::PARAM_STR); 
    $stmt->bindParam(':data_lancamento',$data_lancamento, PDO::PARAM_STR);
    $stmt->bindParam(':direcao',$direcao, PDO::PARAM_STR);
    $stmt->bindParam(':duracao',$duracao, PDO::PARAM_STR);
    $stmt->bindParam(':sinopse',$sinopse, PDO::PARAM_STR);
    $stmt->bindParam(':roteiro',$roteiro, PDO::PARAM_STR);
    $stmt->bindParam(':elenco',$elenco, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "O Filme
             $nome foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='listafilme.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM Filme WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " O Filme de id
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

} 
?>
