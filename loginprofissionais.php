<?php 
// Configuração de conexão com o banco de dados
$host = 'localhost'; 
$dbname = 'terapia_db'; 
$user = 'root'; 
$password = ''; 

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// Função de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        try {
            // Verificar no banco de profissionais
            $stmt_profissional = $pdo->prepare("SELECT * FROM profissionais WHERE email = :email");
            $stmt_profissional->bindParam(':email', $email);
            $stmt_profissional->execute();

            if ($stmt_profissional->rowCount() == 1) {
                $profissional = $stmt_profissional->fetch(PDO::FETCH_ASSOC);

                if (password_verify($senha, $profissional['senha'])) {
                    session_start();
                    $_SESSION['id'] = $profissional['id'];
                    $_SESSION['nome'] = $profissional['nome'];

                    // Salvando as iniciais do nome na sessão
                    $iniciais = strtoupper(substr($profissional['nome'], 0, 1));
                    if (strpos($profissional['nome'], ' ') !== false) {
                        $iniciais .= strtoupper(substr(strrchr($profissional['nome'], ' '), 1, 1));
                    }
                    $_SESSION['iniciais'] = $iniciais;

                    header('Location: home.php');
                    exit();
                } else {
                    echo "<p class='error'>Senha incorreta para profissional!</p>";
                }
            } else {
                echo "<p class='error'>Nenhum profissional encontrado com esse e-mail!</p>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "<p class='error'>Por favor, preencha todos os campos!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Profissional - Terapia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            color: #7b467b;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7b467b;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #5e345e;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .cliente-link {
            text-align: center;
            margin-top: 20px;
        }
        .cliente-link a {
            color: #7b467b;
            text-decoration: none;
            font-weight: bold;
        }
        .cliente-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login Profissional</h1>
    <form method="POST" action="login_profissional.php">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="Entrar">

        <div class="cliente-link">
            <p>Não é profissional? <a href="login.php">Sou Cliente</a></p>
        </div>
    </form>
</div>

</body>
</html>
