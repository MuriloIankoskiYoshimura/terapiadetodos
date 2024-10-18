<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "terapia_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar ID da URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar dados do profissional
$sql = "SELECT * FROM profissionais WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$profissional = $result->fetch_assoc();

if (!$profissional) {
    echo "<p>Profissional não encontrado.</p>";
    exit();
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Profissional</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header, .footer {
            background-color: #734173;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        h1 {
            color: #734173;
            font-size: 36px;
            margin-bottom: 10px;
        }
        h2 {
            color: #8B4F8B;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .detail {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .detail strong {
            color: #8B4F8B;
        }
        .button {
            background-color: #8B4F8B;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
        }
        .button:hover {
            background-color: #7b467b;
        }
        .hidden-data {
            color: #555;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="header">
        <?php include 'header.php'; ?>
        <h1>Detalhes do Profissional</h1>
    </div>

    <div class="container">
        <h2><?php echo htmlspecialchars($profissional['nome']); ?> - <?php echo htmlspecialchars($profissional['especialidade']); ?></h2>

        <div class="detail"><strong>Autenticação:</strong> Profissional autenticado ✅</div>

        <h3>Dados Pessoais</h3>
        <div class="detail"><strong>CPF:</strong> <span class="hidden-data">***.***.***-<?php echo substr($profissional['cpf'], -2); ?></span></div>
        <div class="detail"><strong>RG:</strong> <span class="hidden-data">***.***.***-<?php echo substr($profissional['rg'], -2); ?></span></div>
        <div class="detail"><strong>Data de Nascimento:</strong> <span class="hidden-data"><?php echo substr($profissional['data_nascimento'], 0, 7); ?>***</span></div>

        <h3>Endereço</h3>
        <div class="detail"><strong>Localização:</strong> 
            <a href="https://maps.google.com/?q=<?php echo urlencode($profissional['endereco'] . ', ' . $profissional['bairro'] . ', ' . $profissional['cidade'] . ', ' . $profissional['estado']); ?>" target="_blank" class="button">Ver no Mapa</a>
        </div>
        <div class="detail"><strong>Endereço:</strong> <?php echo htmlspecialchars($profissional['endereco']); ?></div>
        <div class="detail"><strong>Bairro:</strong> <?php echo htmlspecialchars($profissional['bairro']); ?></div>
        <div class="detail"><strong>Cidade:</strong> <?php echo htmlspecialchars($profissional['cidade']); ?></div>
        <div class="detail"><strong>Estado:</strong> <?php echo htmlspecialchars($profissional['estado']); ?></div>

        <h3>Contato</h3>
        <div class="detail"><strong>Celular:</strong> 
            <a href="https://wa.me/<?php echo htmlspecialchars($profissional['celular']); ?>" class="button">Enviar WhatsApp</a>
        </div>

        <h3>Consulta</h3>
        <div class="detail"><strong>Valor do Serviço:</strong> R$ <?php echo htmlspecialchars($profissional['valor_servico']); ?></div>
        <div class="detail"><strong>Desconto:</strong> <?php echo htmlspecialchars($profissional['percentual_desconto']); ?>% (R$ <?php echo htmlspecialchars($profissional['valor_desconto']); ?> de desconto)</div>
        <div class="detail"><strong>Documentos:</strong> <?php echo htmlspecialchars($profissional['documentos']); ?></div>

        <a href="index.php" class="button">Voltar</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 Terapia de Todos</p>
    </div>

</body>
</html>
