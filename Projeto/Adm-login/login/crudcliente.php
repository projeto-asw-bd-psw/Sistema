<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');



##cadastrar
if(isset($_POST['cadastrar'])){
        ##dados recebidos pelo metodo POST
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $senha = $_POST ["senha"];

        
        // Verificar se o CPF ou e-mail já estão cadastrados
        $stmt = $conexao->prepare("SELECT * FROM Administrador WHERE cpf = :cpf OR email = :email");
        $stmt->bindValue(":cpf", $cpf);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
    if ($result) {
        echo "Erro: CPF ou e-mail já estão cadastrados.";
    } else {
        // Verificar se a senha atende às restrições
        if (!preg_match('/[A-Z]/', $senha) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $senha) || strlen($senha) < 6) {
            echo "Erro: A senha deve conter pelo menos uma letra maiúscula, um caractere especial e ter no mínimo 6 caracteres.";
        } else {
            // Código SQL para inserir o novo administrador
            $sql = "INSERT INTO Administrador(nome,email,cpf,senha) 
                    VALUES(:nome, :email, :cpf, :senha)";
                
                  // Preparar o SQL e executar
            $sqlcombanco = $conexao->prepare($sql);
            $sqlcombanco->bindValue(':nome', $nome);
            $sqlcombanco->bindValue(':email', $email);
            $sqlcombanco->bindValue(':cpf', $cpf);
            $sqlcombanco->bindValue(':senha', $senha);
           
        ##codigo SQL
        $sql = "INSERT INTO Cliente (nome,email,cpf,senha) 
                VALUES('$nome','$email','$cpf','$senha')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> O Cliente(a)
                $nome foi incluido(a) com sucesso!!"; 
                echo " <button class='button'><a href='logincliente.php'>voltar</a></button>";
            }
        }
    }
}

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf= $_POST["cpf"];
    $senha= $_POST["senha"];
    $idcliente= $_POST["idcliente"];

      ##codigo sql
    $sql = "UPDATE  Cliente SET nome= :nome, email= :email, cpf= :cpf, senha= :senha WHERE idcliente= :idcliente ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
    $stmt->bindParam(':idcliente',$idcliente, PDO::PARAM_INT);


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> O cliente(a)
             $nome foi alterado(a) com sucesso!!"; 

            echo " <button class='button'><a href='cadadm.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_POST['excluir'])){
    $idcliente = $_POST['idcliente'];
    $sql ="DELETE FROM Cliente  WHERE idcliente={$idcliente}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> O cliente(a)
             $idcliente foi excluido(a)!!"; 

            echo " <button class='button'><a href='listaaluno.php'>voltar</a></button>";
        }

}

        
?>