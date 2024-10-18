<?php
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

// Obter ID do serviço da URL
$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar dados do serviço específico
$sql = "SELECT * FROM profissionais WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $serviceId);
$stmt->execute();
$result = $stmt->get_result();

// Início da página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Serviço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header, .footer {
            background-color: #734173;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #734173;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
        }
        .details .price {
            font-weight: bold;
            color: #8B4F8B;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Detalhes do Serviço</h1>
    </div>

    <div class="container">
        <?php
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='details'>";
            echo "<h2>" . htmlspecialchars($row['especialidade']) . "</h2>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($row['nome']) . "</p>";
            echo "<p><strong>CPF:</strong> " . htmlspecialchars($row['cpf']) . "</p>";
            echo "<p><strong>RG:</strong> " . htmlspecialchars($row['rg']) . "</p>";
            echo "<p><strong>Habilitação:</strong> " . htmlspecialchars($row['habilitacao']) . "</p>";
            echo "<p><strong>Data de Nascimento:</strong> " . htmlspecialchars($row['data_nascimento']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Celular:</strong> " . htmlspecialchars($row['celular']) . "</p>";
            echo "<p><strong>Endereço:</strong> " . htmlspecialchars($row['endereco']) . ", " . htmlspecialchars($row['bairro']) . ", " . htmlspecialchars($row['cidade']) . " - " . htmlspecialchars($row['estado']) . "</p>";
            echo "<p><strong>Valor do Serviço:</strong> <span class='price'>" . htmlspecialchars($row['valor_servico']) . "</span></p>";
            echo "<p><strong>Desconto:</strong> " . htmlspecialchars($row['valor_desconto']) . " (Percentual: " . htmlspecialchars($row['percentual_desconto']) . "%)</p>";

            // Exibir o campo documentos (BLOB) de forma simplificada
            echo "<p><strong>Documentos:</strong> ";
            if (!empty($row['documentos'])) {
                echo "<a href='path/to/your/uploads/" . htmlspecialchars($row['documentos']) . "' target='_blank'>Ver Documentos</a>";
            } else {
                echo "Nenhum documento";
            }
            echo "</p>";
            echo "</div>";
        } else {
            echo "<p>Serviço não encontrado.</p>";
        }

        // Fechar a conexão
        $conn->close();
        ?>
    </div>

    <div class="footer">
        <p>&copy; 2024 Terapia de Todos</p>
    </div>

</body>
</html>
