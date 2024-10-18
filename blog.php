<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Gipitanga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #1c2434;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .search-section {
            margin-top: 20px;
            text-align: center;
        }
        .search-bar {
            width: 50%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .icon-section {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding: 20px 0;
            background-color: #fff;
        }
        .icon-section div {
            text-align: center;
            font-size: 14px;
        }
        .icon-section div img {
            width: 50px;
            height: 50px;
        }
        .suggestions {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
        }
        .suggestions h3 {
            margin-bottom: 10px;
        }
        .suggestions ul {
            list-style: none;
            padding: 0;
        }
        .suggestions ul li {
            display: inline-block;
            margin-right: 15px;
        }
        .blog-section {
            margin-top: 20px;
        }
        .blog-post {
            display: flex;
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .blog-post img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .blog-post-content {
            margin-left: 20px;
        }
        .blog-post-content h3 {
            margin-top: 0;
        }
        .blog-post-content p {
            color: #555;
        }
        .blog-post-content a {
            color: #1c2434;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>



<div class="container">
    <!-- Seção de Pesquisa -->
    <div class="search-section">
        <input type="text" class="search-bar" placeholder="Pesquise por assunto...">
    </div>

    <!-- Ícones de Assuntos -->
    <div class="icon-section">
        <div>
            <img src="icone1.png" alt="Assunto 1">
            <p>Assunto 1</p>
        </div>
        <div>
            <img src="icone2.png" alt="Assunto 2">
            <p>Assunto 2</p>
        </div>
        <div>
            <img src="icone3.png" alt="Assunto 3">
            <p>Assunto 3</p>
        </div>
        <div>
            <img src="icone4.png" alt="Assunto 4">
            <p>Assunto 4</p>
        </div>
        <div>
            <img src="icone5.png" alt="Assunto 5">
            <p>Assunto 5</p>
        </div>
    </div>

    <!-- Seção de Sugestões -->
    <div class="suggestions">
        <h3>Sugestões de Assuntos</h3>
        <ul>
            <li><a href="#">Sugestão 1</a></li>
            <li><a href="#">Sugestão 2</a></li>
            <li><a href="#">Sugestão 3</a></li>
            <li><a href="#">Sugestão 4</a></li>
            <li><a href="#">Sugestão 5</a></li>
        </ul>
    </div>

    <!-- Seção de Blocos de Assuntos -->
    <div class="blog-section">
        <div class="blog-post">
            <img src="imagem1.jpg" alt="Imagem do Post 1">
            <div class="blog-post-content">
                <h3>Título do Post 1</h3>
                <p>Breve descrição do post 1. Uma introdução curta que dá uma ideia sobre o conteúdo do post...</p>
                <a href="post1.html">Leia mais</a>
            </div>
        </div>

        <div class="blog-post">
            <img src="imagem2.jpg" alt="Imagem do Post 2">
            <div class="blog-post-content">
                <h3>Título do Post 2</h3>
                <p>Breve descrição do post 2. Uma introdução curta que dá uma ideia sobre o conteúdo do post...</p>
                <a href="post2.html">Leia mais</a>
            </div>
        </div>

        <div class="blog-post">
            <img src="imagem3.jpg" alt="Imagem do Post 3">
            <div class="blog-post-content">
                <h3>Título do Post 3</h3>
                <p>Breve descrição do post 3. Uma introdução curta que dá uma ideia sobre o conteúdo do post...</p>
                <a href="post3.html">Leia mais</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
