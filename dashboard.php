<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "terapia_db";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Função para aprovar ou rejeitar cadastros
if (isset($_POST['action'])) {
    $id = $_POST['id'];
    if ($_POST['action'] == 'aprovar') {
        // Puxar os dados da tabela 'aprovações'
        $sql = "SELECT * FROM aprovacoes WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Inserir os dados na tabela 'profissionais'
            $sql_insert = "INSERT INTO profissionais (nome, cpf, rg, habilitacao, data_nascimento, email, celular, senha, endereco, bairro, cidade, estado, especialidade, valor_servico, percentual_desconto, valor_desconto, documentos)
            VALUES ('" . $row['nome'] . "', '" . $row['cpf'] . "', '" . $row['rg'] . "', '" . $row['habilitacao'] . "', '" . $row['data_nascimento'] . "', '" . $row['email'] . "', '" . $row['celular'] . "', '" . $row['senha'] . "', '" . $row['endereco'] . "', '" . $row['bairro'] . "', '" . $row['cidade'] . "', '" . $row['estado'] . "', '" . $row['especialidade'] . "', '" . $row['valor_servico'] . "', '" . $row['percentual_desconto'] . "', '" . $row['valor_desconto'] . "', '" . $row['documentos'] . "')";

            if ($conn->query($sql_insert) === TRUE) {
                // Excluir o cadastro da tabela 'aprovações' após aprovação
                $sql_delete = "DELETE FROM aprovacoes WHERE id = $id";
                $conn->query($sql_delete);
                echo "Cadastro aprovado e transferido para 'profissionais'.";
            } else {
                echo "Erro ao aprovar cadastro: " . $conn->error;
            }
        }
    } elseif ($_POST['action'] == 'rejeitar') {
        // Rejeitar cadastro (remover da tabela 'aprovações')
        $sql_delete = "DELETE FROM aprovações WHERE id = $id";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Cadastro rejeitado e removido.";
        } else {
            echo "Erro ao rejeitar cadastro: " . $conn->error;
        }
    }
}

// Exibir todos os cadastros pendentes da tabela 'aprovações'
$sql = "SELECT * FROM aprovacoes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Aprovações</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        button {
            padding: 10px;
            margin: 5px;
        }
        .document-link {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Dashboard de Aprovações</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Habilitação</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Especialidade</th>
                <th>Valor do Serviço</th>
                <th>Desconto (%)</th>
                <th>Valor com Desconto</th>
                <th>Documentos</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['cpf'] ?></td>
                        <td><?= $row['rg'] ?></td>
                        <td><?= $row['habilitacao'] ?></td>
                        <td><?= $row['data_nascimento'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['celular'] ?></td>
                        <td><?= $row['endereco'] ?>, <?= $row['bairro'] ?>, <?= $row['cidade'] ?>, <?= $row['estado'] ?></td>
                        <td><?= $row['especialidade'] ?></td>
                        <td><?= $row['valor_servico'] ?></td>
                        <td><?= $row['percentual_desconto'] ?>%</td>
                        <td><?= $row['valor_desconto'] ?></td>
                        <td>
                            <?php if ($row['documentos']): ?>
                                <a class="document-link" href="abrir_documento.php?id=<?= $row['id'] ?>" target="_blank">Ver Documentos</a>
                            <?php else: ?>
                                Nenhum documento
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Botões para aprovar ou rejeitar -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="action" value="aprovar">Aprovar</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="action" value="rejeitar">Rejeitar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="14">Nenhum cadastro pendente.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
