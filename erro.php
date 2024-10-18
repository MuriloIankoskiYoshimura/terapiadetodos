<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro no Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Ocorreu um Erro no Cadastro</h1>
    <?php
    // Exibir mensagem de erro baseada no tipo de erro
    if (isset($_GET['erro'])) {
        if ($_GET['erro'] == 'sql') {
            echo "<p>Houve um erro ao processar seu cadastro. Por favor, tente novamente mais tarde.</p>";
        } elseif ($_GET['erro'] == 'campos') {
            echo "<p>Por favor, preencha todos os campos obrigatórios.</p>";
        }
    }
    ?>
    <a href="cadastro.php">Voltar ao Cadastro</a>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Fundo da Página: Branco */
        }
        .header, .footer {
            background-color: #734173; /* Cor do Header e Footer: Vinho */
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #8B4F8B; /* Bordas do Container: Roxo Escuro */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        h1 {
            color: #734173; /* Títulos: Vinho */
            margin-top: 20px;
            text-align: center;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section label {
            display: block;
            margin-top: 10px;
            color: #000; /* Texto dos Labels: Preto */
        }
        .form-section input,
        .form-section select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #8B4F8B; /* Bordas dos Campos: Roxo Escuro */
            color: #000; /* Texto dos Campos: Preto */
        }
        .form-section input[type="submit"] {
            background-color: #8B4F8B; /* Botão: Roxo Escuro */
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .form-section input[type="submit"]:hover {
            background-color: #734173; /* Botão (Hover): Vinho */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Cadastro de Clientes</h1>
    </div>

    <form id="cadastro-cliente" action="processar-clientes.php" method="post">
        <div class="form-section">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>

            <label for="whatsapp">WhatsApp (opcional):</label>
            <input type="tel" id="whatsapp" name="whatsapp" placeholder="(XX) XXXXX-XXXX">

            <label for="validade-plano">Validade do Plano:</label>
            <select id="validade-plano" name="validade-plano" required>
                <option value="" disabled selected>Escolha a Validade</option>
                <option value="mensal">Mensal</option>
                <option value="anual">Anual (com 10% de desconto)</option>
            </select>

            <label for="plano">Plano:</label>
            <select id="plano" name="plano" required>
                <option value="" disabled selected>Selecione o Plano</option>
                <option value="single">Single</option>
                <option value="family">Family</option>
                <option value="superfamily">Superfamily</option>
            </select>

            <label for="valor-plano">Valor do Plano:</label>
            <input type="text" id="valor-plano" name="valor-plano" readonly>

            <input type="submit" value="Completar Cadastro">
        </div>
    </form>

    <div class="footer">
        <p>&copy; 2024 Cadastro de Clientes. Todos os direitos reservados.</p>
    </div>

    <script>
        document.getElementById('validade-plano').addEventListener('change', updatePlanoValue);
        document.getElementById('plano').addEventListener('change', updatePlanoValue);

        function updatePlanoValue() {
            const validadePlano = document.getElementById('validade-plano').value;
            const plano = document.getElementById('plano').value;
            const valorPlano = document.getElementById('valor-plano');

            let valorMensal, valorAnual;

            switch (plano) {
                case 'single':
                    valorMensal = 'R$19,90';
                    valorAnual = 'R$17,91';
                    break;
                case 'family':
                    valorMensal = 'R$29,90';
                    valorAnual = 'R$26,91';
                    break;
                case 'superfamily':
                    valorMensal = 'R$39,90';
                    valorAnual = 'R$35,91';
                    break;
                default:
                    valorMensal = '';
                    valorAnual = '';
            }

            if (validadePlano === 'anual') {
                valorPlano.value = `Anual: ${valorAnual}`;
            } else {
                valorPlano.value = `Mensal: ${valorMensal}`;
            }
        }
    </script>
</body>
</html>
