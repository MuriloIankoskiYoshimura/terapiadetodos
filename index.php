<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cartão de Descontos - Planos</title>
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f4f4f9;
    }

    /* Estilizando o header */
    header {
      background-color: #7b467b;
      padding: 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header .logo {
      font-size: 1.5em;
      font-weight: bold;
    }

    nav ul {
      list-style: none;
      display: flex;
    }

    nav ul li {
      margin-left: 20px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    .cta-btn {
      padding: 10px 20px;
      background-color: #b48cb4;
      color: white;
      text-transform: uppercase;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .cta-btn:hover {
      background-color: #5d295d;
    }

    /* Banner Principal com Carrossel */
    /* Banner Principal com Carrossel */
./* Banner Principal com Carrossel */
.banner {
    position: relative;
    width: 1920px; /* Largura fixa do banner */
    height: 600px; /* Altura fixa do banner */
    max-width: 100%; /* Não ultrapassa a largura da tela do dispositivo */
    overflow: hidden; /* Esconde o conteúdo que ultrapassar o contêiner */
    background: #ccc;
}

.banner .carousel-container {
    display: flex;
    width: 100%; /* Para ocupar a largura do banner */
    height: 100%; /* Para garantir que ocupe a altura do banner */
    transition: transform 0.5s ease-in-out;
}

.banner .carousel-container img {
    width: 100%; /* A imagem ocupa 100% da largura do contêiner */
    height: 100%; /* A imagem ocupa 100% da altura do contêiner */
    object-fit: cover; /* Cobre toda a área do contêiner */
}

.banner .carousel-controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.banner .carousel-controls button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}



    /* Seção Como Funciona */
    /* Seção Como Funciona */
.como-funciona {
    padding: 50px;
    text-align: center;
}

.como-funciona h2 {
    font-size: 2em;
    margin-bottom: 30px;
}

.como-funciona .conteudo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: left;
}

.como-funciona img {
    width: 45%;
    border-radius: 10px;
}

.como-funciona .steps {
    width: 50%;
}

.step {
    display: flex;
    align-items: center;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.step img {
    width: 60px;
    height: 60px;
    margin-right: 20px;
}

.step h3 {
    margin-bottom: 10px;
    color: #7b467b;
}

/* Media Queries para dispositivos móveis */
@media (max-width: 768px) {
    .como-funciona .conteudo {
        flex-direction: column; /* Muda a direção do flex para coluna em telas menores */
        align-items: center; /* Centraliza os itens */
    }

    .como-funciona img {
        width: 80%; /* Aumenta a largura da imagem em telas menores */
        margin-bottom: 20px; /* Adiciona espaço abaixo da imagem */
    }

    .como-funciona .steps {
        width: 100%; /* Faz a seção steps ocupar toda a largura */
    }

    .step {
        flex-direction: row; /* Mantém a direção do flex para a linha */
        justify-content: center; /* Centraliza os itens dentro de step */
    }

    .step img {
        margin: 0 10px 0 0; /* Ajusta a margem da imagem do step */
    }
}


    /* Seção de Planos */
    .planos {
      background-image: url('imagens/fundo.png'); /* Substitua pelo caminho da sua imagem */
      background-size: cover;
      padding: 50px;
      color: #7B467B;
      text-align: center;
    }

    .planos h2 {
      font-size: 2em;
      margin-bottom: 40px;
    }

    .planos-container {
      display: flex;
      justify-content: space-around;
    }

    .plano {
      background: rgba(255, 255, 255, 0.9); /* Fundo branco com transparência */
      color: #333;
      padding: 20px;
      border-radius: 10px;
      width: 30%;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      text-align: center;
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .plano:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .plano h3 {
      margin-bottom: 10px; /* Alterado de 20px para 10px */
      color: #7b467b; /* Mantido como roxo */
      font-weight: bold; /* Destacar o nome do plano */
      text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.7); /* Efeito de sombra para destacar */
    }

    .plano .preco {
      font-size: 1.5em; /* Tamanho do preço */
      margin: 10px 0; /* Margem do preço */
      color: #7b467b; /* Cor roxa */
      font-weight: bold; /* Destacar preço */
    }

    .plano ul {
      list-style: none;
      margin-bottom: 20px;
    }

    .plano ul li {
      margin: 10px 0;
    }

    .plano .cta-btn {
      background-color: #7b467b;
      padding: 10px 20px;
      text-transform: uppercase;
    }

    .plano .cta-btn:hover {
      background-color: #5d295d;
    }

    .plano.highlight {
      border: 2px solid #b48cb4;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .plano.highlight::after {
      content: 'Mais Vendido';
      display: block;
      margin-top: 10px;
      padding: 5px;
      background-color: #b48cb4;
      color: white;
      border-radius: 5px;
      font-weight: bold;
    }

    /* Nova Seção com Campo de Pesquisa e Imagem Específica */
    .terapias {
      padding: 50px;
      background-color: #fff;
    }

    .terapias .descricao {
      text-align: center;
      margin-bottom: 30px;
    }

    .terapias .campo-pesquisa {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .terapias select {
      width: 300px;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 1em;
    }

    .terapias .imagem-especifica {
      text-align: center;
    }

    .terapias .imagem-especifica img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
    .botao-destino {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #7b467b; /* Cor de fundo do botão */
            color: white; /* Cor do texto do botão */
            text-decoration: none; /* Remove sublinhado do link */
            border-radius: 5px; /* Arredonda os cantos do botão */
        }
        .botao-destino:hover {
            background-color: #b48cb4; /* Cor do botão ao passar o mouse */
        }

    /* Blog Section */
    .blog-section {
      padding: 50px;
      background-color: #fff;
      text-align: center;
    }

    .blog-section h2 {
      font-size: 2em;
      margin-bottom: 30px;
    }

    .blog-cards {
      display: flex;
      justify-content: space-around;
      align-items: stretch;
    }

    .blog-card {
      background: #f4f4f9;
      padding: 20px;
      width: 30%;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .blog-card img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .blog-card h3 {
      margin-bottom: 15px;
      color: #7b467b;
    }

    .blog-card p {
      margin-bottom: 15px;
    }

    .blog-card .cta-btn {
      align-self: flex-start;
      padding: 10px 20px;
      background-color: #7b467b;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .blog-card .cta-btn:hover {
      background-color: #5d295d;
    }

    /* Footer */
    footer {
      background-color: #7b467b;
      padding: 20px;
      text-align: center;
      color: white;
    }

    footer p {
      margin: 5px 0;
    }

    @media (max-width: 768px) {
      .como-funciona .conteudo {
        flex-direction: column;
        align-items: center;
      }

      .como-funciona img {
        width: 80%;
        margin-bottom: 20px;
      }

      .planos-container {
        flex-direction: column;
      }

      .plano {
        width: 80%;
        margin: 10px auto;
      }

      .blog-cards {
        flex-direction: column;
      }

      .blog-card {
        width: 80%;
        margin: 10px auto;
      }
    }
  </style>
  
</head>
<body>
<?php include 'header.php'; ?>

<div class="banner">
  <div class="carousel-container">
    <img src="imagens/banner.png" alt="Banner 1">
    <img src="imagens/banner.png" alt="Banner 2">
  </div>
  <div class="carousel-controls">
    <button onclick="prevSlide()">❮</button>
    <button onclick="nextSlide()">❯</button>
  </div>
</div>

<section class="como-funciona">
  <h2>Como Funciona</h2>
  <div class="conteudo">
    <img src="imagens/8b2e76fa5694-Cartao_01.jpg" alt="Como Funciona">
    <div class="steps">
      <div class="step">
        <img src="imagens/Frame-10-2.svg" alt="Passo 1">
        <div>
          <h3>Especialistas Reconhecidos</h3>
          <p>Nossos fundadores são profissionais de renome nacional, garantindo que você tenha acesso às terapias integrativas mais confiáveis e baseadas em evidências.</p>
        </div>
      </div>
      <div class="step">
        <img src="imagens/Frame-11-3.svg" alt="Passo 2">
        <div>
          <h3>Cuidado Baseado na Ciência</h3>
          <p>Nós acreditamos na integração da ciência com a terapia, oferecendo tratamentos que são comprovados e eficazes para melhorar a sua saúde e bem-estar.</p>
        </div>
      </div>
      <div class="step">
        <img src="imagens/Frame-12-1.svg" alt="Passo 3">
        <div>
          <h3>Conexões Valiosas</h3>
          <p>Ligamos você a terapeutas que compartilham sua visão de bem-estar e a famílias que buscam cuidados naturais. É uma rede de apoio que valoriza sua saúde e felicidade.</p>
        </div>
      </div>
    </div>
  </div>
</section>

  
  <section class="terapias" id="terapias"> 
    <div class="descricao">
      <h2>Explore Nossas Terapias</h2>
      <p>Encontre as melhores terapias para você com descontos especiais.</p>
    </div>
    <div class="campo-pesquisa">
      <select id="campo-pesquisa" onchange="mostrarImagem()">
        <option value="">Selecione uma Terapia</option>
        <option value="imagens/acupuntura-300x157.png" data-destino="destino1.html">Acuputura</option>
        <option value="imagens/terapia2.jpg" data-destino="destino2.html">Terapia 2</option>
        <option value="imagens/terapia3.jpg" data-destino="destino3.html">Terapia 3</option>
        <option value="imagens/terapia4.jpg" data-destino="destino4.html">Terapia 4</option>
        <!-- Adicione mais opções conforme necessário -->
      </select>
    </div>
    <div class="campo-pesquisa" id="imagem-especifica">
    </div>
</section>



<script>
function mostrarImagem() {
    const select = document.getElementById("campo-pesquisa");
    const imagemContainer = document.getElementById("imagem-especifica");
    const selectedValue = select.value;

    // Limpa o container de imagem anterior
    imagemContainer.innerHTML = '';

    // Verifica se uma opção válida foi selecionada
    if (selectedValue) {
        // Cria uma nova imagem
        const img = document.createElement("img");
        img.src = selectedValue;
        img.alt = "Terapia Selecionada";

        // Adiciona a imagem ao container
        imagemContainer.appendChild(img);
        
        // Cria um botão com o destino correspondente
        const destino = select.options[select.selectedIndex].getAttribute("data-destino");
        const botao = document.createElement("a");
        botao.href = destino; // Define o destino do botão
        botao.className = "botao-destino"; // Adiciona a classe para estilo
        botao.textContent = "Saiba mais"; // Texto do botão

        // Adiciona o botão ao container
        imagemContainer.appendChild(botao);
    }
}
</script>


  <section class="blog-section" id="blog">
    <h2>Blog</h2>
    <div class="blog-cards">
      <div class="blog-card">
        <img src="imagens/image-1-300x157.png" alt="Blog 1">
        <h3>Terapia ortomolecular. O que é e para que serve?</h3>
        <p>A terapia ortomolecular é uma terapia alternativa que identifica a carência e excesso de vitaminas e minerais e até mesmo metais pesados…</p>
        <button class="cta-btn">Ler Mais</button>
      </div>
      <div class="blog-card">
        <img src="imagens/image-300x157.png" alt="Blog 2">
        <h3>O que são terapias naturais? Benefícios e exemplos</h3>
        <p>As terapias naturais são aquelas que utilizam os recursos disponíveis na natureza ou que utilizam métodos que não agridem o organismo…</p>
        <button class="cta-btn">Ler Mais</button>
      </div>
      <div class="blog-card">
        <img src="imagens/acupuntura-300x157.png" alt="Blog 3">
        <h3>Acupuntura. O que é, como funciona, benefícios.</h3>
        <p>A acupuntura é uma terapia complementar tradicional que tem origem histórica na China. Envolve a inserção de pequenas agulhas para estimular…</p>
        <button class="cta-btn">Ler Mais</button>
      </div>
    </div>
  </section>

  <section class="planos" id="planos">
    <h2>Nossos Planos</h2>
    <div class="planos-container">
      <div class="plano highlight">
        <h3>SINGLE</h3>
        <div class="preco">R$ 19,90</div>
        <ul>
        <ul>
          <li>☑ Consultas presenciais e online</li>
          <hr>
          <li>☑ Consultas Terapéuticas a partir de R$15,00</li>
          <hr>
          <li>☑ Desconto em Suplementos</li>
          <hr>
          <li>☑ Até 75% de desconto em Terapias e Estabelecimentos por todo o país</li>
          <hr>
        </ul>
        <button class="cta-btn">Assinar</button>
      </div>
      <div class="plano">
        <h3>FAMILY</h3>
        <div class="preco">R$ 29,90</div>
        <ul>
        <li>Consultas presenciais e online</li>
          <hr>
          <li>Consultas Terapéuticas a partir de R$15,00</li>
          <hr>
          <li>Desconto em Suplementos</li>
          <hr>
          <li>Dependentes diretos da mesma casa (pais, irmãos, cônjuge e filhos)</li>
          <hr>
          <li>Até 75% de desconto em Terapias e Estabelecimentos por todo o país</li>
          <hr>
          <li>1 consulta grátis ao ano ***</li>
          <hr>
        </ul>
        <button class="cta-btn">Assinar</button>
      </div>
      <div class="plano">
        <h3>SUPERFAMILY</h3>
        <div class="preco">R$ 39,90</div>
        <ul>
        <li>Consultas presenciais e online</li>
        <hr>
          <li>Consultas Terapéuticas a partir de R$15,00</li>
          <hr>
          <li>Desconto em Suplementos</li>
          <hr>
          <li>6 Dependentes diretos e indiretos (pais, irmãos, cônjuge, filhos, sobrinhos avos e netos)</li>
          <hr>
          <li>Até 75% de desconto em Terapias e Estabelecimentos por todo o país</li>
          <hr>
          <li>1 consulta grátis ao ano ***</li>
          <hr>
        </ul>
        <button class="cta-btn">Assinar</button>
      </div>
    </div>
  </section>

  <!-- Footer -->
<footer>

<?php include 'footer.php'; ?>


</footer>

<!-- Links de ícones de redes sociais (adicione sua biblioteca de ícones, como Font Awesome, no <head>) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <script>
    let currentSlide = 0;

    function showSlide(slideIndex) {
      const slides = document.querySelectorAll('.carousel-container img');
      if (slideIndex >= slides.length) {
        currentSlide = 0;
      } else if (slideIndex < 0) {
        currentSlide = slides.length - 1;
      } else {
        currentSlide = slideIndex;
      }
      const offset = -currentSlide * 100;
      document.querySelector('.carousel-container').style.transform = `translateX(${offset}vw)`;
    }

    function nextSlide() {
      showSlide(currentSlide + 1);
    }

    function prevSlide() {
      showSlide(currentSlide - 1);
    }

    // Exibir o primeiro slide inicialmente
    showSlide(currentSlide);
  </script>
</body>
</html>
