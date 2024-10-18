<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";  // Nome do servidor (mude se necessário)
$username = "root";  // Seu nome de usuário do banco de dados
$password = "";    // Sua senha do banco de dados
$dbname = "terapia_db";  // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Receber dados do formulário via POST
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;  // Substituir whatsapp por email
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;  // Novo campo de senha
    $validade_plano = isset($_POST['validade-plano']) ? $_POST['validade-plano'] : null;
    $plano = isset($_POST['plano']) ? $_POST['plano'] : null;
    $valor_plano = isset($_POST['valor-plano']) ? $_POST['valor-plano'] : null;

    // Validação simples para garantir que os campos obrigatórios foram preenchidos
    if ($nome && $cpf && $telefone && $email && $senha && $validade_plano && $plano && $valor_plano) {

        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        // Query para inserir os dados no banco
        $sql = "INSERT INTO clientes (nome, cpf, telefone, email, senha, validade_plano, plano, valor_plano) 
                VALUES ('$nome', '$cpf', '$telefone', '$email', '$senha_hash', '$validade_plano', '$plano', '$valor_plano')";

        // Verificar se a query foi bem-sucedida
        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página de obrigado
            header("Location: obrigado.html");
            exit();  // Para garantir que o script seja encerrado após o redirecionamento
        } else {
            // Redirecionar para a página de erro
            header("Location: erro.php");
            exit();  // Para garantir que o script seja encerrado após o redirecionamento
        }
    } else {
        // Redirecionar para a página de erro por dados incompletos
        header("Location: erro.php");
        exit();
    }
}

// Fechar conexão
$conn->close();
?>
