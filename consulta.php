<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
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

// Verificar se um filtro de região foi aplicado
$estadoFiltro = isset($_GET['estado']) ? $_GET['estado'] : '';

// Consultar dados dos profissionais com base no filtro
$sql = "SELECT id, nome, especialidade, valor_servico, estado FROM profissionais";
if ($estadoFiltro) {
    $sql .= " WHERE estado = ?";
}

$stmt = $conn->prepare($sql);
if ($estadoFiltro) {
    $stmt->bind_param("s", $estadoFiltro);
}
$stmt->execute();
$result = $stmt->get_result();

// Consultar as regiões disponíveis para filtro
$regioesSql = "SELECT DISTINCT estado FROM profissionais";
$regioesResult = $conn->query($regioesSql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Cadastrados</title>
    <?php include 'header.php'; ?>
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
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .service-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .service-card h2 {
            margin-top: 0;
            color: #734173;
        }
        .service-card p {
            margin: 5px 0;
        }
        .service-card a {
            color: #734173;
            text-decoration: none;
            font-weight: bold;
        }
        .service-card a:hover {
            text-decoration: underline;
        }
        .filter-form {
            margin-bottom: 20px;
        }
        .filter-form select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Serviços Cadastrados</h1>
    </div>

    <div class="container">
        <div class="filter-form">
            <form method="get" action="">
                <label for="estado">Filtrar por região:</label>
                <select name="estado" id="estado">
                    <option value="">Todos</option>
                    <?php
                    if ($regioesResult) {
                        while ($row = $regioesResult->fetch_assoc()) {
                            $estado = htmlspecialchars($row['estado']);
                            $selected = ($estado === $estadoFiltro) ? 'selected' : '';
                            echo "<option value=\"$estado\" $selected>$estado</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </div>

        <?php
        if ($result) {
            if ($result->num_rows > 0) {
                // Exibir os dados em cartões
                while($row = $result->fetch_assoc()) {
                    echo "<div class='service-card'>";
                    echo "<h2>" . htmlspecialchars($row['especialidade']) . "</h2>";
                    echo "<p><strong>Nome:</strong> " . htmlspecialchars($row['nome']) . "</p>";
                    echo "<p><strong>Valor:</strong> " . htmlspecialchars($row['valor_servico']) . "</p>";
                    echo "<p><strong>Região:</strong> " . htmlspecialchars($row['estado']) . "</p>";
                    echo "<a href='detalhes.php?id=" . $row['id'] . "'>Ver Detalhes</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum serviço cadastrado.</p>";
            }
        } else {
            echo "<p>Erro ao consultar os dados: " . $conn->error . "</p>";
        }

        // Fechar a conexão
        $conn->close();
        ?>
    </div>

  
    <?php include 'footer.php'; ?>

</body>
</html>
