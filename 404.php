<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página não encontrada — ETRIP</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>
        if (localStorage.getItem('etrip-tema') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
    <style>
        
        .erro-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        .numero-404 {
            font-size: clamp(100px, 20vw, 180px);
            font-weight: 900;
            line-height: 1;
            color: var(--azul);
            background: linear-gradient(135deg, var(--azul), var(--azul-escuro));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            animation: entrar-esq .9s var(--curva) both;
        }

        :root[data-theme="dark"] .numero-404 {
            background: linear-gradient(135deg, var(--azul), var(--gelo));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>

    <nav class="menu">
        <a href="/index.php" class="marca">
            <img src="/img/etrip-logo-completa.png" alt="ETRIP" class="logo-nav">
        </a>
        <ul>
            <li><a href="/index.php">Início</a></li>
        </ul>
    </nav>

    <main class="camadas" style="margin-top: 110px;">
        <section class="camada">
            <div class="erro-container">
                <span class="numero-404">404</span>
                <div class="camada-topo" style="flex-direction: column; gap: 8px; margin-bottom: 24px;">
                    <h2>Essa rota não existe</h2>
                    <p>Parece que você tomou um desvio — essa página não foi encontrada ou foi removida.</p>
                </div>

                <div class="acao">
                    <a href="/index.php" class="hero-botao">Voltar para o ETRIP</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="rodape">
        <img src="/img/etrip-logo-completa.png" alt="ETRIP" class="logo-footer">
    </footer>

</body>

</html>