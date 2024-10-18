<!-- Footer -->
<footer>
    <div class="footer-container">
        <!-- Logo -->
        <div class="footer-logo">
            <img src="imagens/Logotipo-1-1536x437.png" alt="Logo da Empresa" />
        </div>

        <!-- Seção com 3 colunas: Sobre, Links Rápidos, Contato -->
        <div class="footer-sections">
            <!-- Sobre Nós -->
            <div class="footer-col">
                <h3>Sobre Nós</h3>
                <p>Nossa missão é oferecer as melhores terapias naturais com descontos exclusivos para nossos clientes. Acesse e conheça mais sobre nosso trabalho.</p>
            </div>

            <!-- Links Rápidos -->
            <div class="footer-col">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="http://localhost/TT/profissionais">Profissionais</a></li>
                    <li><a href="http://localhost/TT/cadastrocliente">Cadastro de Clientes</a></li>
                    <li><a href="http://localhost/TT/consulta">Agendar Consulta</a></li>
                    <li><a href="http://localhost/TT/Blog">Blog</a></li>
                </ul>
            </div>

            <!-- Contato -->
            <div class="footer-col">
                <h3>Contato</h3>
                <ul>
                    <li>Email: <a href="mailto:contato@terapias.com.br">contato@terapias.com.br</a></li>
                    <li>Telefone: (99) 99999-9999</li>
                    <li>Endereço: Rua das Terapias, 123, Cidade, Estado</li>
                </ul>
            </div>
        </div>

        <!-- Redes Sociais -->
        <div class="footer-bottom">
            <p>Siga-nos nas redes sociais:</p>
            <div class="social-icons">
                <a href="#"><img src="imagens/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="imagens/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="imagens/whatsapp.png" alt="Twitter"></a>
            </div>
        </div>
    </div>
</footer>

<!-- CSS para o Footer -->
<style>
    footer {
        background-color: white; /* Fundo branco */
        color: #8B4F8B; /* Texto em roxo */
        padding: 40px 20px;
        text-align: center;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .footer-logo {
        margin-bottom: 30px;
    }

    .footer-logo img {
        width: 150px; /* Ajuste o tamanho da logo conforme necessário */
    }

    .footer-sections {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .footer-col {
        flex: 1;
        margin: 10px 20px;
        min-width: 200px;
    }

    .footer-col h3 {
        color: #8B4F8B; /* Títulos em roxo */
        font-size: 20px;
        margin-bottom: 15px;
    }

    .footer-col ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-col ul li {
        margin: 10px 0;
    }

    .footer-col ul li a {
        color: #8B4F8B; /* Links em roxo */
        text-decoration: none;
        font-size: 16px;
    }

    .footer-col ul li a:hover {
        text-decoration: underline;
    }

    .footer-bottom {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #8B4F8B; /* Linha roxa */
    }

    .social-icons a {
        display: inline-block;
        margin: 0 10px;
    }

    .social-icons img {
        width: 30px;
        height: 30px;
    }

    .footer-bottom p {
        margin-bottom: 10px;
        font-size: 18px;
    }
</style>
