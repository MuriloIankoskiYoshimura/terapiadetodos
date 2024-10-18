<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site com Header</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilo para o Header */
        header {
            display: flex;
            justify-content: space-around; /* Mantém o espaço entre a logo e o menu */
            align-items: center;
            background-color: #ffffff;
            padding: 20px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid #8B4F8B;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        nav {
    display: flex;
    align-items: center;
    margin-left: 120px; /* Distância entre a logo e o menu */
        }

        .logo img {
            height: 50px; /* Ajuste a altura da imagem do logo */
            max-height: 100%; /* Garante que a imagem não ultrapasse a altura do header */
        }


        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 30px; /* Espaçamento entre os itens do menu */
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #8B4F8B;
            font-size: 18px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Ícone de usuário */
        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #8B4F8B;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Menu do Admin */
        .admin-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 50px;
            background: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .admin-menu a {
            display: block;
            padding: 10px;
            color: #000;
            text-decoration: none;
        }

        .admin-menu a:hover {
            background: #f0f0f0;
        }

        /* Espaçamento para o conteúdo principal */
        main {
            margin-top: 60px; /* Espaço suficiente para o header */
            padding: 20px;
            width: 100%;
        }

        /* Estilo para o Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: relative;
            margin-top: 60px;
        }

        /* Estilo para o botão de menu hambúrguer */
        .menu-hamburguer {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-hamburguer div {
            width: 30px;
            height: 3px;
            background-color: #8B4F8B;
            margin: 4px 0;
            transition: 0.4s;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            nav ul {
                display: none; /* Esconde o menu na tela pequena */
                flex-direction: column; /* Menu vertical */
                position: absolute;
                background-color: white;
                width: 100%;
                top: 70px; /* Abaixo do header */
                left: 0;
                z-index: 999;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            nav ul.show {
                display: flex; /* Exibe o menu quando ativado */
            }

            .menu-hamburguer {
                display: flex; /* Mostra o botão do menu hambúrguer */
            }

            .logo img {
                height: 40px; /* Reduz a altura da imagem do logo em telas pequenas */
            }

            header {
                flex-direction: column; /* Altera a direção do header em telas pequenas */
                align-items: flex-start; /* Alinha o conteúdo do header à esquerda */
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container" style="display: flex; align-items: center;">
            <div class="logo">
                <a href="http://localhost/TT/home.php">
                    <img src="imagens/Logotipo-1-1536x437.png" alt="Logo da Empresa"> <!-- Altere o caminho para o seu logo -->
                </a>
            </div>
            <nav>
                <ul id="menu">
                    <li><a href="http://localhost/TT/profissionais">Profissionais</a></li>
                    <li><a href="http://localhost/TT/cadastrocliente">Cadastro Cliente</a></li>
                    <li><a href="http://localhost/TT/consulta">Agendar Consulta</a></li>
                    <li><a href="http://localhost/TT/Blog">Blog</a></li>
                    <li><a href="">|</a></li>
                    <!-- Verifica se o usuário está logado. Se não estiver, exibe o link de login -->
                    <?php if (!isset($_SESSION['email'])): ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>

                    <!-- Verifica se o usuário está logado para exibir o ícone e o menu -->
                    <?php if (isset($_SESSION['email'])): ?>
                        <li class="user-icon" onclick="toggleMenu()">
                            <span>U</span> <!-- Substitua pelo ícone de usuário ou imagem -->
                            <div id="admin-menu" class="admin-menu">
                                <span>Olá, <?php echo $_SESSION['nome']; ?></span>
                                <a href="alterar-plano.php">Alterar Plano</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    
                    <!-- Exibe as iniciais do usuário logado -->
                    <?php if (isset($_SESSION['iniciais'])): ?>
                        <li>
                            <div class="perfil-logado">
                                <div class="user-icon" onclick="toggleMenu()">
                                    <span class="bola-iniciais"><?php echo $_SESSION['iniciais']; ?></span>
                                    <div id="admin-menu" class="admin-menu">
                                        <span>Olá, <?php echo $_SESSION['nome']; ?></span>
                                        <a href="alterar-plano.php"> Plano</a>
                                        <a href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="menu-hamburguer" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>

    <main>
        <!-- Conteúdo Principal -->
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('show'); // Adiciona/remover a classe 'show' para exibir/esconder o menu
        }
    </script>
</body>
</html>
