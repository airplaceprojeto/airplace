<?php
session_start(); // Inicia a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre nós</title>
  <!-- Link para um arquivo CSS externo chamado style.css -->
  <link rel="stylesheet" href="estilos_/style_sobrenos.css">
  <link rel="stylesheet" href="estilos_/carrinho.css">
  <!-- Link para o CSS do Font Awesome para ícones vetoriais -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    h1,
    h2,
    h3 {
      color: #411982;
    }

    h1 {
      font-size: 2.5em;
    }

    .link_saudacao {
      color: white;
      text-decoration: none;
      font-weight: bolder;
    }

    /* Seção de Apresentação */
    .presentation {
      display: flex;
      padding: 50px 20px;
      gap: 20px;
    }

    .text {
      flex: 1;
    }

    .image {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image img {
      max-width: 100%;
      border-radius: 15px;
      background-color: #FF6A00;
    }

    /* Galeria Animada */
    .gallery {
      padding: 50px 20px;
      text-align: center;
      position: relative;
    }

    .gallery-slider {
      display: flex;
      transition: transform 0.5s ease;
    }

    .gallery-slider img {
      max-width: 100%;
      width: 100%;
      border-radius: 10px;
    }

    .gallery-container {
      overflow: hidden;
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
    }

    /* Botões de navegação */
    .gallery-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: #FFFFFF;
      border: none;
      padding: 10px;
      cursor: pointer;
      font-size: 1.5em;
      z-index: 1;
    }

    .gallery-button.left {
      left: 10px;
    }

    .gallery-button.right {
      right: 10px;
    }

    /* Depoimentos */
    .testimonials {
      background-color: #F7F4FC;
      padding: 50px 20px;
      text-align: center;
    }

    .testimonial {
      font-size: 1.2em;
      color: black;
      animation: slide-in 2s ease-in-out;
    }

    /* Valores e Compromissos */
    .values {
      display: flex;
      justify-content: space-around;
      padding: 50px 20px;
    }

    .value img {
      width: 60px;
    }

    .value h3 {
      margin-top: 10px;
      color: #FF6A00;
    }

    /* Call-to-Action */
    .cta {
      text-align: center;
      padding: 50px 20px;
    }

    .cta a {
      background-color: #FF6A00;
      color: #FFFFFF;
      border: none;
      padding: 15px 30px;
      font-size: 1.2em;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .cta a:hover {
      background-color: #411982;
      animation: pulse 1s infinite;
    }

    /* Animações */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes slide-in {
      from {
        opacity: 0;
        transform: translateX(-20px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes pulse {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.05);
      }
    }

    @media (max-width: 1024px) {

      /* Ajuste no Header */
      .header-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 20px;
      }

      .search-bar {
        width: 80%;
      }

      /* Navegação responsiva */
      nav ul {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
      }

      /* Seção de Apresentação */
      .presentation {
        flex-direction: column;
      }

      .text,
      .image {
        width: 100%;
      }
    }

    /* Responsividade para smartphones */
    @media (max-width: 768px) {

      /* Ajuste no tamanho do texto */
      h1 {
        font-size: 1.8em;
      }

      h2,
      .testimonial {
        font-size: 1.4em;
      }

      .cta a {
        padding: 10px 20px;
        font-size: 1em;
      }

      /* Valores e Compromissos em uma coluna */
      .values {
        flex-direction: column;
        align-items: center;
      }

      .value {
        width: 90%;
        margin-bottom: 20px;
        text-align: center;
      }

      /* Ajuste de Galeria para Centralização */
      .gallery-container {
        max-width: 100%;
      }

      /* Ajuste na navegação do Gallery */
      .gallery-button {
        padding: 8px;
        font-size: 1.2em;
      }
    }

    /* Responsividade para dispositivos pequenos (ex. celulares) */
    @media (max-width: 480px) {

      /* Header */
      .header-container {
        padding: 10px;
      }

      .search-bar input {
        width: 100%;
        padding: 10px;
      }

      /* Ajuste de tamanho de imagem */
      .image img {
        max-width: 80%;
      }

      /* Footer responsivo */
      .footer-links ul {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>

<body>
<header>
    <div class="header-container">
        <div class="logo">
            <img src="imagens_/drone_banner_white.png" alt="Logo AirPlace">
        </div>

        <div class="search-bar">
            <input type="text" placeholder="BUSQUE NO AIRPLACE">
            <button><i class="fas fa-search"></i></button>
            <?php if (isset($_SESSION['nome'])): ?>
                <a href="venda.php"><button class="btn-vender">Vender</button></a>
            <?php else: ?>
                <a href="login.html"><button class="btn-vender">Vender</button></a>
            <?php endif; ?>
        </div>

        <div class="right-info">
            <div class="right-top">
                <div class="icon">
                    <span class="location-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                </div>
                <div class="text-enter">
                    <p>Drones disponíveis na</br> minha região</p>
                </div>
            </div>

            <div class="div_icones">
                <?php if (isset($_SESSION['nome'])): ?>

               <!-- Ícone e dropdown do carrinho -->
            <div class="dropdown-carrinho-container">
                <a href="#" class="icone_carrinho">
                <i class="fas fa-shopping-cart"></i>
                <?php if (!empty($_SESSION['carrinho'])): ?>
                <span class="badge-carrinho">
                <?php echo array_sum(array_column($_SESSION['carrinho'], 'quantidade')); ?>
                </span>
                <?php endif; ?>
                 </a>

            <div class="dropdown-carrinho">
                <?php if (!empty($_SESSION['carrinho'])): ?>
                    <?php foreach ($_SESSION['carrinho'] as $id => $item): ?>
                        <div class="item-carrinho">
                            <?php $img_src = "imagens_/" . htmlspecialchars($item['imagem']); ?>
                            <img src="<?php echo $img_src; ?>" alt="Imagem do Produto">
                            <div class="info-carrinho">
                                <p><?php echo htmlspecialchars($item['nome']); ?></p>
                                <p><strong>R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></strong></p>
                                <p>Quantidade: <?php echo $item['quantidade']; ?></p>

                                <div class="acoes-carrinho">
                                    <a href="atualizar_carrinho.php?acao=adicionar&id=<?php echo $id; ?>" class="btn-acao">+</a>
                                    <a href="atualizar_carrinho.php?acao=remover&id=<?php echo $id; ?>" class="btn-acao remover">🗑️</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

            <a href="finalizar_compra.php" class="btn-finalizar">Finalizar Compra</a>
            <a href="limpar_carrinho.php" class="btn-limpar" onclick="limparCarrinho()">Limpar Carrinho</a>
            <script>
            function limparCarrinho() {
                if (confirm("Tem certeza que deseja limpar o carrinho?")) {
                    // Redireciona para um arquivo PHP que irá limpar o carrinho
                    window.location.href = "limpar_carrinho.php";
                }
            }
            </script>

            <?php else: ?>
            <p class="vazio">Carrinho vazio</p>
            <?php endif; ?>
            </div>
            </div>



                <!-- Perfil do usuário -->
                <div class="dropdown">
                    <a href="#"><i class="fas fa-user-circle" id="icone_perfil"></i></a>
                    <a class="link_saudacao" href="#login">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></a>
                    <div class="dropdown-content">
                        <a href="meus_produtos.php">Meus Produtos</a>
                        <a href="logout.php" class="btn_sair">Sair</a>
                    </div>
                </div>

                <?php else: ?>
                    <p class="Login"><a href="login.html">Entre ou cadastre-se</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <nav>
        <ul>
            <li><a href="tela_inicial.php">Home</a></li>
            <li><a href="ofertas.php">Ofertas</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="drones.php">Conheça nossos Drones</a></li>
            <li><a href="airplay.php">Air Play</a></li>
            <li><a href="atendimentos.php">Atendimento IA</a></li>
        </ul>
    </nav>
</header>

    <div class="linha-laranja"></div>

  <br>
  <h1 style="text-align: center;">Sobre nós</h1>
  <br>
  <h2 style="text-align: center;">Levando a tecnologia dos drones para novos horizontes</h2>
  <br>

  <!-- Seção de Apresentação -->
  <section class="presentation">
    <div class="text">
      <br>
      <h2>Nossa Missão</h2>
      <p>A nossa missão é reunir diversos vendedores de drones, oferecendo uma variedade de modelos e opções para
        consumidores que buscam soluções específicas.</p>
      <br>
      <h2>Visão</h2>
      <p>Transformar a forma como drones são comprados e usados, facilitando o acesso à tecnologia para todos, com
        segurança e inovação.</p>
      <br>
      <h2>Valores</h2>
      <p>Valorizamos principlamente a inovação tecnológica, segurança e confiabilidade dos produtos.</p>
    </div>
    <div class="image">
      <img src="imagens_/Drone-PNG-Transparent-Image (1).png" alt="Drone em Detalhe">
    </div>
  </section>

  <!-- Galeria Animada -->
  <section class="gallery">
    <h2>Galeria de Drones em Ação</h2>
    <br>
    <div class="gallery-container">
      <div class="gallery-slider">
        <img src="imagens_/Drone1.jpg" alt="Drone 1">
        <img src="imagens_/Drone2.jpg" alt="Drone 2">
        <img src="imagens_/Drone3.jpg" alt="Drone 3">
      </div>
    </div>
    <button class="gallery-button left" onclick="moveSlide(-1)">&#10094;</button>
    <button class="gallery-button right" onclick="moveSlide(1)">&#10095;</button>
  </section>

  <!-- Depoimentos -->
  <section class="testimonials">
    <h2>O Que Nossos Clientes Dizem</h2>
    <br>
    <div class="carousel">
      <p class="testimonial">"Tecnologia e Inovação é com o Air Place!"</p>
      <p class="testimonial">"Inovação e qualidade em um só lugar. Quando penso em drones, penso em Air Place!"</p>
      <p class="testimonial">"Para quem busca o futuro da tecnologia em drones, o Air Place é o lugar!"</p>
    </div>
  </section>

  <!-- Seção de Valores e Compromissos -->
  <section class="values">
    <div class="value">
      <img src="imagens_/logo_drone_black.png" alt="Confiabilidade">
      <h3>Confiabilidade</h3>
      <p style="text-align: justify; padding-right: 5%;">No Air Place, a confiabilidade é prioridade. Com vendedores
        verificados, produtos de qualidade garantida e transações seguras, oferecemos uma experiência de compra
        tranquila e segura. Comprar drones no Air Place é sinal que preserva a qualidade de um produto.</p>
    </div>
    <div class="value">
      <img src="imagens_/logo_drone_black.png" alt="Sustentabilidade">
      <h3>Sustentabilidade</h3>
      <p style="text-align: justify; padding-right: 5%;">No Air Place, acreditamos que a sustentabilidade é parte
        fundamental do futuro dos drones. Trabalhamos com fornecedores comprometidos com práticas responsáveis e
        oferecemos opções de reuso e reciclagem para reduzir o impacto ambiental. Com inovação consciente, promovemos um
        mercado sustentável para todos.</p>
    </div>
    <div class="value">
      <img src="imagens_/logo_drone_black.png" alt="Inovação">
      <h3>Inovação</h3>
      <p style="text-align: justify;">No Air Place, a inovação é o que nos move. Nosso marketplace oferece as mais
        avançadas tecnologias em drones, reunindo funcionalidades que transformam a experiência do usuário. Com foco em
        evolução constante, o Air Place conecta você ao que há de mais moderno no mercado. Principalmente a mais nova
        novidade, entregas delivery feitas por drones.</p>
    </div>
  </section>

  <!-- Call-to-Action Final -->
  <section class="cta">
    <a href="login.html" style="text-decoration: none;">Junte-se a Nós</a>
  </section>

  <script>
    let currentSlide = 0;

    function moveSlide(direction) {
      const slides = document.querySelectorAll('.gallery-slider img');
      const totalSlides = slides.length;

      currentSlide = (currentSlide + direction + totalSlides) % totalSlides;

      document.querySelector('.gallery-slider').style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    setInterval(() => moveSlide(1), 5000); // Passa automaticamente para a próxima imagem a cada 5 segundos
  </script>

  <br>
  <footer>
    <div class="footer-links">
      <ul>
        <li><a href="#">Trabalhe conosco</a></li>
        <li><a href="#">Termos e condições</a></li>
        <li><a href="#">Como cuidamos da sua privacidade</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
    </div>
    <div class="footer-info">
      <p>CNPJ nº 00.000.000/0000-00 / Av. das Nações Unidas, nº 3.203, Bonfim, Osasco/SP - CEP 00000-000 - empresa do
        grupo AIR PLACE</p>
    </div>
  </footer>
</body>

</html>
