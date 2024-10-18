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

    // Receber dados do formulário via POST e sanitizar
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    // Validar se o email e senha foram fornecidos
    if ($email && $senha) {

        // Query para buscar o usuário com o email fornecido
        $sql = "SELECT senha FROM clientes WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // O email existe, então verificar a senha
            $row = $result->fetch_assoc();
            $senha = $row['senha'];

            // Verificar a senha fornecida com o hash armazenado
            if (password_verify($senha)) {
                // Senha está correta
                header("Location: sucesso.html");  // Redirecionar para a página de sucesso
                exit();
            } else {
                // Senha incorreta
                header("Location: erro.php?msg=Senha incorreta");
                exit();
            }
        } else {
            // Email não encontrado
            header("Location: erro.php?msg=Email não encontrado");
            exit();
        }
    } else {
        // Dados incompletos
        header("Location: erro.php?msg=Dados incompletos");
        exit();
    }
}

// Fechar conexão
$conn->close();
?>
