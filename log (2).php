<?php
// Configuração de conexão com o banco de dados
$host = 'localhost'; // ou o IP do servidor
$dbname = 'terapia_db';
$user = 'root'; // seu usuário do MySQL
$password = ''; // sua senha do MySQL

try {
    // Criar uma nova conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Definir o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibir erro de conexão, se houver
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// Função de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se os campos foram preenchidos
    if (!empty($email) && !empty($senha)) {
        try {
            // Preparar a consulta SQL
            $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Verificar se o usuário foi encontrado
            if ($stmt->rowCount() == 1) {
                // Obter o registro do banco de dados
                $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar a senha (assumindo que está armazenada em hash)
                if (password_verify($senha, $cliente['senha'])) {
                    // Login bem-sucedido
                    session_start();
                    $_SESSION['id'] = $cliente['id'];
                    $_SESSION['nome'] = $cliente['nome'];
                    echo "Login realizado com sucesso! Bem-vindo, " . $cliente['nome'];
                    // Redirecionar para a página desejada após o login
                    // header('Location: pagina_desejada.php');
                } else {
                    echo "Senha incorreta!";
                }
            } else {
                echo "Nenhum usuário encontrado com esse e-mail.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Animation CSS | code_wars_official</title>
    <link rel="stylesheet" href="style.css">
    <style>


{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #b590b5;
    overflow: hidden;
}

.login-box {
    position: relative;
    width: 400px;
    height: 450px;
    background:#734173;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

h2 {
    font-size: 2em;
    color: #fff;
    text-align: center;
    transition: .5s ease;
}

.input-check:checked~h2 {
    color: #e2d3e2;
    text-shadow:
        0 0 15px #e2d3e2,
        0 0 30px #e2d3e2;
}

.input-box {
    position: relative;
    width: 310px;
    margin: 30px 0;
}

.input-box .input-line {
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2.5px;
    background: #fff;
    transition: .5s ease;
}

.input-check:checked~.input-box .input-line {
    background: #e2d3e2;
    box-shadow: 0 0 10px #00f7ff;
}

.input-box label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #fff;
    pointer-events: none;
    transition: .5s ease;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: -5px;
}

.input-check:checked~.input-box label {
    color:  #e2d3e2;
    text-shadow: 0 0 10px  #e2d3e2;
}

.input-box input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
    padding: 0 35px 0 5px;
    transition: .5s ease;
}

.input-check:checked~.input-box input {
    color:  #e2d3e2;
    text-shadow: 0 0 5px  #e2d3e2;
}

.input-box .icon {
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    line-height: 57px;
    transition: .5s ease;
}

.input-check:checked~.input-box .icon {
    color:  #e2d3e2;
    filter: drop-shadow(0 0 5px  #e2d3e2);
}

.remember-forgot {
    color: #fff;
    font-size: .9em;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;
    transition: .5s ease;
}

.input-check:checked~.remember-forgot {
    color: #e2d3e2;
    text-shadow: 0 0 10px #e2d3e2;
}

.remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
    transition: .5s ease;
}

.input-check:checked~.remember-forgot label input {
    accent-color: #e2d3e2;
}

.remember-forgot a {
    color: #fff;
    text-decoration: none;
    transition: color .5s ease;
}

.remember-forgot a:hover {
    text-decoration: underline;
}

.input-check:checked~.remember-forgot a {
    color: #e2d3e2;
}

button {
    width: 100%;
    height: 40px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    cursor: pointer;
    font-size: 1em;
    color: #191919;
    font-weight: 500;
    transition: .5s ease;
}

.glowing-light {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 500px;
    height: 10px;
    background: #e2d3e2;
    border-radius: 20px;
}

.input-check:checked~button {
    background: #e2d3e2;
    box-shadow: 0 0 15px #e2d3e2, 0 0 15px #e2d3e2;
}

.register-link {
    color: #fff;
    font-size: .9em;
    text-align: center;
    margin: 25px 0 10px;
    transition: .5s ease;
}

.input-check:checked~.register-link {
    color: #e2d3e2;
    text-shadow: 0 0 10px #e2d3e2;
}

.register-link p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    transition: color .5s ease;
}

.register-link p a:hover {
    text-decoration: underline;
}

.input-check:checked~.register-link p a {
    color: #e2d3e2;
}


.light {
    position: absolute;
    top: -200%;
    left: 0;
    width: 100%;
    height: 950px;
    background: linear-gradient(to bottom, rgba(255, 255, 255, .3) -50%, rgba(255, 255, 255, 0) 90%);
    clip-path: polygon(20% 0, 80% 0, 100% 100%, 0 100%);
    pointer-events: none;
    transition: .5s ease;
}

.input-check:checked~.light {
    top: -90%;
}

.toggle {
    position: absolute;
    top: 20px;
    right: -70px;
    width: 60px;
    height: 120px;
    background: #734173;
    border-radius: 10px;
}

.toggle::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 10px;
    height: 80%;
    background: #eeb8ee;
}

.toggle::after {
    content: '';
    position: absolute;
    top: 5px;
    left: 50%;
    transform: translateX(-50%);
    width: 45px;
    height: 45px;
    background: #734173;
    border: 2px solid #eeb8ee;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, .5);
    transition: .5s ease;
}

.input-check:checked~.toggle::after {
    top: 65px;
}

.input-check {
    position: absolute;
    right: -70px;
    z-index: 1;
    opacity: 0;
}

.toggle .text {
    position: absolute;
    top: 17px;
    left: 50%;
    transform: translateX(-50%);
    color: #fff;
    font-size: 1em;
    z-index: 1;
    text-transform: uppercase;
    pointer-events: none;
    transition: .5s ease;
}

.toggle .text.off {
    opacity: 1;
}

.input-check:checked~.toggle .text.off {
    top: 76px;
    opacity: 0;
}

.toggle .text.on {
    opacity: 0;
}



.input-check:checked~.toggle .text.on {
    top: 76px;
    opacity: 1;
    color: #e2d3e2;
    text-shadow:
        0 0 15px #e2d3e2,
        0 0 30px #e2d3e2,
        0 0 45px #e2d3e2,
        0 0 60px #e2d3e2;
}

    </style>
</head>

<body>


    <div class="glowing-light"></div>
    <div class="login-box">
    <form action="POST" method="">
            <input type="checkbox" class="input-check" id="input-check">
            <label for="input-check" class="toggle">
                <span class="text off">off</span>
                <span class="text on">on</span>
            </label>
            <div class="light"></div>

            <h2>Login</h2>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" required>
                <label>Email</label>
                <div class="input-line"></div>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" required>
                <label>Senha</label>
                <div class="input-line"></div>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
            <div class="register-link">
                <p>voce ainda não tem conta?  <a href="http://localhost/cadastrocliente">resgistre-se</a></p>
            </div>
            <div>
    <a href="home.php">
        <img src="imagens/Logotipo-1-1536x437.png" alt="Imagem de Exemplo" width="200">
    </a><br><br>
</div>

        </form>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>