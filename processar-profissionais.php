<?php 
// Configurações de conexão com o banco de dados
$servername = "localhost";  // Nome do servidor
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
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
    $dataNascimento = isset($_POST['data-nascimento']) ? $_POST['data-nascimento'] : null;
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $especialidade = isset($_POST['especialidade']) ? $_POST['especialidade'] : null;
    $valorServico = isset($_POST['valor-servico']) ? $_POST['valor-servico'] : null;
    $percentualDesconto = isset($_POST['percentual-desconto']) ? $_POST['percentual-desconto'] : null;
    $valorDesconto = isset($_POST['valor-desconto']) ? $_POST['valor-desconto'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $repetirSenha = isset($_POST['repetir-senha']) ? $_POST['repetir-senha'] : null;

    // Diretório de upload
    $uploadDir = 'uploads/';
    $uploadedFiles = [];

    // Verificar se o diretório de upload existe, caso contrário, criá-lo
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Processar arquivos enviados
    if (isset($_FILES['documentos']) && $_FILES['documentos']['error'][0] == 0) {
        foreach ($_FILES['documentos']['name'] as $key => $name) {
            $tmpName = $_FILES['documentos']['tmp_name'][$key];
            $targetFile = $uploadDir . basename($name);

            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedFiles[] = $targetFile;
            }
        }
    }

    // Converter o array de arquivos para uma string separada por vírgulas
    $filesList = implode(',', $uploadedFiles);

    // Validação simples para garantir que os campos obrigatórios foram preenchidos
    if ($nome && $cpf && $email && $celular && $dataNascimento && $endereco && $bairro && $cidade && $estado && $especialidade && $valorServico && $percentualDesconto && $valorDesconto && $senha && $repetirSenha) {

        // Verificar se as senhas coincidem
        if ($senha !== $repetirSenha) {
            header("Location: erro.php?error=senhas_diferentes");
            exit();
        }

        // Criptografar a senha usando password_hash
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Verificar se o CPF já existe na tabela "aprovacoes"
        $stmt = $conn->prepare("SELECT cpf FROM aprovacoes WHERE cpf = ?");
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // CPF já existe
            header("Location: erro.php?error=cpf_existente");
            exit();
        }
        $stmt->close();

        // Preparar a consulta para inserir na tabela "aprovacoes"
        $stmt = $conn->prepare("INSERT INTO aprovacoes (nome, cpf, email, celular, data_nascimento, endereco, bairro, cidade, estado, especialidade, valor_servico, percentual_desconto, valor_desconto, documentos, senha) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        // Definir os tipos dos parâmetros (s = string)
        $stmt->bind_param("sssssssssssssss", $nome, $cpf, $email, $celular, $dataNascimento, $endereco, $bairro, $cidade, $estado, $especialidade, $valorServico, $percentualDesconto, $valorDesconto, $filesList, $senhaHash);

        // Executar a consulta
        if ($stmt->execute()) {
            // Redirecionar para a página de obrigado
            header("Location: obrigado.html");
            exit();
        } else {
            // Redirecionar para a página de erro
            header("Location: erro.php");
            exit();
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
