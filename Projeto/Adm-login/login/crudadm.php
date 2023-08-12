<?php  
class conexao {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Outras propriedades e métodos da classe

    public function geraChaveAcesso($email) {
        // Implementação para gerar a chave de acesso
        // Certifique-se de implementar esse método corretamente
        $stmt = $this->pdo->prepare("SELECT * FROM Administrador WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = $rs;

        if($result){
            $chave = sha1($result["matricula"] . $result["senha"]);
            return $chave;
        } else {
            return false;
        }
    }
}
##permite acesso as variáveis dentro do arquivo conexao

require_once('conexao.php');
// Restante do código
##cadastrar
if(isset($_POST['cadastrar'])) {
    ##dados recebidos pelo método POST
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

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

    ## Código SQL
    $sql = "INSERT INTO Administrador(nome,email,cpf,senha) 
            VALUES('$nome','$email','$cpf','$senha')";

    ## Junta o código SQL à conexão do banco
    $sqlcombanco = $conexao->prepare($sql);

    ## Executa o SQL no banco de dados
    if($sqlcombanco->execute()) {
        echo "<strong>OK!</strong> O Administrador(a) $nome foi incluído(a) com sucesso!!"; 
        echo "<button class='button'><a href='loginadm.php'>voltar</a></button>";
    }
}
    }


}



if(isset($_POST['redefinir'])) {
    $email = $_POST["email"];
    $email = preg_replace('/[^[:alnum:]_.-@]/', '', $email);

    $conexaoObj = new conexao($conexao);  // Criar uma instância da classe conexao
    $chave = $conexaoObj->geraChaveAcesso($email);

    if($chave) {
        echo '<a href="http://localhost/anaclara/projeto-integrado/alterarsenha.php?chave=' . $chave . '">Link para redefinir senha</a>';
    } else {
        echo '<h1>Erro: Usuário não encontrado</h1>';
    }
}
   

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf= $_POST["cpf"];
    $senha= $_POST["senha"];
    $matricula= $_POST["matricula"];

      ##codigo sql
    $sql = "UPDATE  Administrador SET nome= :nome, email= :email, cpf= :cpf, senha= :senha, WHERE matricula= :matricula ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
    $stmt->bindParam(':senha',$senha, PDO::PARAM_STR);
    $stmt->bindParam(':matricula',$matricula, PDO::PARAM_INT);




    if($stmt->execute())
        {
            echo " <strong>OK!</strong> O administrador(a)
             $nome foi alterado(a) com sucesso!!"; 

            echo " <button class='button'><a href='cadadm.php'>voltar</a></button>";
        }
    }
    if (isset($_POST['Logar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $sql = "SELECT * FROM Administrador WHERE email = '$email' AND senha = '$senha'";
        $result = $conexao->query($sql);
    
        if ($result->rowCount() > 0) { // Usando rowCount() para verificar o número de linhas
            echo "Login realizado com sucesso!";
    
            header('Location: ../Administrador/index.php');
    
            exit; // Importante adicionar "exit" após o redirecionamento para evitar problemas
        } else {
            echo "Erro no login. Verifique suas credenciais.";
        }
    }
    ?>