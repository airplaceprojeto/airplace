<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento IA - AirPlace</title>
    <link rel="stylesheet" href="estilos_/atendimentos.css">
    <link rel="stylesheet" href="estilos_/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                                    <p>
                                        <?php echo htmlspecialchars($item['nome']); ?>
                                    </p>
                                    <p><strong>R$
                                            <?php echo number_format($item['valor'], 2, ',', '.'); ?>
                                        </strong></p>
                                    <p>Quantidade:
                                        <?php echo $item['quantidade']; ?>
                                    </p>

                                    <div class="acoes-carrinho">
                                        <a href="atualizar_carrinho.php?acao=adicionar&id=<?php echo $id; ?>"
                                            class="btn-acao">+</a>
                                        <a href="atualizar_carrinho.php?acao=remover&id=<?php echo $id; ?>"
                                            class="btn-acao remover">🗑️</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <a href="finalizar_compra.php" class="btn-finalizar">Finalizar Compra</a>
                            <a href="limpar_carrinho.php" class="btn-limpar" onclick="limparCarrinho()">Limpar
                                Carrinho</a>
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
                        <a class="link_saudacao" href="#login">Olá,
                            <?php echo htmlspecialchars($_SESSION['nome']); ?>
                        </a>
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
                <li><a href="sobrenos.php">Sobre nós</a></li>
                <li><a href="ofertas.php">Ofertas</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li><a href="drones.php">Conheça nossos Drones</a></li>
                <li><a href="airplay.php">Air Play</a></li>
            </ul>
        </nav>
    </header>

    <div class="linha-laranja"></div>

    <main>
        <div class="chat-container">
            <div class="chat-header"><i class="fas fa-robot"></i> Central de Ajuda AirPlace</div>
            
            <div class="chat-sidebar">
                <div class="bot-avatar">
                    <!-- Substitua o src pela imagem do seu drone robo -->
                    <img src="imagens_/drone_avatar.png" alt="Drone Bot" onerror="this.src='https://cdn-icons-png.flaticon.com/512/4712/4712035.png'">
                </div>
                <h3>SkyBot</h3>
                <p style="font-size: 13px; color: #666; margin-top: 10px;">Seu assistente voador pronto para ajudar!</p>
            </div>

            <div class="chat-main">
                <div id="chat-messages">
                    <div class="message ai-message">Olá! Eu sou o SkyBot. Como posso tornar sua experiência na AirPlace incrível hoje?</div>
                </div>
                <div class="quick-questions">
                    <button class="q-chip" onclick="quickQuestion('Como acompanho meu pedido?')">📦 Acompanhar Pedido</button>
                    <button class="q-chip" onclick="quickQuestion('Como posso vender um produto?')">💰 Como vender</button>
                    <button class="q-chip" onclick="quickQuestion('Qual o prazo de entrega?')">⏱️ Prazos</button>
                </div>
                <div class="chat-input-area">
                    <input type="text" id="user-input" placeholder="Digite sua dúvida...">
                    <button id="send-btn" onclick="sendMessage()">Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const userInput = document.getElementById('user-input');

        function appendMessage(text, className) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `message ${className}`;
            msgDiv.textContent = text;
            chatMessages.appendChild(msgDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function quickQuestion(text) {
            userInput.value = text;
            sendMessage();
        }

        function sendMessage() {
            const text = userInput.value.trim();
            if (!text) return;

            appendMessage(text, 'user-message');
            userInput.value = '';

            // Simulação de digitando...
            const typingDiv = document.createElement('div');
            typingDiv.className = 'message ai-message';
            typingDiv.textContent = '...';
            chatMessages.appendChild(typingDiv);

            setTimeout(() => {
                chatMessages.removeChild(typingDiv);
                const response = getAIResponse(text);
                appendMessage(response, 'ai-message');
            }, 800);
        }

        function getAIResponse(text) {
            const input = text.toLowerCase();
            if (input.includes('pedido') || input.includes('acompanhar')) return "Para acompanhar seu pedido, acesse a página 'Meus Pedidos' no seu perfil. Lá você encontrará o status atualizado de cada compra.";
            if (input.includes('vender') || input.includes('anunciar') || input.includes('cadastro')) return "Para anunciar novos itens, clique no botão 'Vender' no topo da página e preencha o formulário de cadastro do produto.";
            if (input.includes('prazo') || input.includes('entrega')) return "O prazo de entrega depende da sua localização. Com a nossa entrega via Drone, o tempo médio é de 24 horas para áreas cobertas!";
            if (input.includes('marketplace') || input.includes('funciona')) return "O AirPlace é um marketplace especializado em drones e tecnologia, conectando compradores e vendedores com agilidade e segurança.";
            if (input.includes('drone')) return "Nossos drones são de última geração, ideais para lazer ou entregas comerciais!";
            if (input.includes('preço') || input.includes('valor')) return "Temos os melhores preços do mercado! Verifique nossa aba de Ofertas para descontos de até 50%.";
            if (input.includes('ajuda') || input.includes('problema')) return "Sinto muito que esteja com problemas. Você pode nos contatar também pelo e-mail suporte@airplace.com.";
            return "Interessante! Posso te ajudar com dúvidas sobre pedidos, cadastro de produtos, prazos de entrega ou sobre como funciona o nosso marketplace.";
        }

        userInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    </script>

    <footer>
        <div class="footer-links">
            <ul>
                <li><a href="#">Trabalhe conosco</a></li>
                <li><a href="#">Termos e condições</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
        <div class="footer-info">
            <p>CNPJ nº 00.000.000/0000-00 / Air Place Marketplace Acadêmico</p>
        </div>
    </footer>
</body>
</html>
