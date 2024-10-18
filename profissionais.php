<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Profissional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Fundo da Página: Branco */
        }
        .header, .footer {
            background-color: #ffffff; /* Cor do Header e Footer: Roxo Escuro */
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
        }
        .header .help-icon {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2em;
            color: #fff;
            text-decoration: none;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #b48cb4; /* Bordas do Container: Roxo Claro */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        h1 {
            color: #7b467b; /* Títulos: Roxo Escuro */
            margin-top: 20px;
            text-align: center;
            position: relative;
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
            border: 1px solid #b48cb4; /* Bordas dos Campos: Roxo Claro */
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
        .login-data {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 4px;
        }
        .especialidades-escolhidas {
            margin-top: 20px;
        }
        .review-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .review-table th,
        .review-table td {
            border: 1px solid #b48cb4; /* Bordas da Tabela: Roxo Claro */
            padding: 10px;
            text-align: left;
        }
        .review-table th {
            background-color: #7b467b; /* Cabeçalho da Tabela: Roxo Escuro */
            color: white;
        }
        .review-table td {
            background-color: #f5f5f5; /* Fundo das Células: Cinza Claro */
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="header">
        <img src="" alt="">
        <h1>Cadastro de Profissional</h1>
    </div>

    <form id="cadastro-profissional" action="processar-profissionais.php" method="post" enctype="multipart/form-data">
        <!-- Etapa 1: Dados Pessoais -->
        <div class="form-section">
            <h2>Etapa 1: Dados Pessoais</h2>  
            <a href="ajuda.html" class="help-icon" title="Ajuda">Precisa de ajuda?</a> <!-- Ícone de Ajuda -->
            <div><br></div>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>

            <label for="rg">RG:</label>
            <input type="text" id="rg" name="rg" required>

            <label for="habilitacao">Habilitação (se necessário):</label>
            <input type="text" id="habilitacao" name="habilitacao">

            <label for="data-nascimento">Data de Nascimento:</label>
            <input type="date" id="data-nascimento" name="data-nascimento" required>

            <div class="login-data">
                <h2>Dados de Login:</h2>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="celular">Celular:</label>
                <input type="tel" id="celular" name="celular" placeholder="(XX) XXXXX-XXXX" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="repetir-senha">Repetir Senha:</label>
                <input type="password" id="repetir-senha" name="repetir-senha" required>
            </div>
        </div>

        <!-- Etapa 2: Endereço -->
        <div class="form-section">
            <h2>Etapa 2: Endereço</h2>

            <label for="CEP">CEP:</label>
            <input type="text" id="CEP" name="CEP" required>

            <label for="endereco">Endereço (coloque o cadastro da sua loka ):</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" required>
        </div>

        <!-- Etapa 3: Especialidade -->
        <div class="form-section">
            <h2>Etapa 3: Especialidade</h2>
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade" required>
                <option value="" disabled selected>Escolha a Especialidade</option>
                <option value="Ser linda">Ser linda</option>
                <option value="Vendedor de comida de rua">Vendedor de comida de rua</option>
                <option value="Especialidade 2">Especialidade 2</option>
                <option value="Massoterapia">Massoterapia</option>
                <option value="Acumputura">Acumputura</option>
                <option value="Reflexoterapia">Reflexoterapia</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>

            <label for="valor-servico">Valor do Serviço (sem desconto):</label>
            <input type="text" id="valor-servico" name="valor-servico" required oninput="formatarMoeda(this); calcularDesconto()">

            <label for="percentual-desconto">Porcentagem de Desconto:</label>
            <input type="text" id="percentual-desconto" name="percentual-desconto" required oninput="formatarPorcentagem(this); calcularDesconto()">

            <label for="valor-desconto">Valor com Desconto do serviço:</label>
            <input type="text" id="valor-desconto" name="valor-desconto" readonly>

            <label for="documentos">Documentos:</label>
            <input type="file" id="documentos" name="documentos[]" multiple>
        </div>

        <!-- Funções para Formatação e Cálculo -->
        <script>
            // Função para formatar valores monetários como R$ (reais)
            function formatarMoeda(campo) {
                let valor = campo.value.replace(/\D/g, '');
                if (valor) {
                    valor = (valor / 100).toFixed(2).replace('.', ',');
                    campo.value = `R$ ${valor}`;
                }
            }

            // Função para formatar valores em porcentagem
            function formatarPorcentagem(campo) {
                let valor = campo.value.replace(/\D/g, '');
                if (valor) {
                    campo.value = `${valor}%`;
                }
            }

            // Função para calcular o valor com desconto
            function calcularDesconto() {
                let valorServico = document.getElementById("valor-servico").value.replace("R$", "").replace(",", ".").trim();
                let percentualDesconto = document.getElementById("percentual-desconto").value.replace("%", "").trim();
                let valorDescontoField = document.getElementById("valor-desconto");

                if (valorServico && percentualDesconto) {
                    valorServico = parseFloat(valorServico); // Converte para número decimal
                    let desconto = (valorServico * (parseFloat(percentualDesconto) / 100)).toFixed(2);
                    let valorFinal = (valorServico - desconto).toFixed(2);

                    // Formatar o valor final com o padrão de moeda (R$)
                    valorDescontoField.value = `R$ ${valorFinal.replace(".", ",")}`;
                    atualizarTabela();
                } else {
                    valorDescontoField.value = 'R$ 0,00';
                    atualizarTabela();
                }
            }

            // Função para atualizar a tabela de revisão
            function atualizarTabela() {
                let especialidade = document.getElementById("especialidade").value;
                let valorDesconto = document.getElementById("valor-desconto").value;

                document.getElementById("especialidade-review").textContent = especialidade || '--';
                document.getElementById("valor-desconto-review").textContent = valorDesconto || '--';
            }
        </script>

        <input type="submit" value="Completar Cadastro">

        <!-- Tabela de Revisão -->
        <div class="form-section">
            <h2>Revisão dos Dados</h2>
            <table class="review-table">
                <thead>
                    <tr>
                        <th>Especialidade</th>
                        <th>Valor com Desconto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="especialidade-review">--</td>
                        <td id="valor-desconto-review">--</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </form>
</body>
</html>

<?php include 'footer.php'; ?>


