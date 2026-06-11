<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento IA - AirPlace</title>
    <link rel="stylesheet" href="estilos_/style_home.css">
    <link rel="stylesheet" href="estilos_/carrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .chat-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            height: 500px;
        }
        .chat-header {
            background: #2A0088;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }
        #chat-messages {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #f9f9f9;
        }
        .message {
            max-width: 80%;
            padding: 10px 15px;
            border-radius: 15px;
            font-size: 14px;
            line-height: 1.4;
        }
        .user-message {
            align-self: flex-end;
            background: #FF6A00;
            color: white;
            border-bottom-right-radius: 2px;
        }
        .ai-message {
            align-self: flex-start;
            background: #e0e0e0;
            color: #333;
            border-bottom-left-radius: 2px;
        }
        .chat-input-area {
            display: flex;
            padding: 15px;
            border-top: 1px solid #eee;
            background: white;
        }
        #user-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }
        #send-btn {
            background: #2A0088;
            color: white;
            border: none;
            padding: 0 20px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .link_saudacao { color: white; text-decoration: none; font-weight: bolder; }
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
                <a href="venda.php"><button class="btn-vender">Vender</button></a>
            </div>
            <div class="right-info">
                <div class="div_icones">
                    <?php if (isset($_SESSION['nome'])): ?>
                        <div class="dropdown">
                            <a href="#"><i class="fas fa-user-circle" id="icone_perfil"></i></a>
                            <span class="link_saudacao">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></span>
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
                <li><a href="atendimentos.php">Atendimento IA</a></li>
            </ul>
        </nav>
    </header>

    <div class="linha-laranja"></div>

    <main>
        <div class="chat-container">
            <div class="chat-header">Assistente Virtual AirPlace</div>
            <div id="chat-messages">
                <div class="message ai-message">Olá! Eu sou a IA da AirPlace. Como posso te ajudar hoje? (Tente perguntar sobre drones, preços ou entregas)</div>
            </div>
            <div class="chat-input-area">
                <input type="text" id="user-input" placeholder="Digite sua dúvida...">
                <button id="send-btn" onclick="sendMessage()">Enviar</button>
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

        function sendMessage() {
            const text = userInput.value.trim();
            if (!text) return;

            appendMessage(text, 'user-message');
            userInput.value = '';

            setTimeout(() => {
                const response = getAIResponse(text);
                appendMessage(response, 'ai-message');
            }, 800);
        }

        function getAIResponse(text) {
            const input = text.toLowerCase();
            if (input.includes('drone')) return "Nossos drones são de última geração, ideais para lazer ou entregas comerciais!";
            if (input.includes('preço') || input.includes('valor')) return "Temos os melhores preços do mercado! Verifique nossa aba de Ofertas para descontos de até 50%.";
            if (input.includes('entrega')) return "Sim! Realizamos entregas via drone em várias regiões. É rápido e ecológico.";
            if (input.includes('ajuda') || input.includes('problema')) return "Sinto muito que esteja com problemas. Você pode nos contatar também pelo e-mail suporte@airplace.com.";
            return "Interessante! Não tenho certeza se entendi, mas posso falar sobre drones, entregas ou nossos produtos.";
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
