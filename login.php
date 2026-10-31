<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/backend/data/Query.php';

iniciarSessao();

if (usuarioLogado()) {
    header('Location: index.php');
    exit;
}

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    try {
        if ($email === '' || $senha === '') {
            throw new Exception('Preencha e-mail e senha.');
        }

        $pdo = conectarBanco();
        $stmt = $pdo->prepare('SELECT id, nome, senha_hash FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario || !password_verify($senha, $usuario['senha_hash'])) {
            throw new Exception('E-mail ou senha incorretos.');
        }

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

        header('Location: index.php');
        exit;

    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar — ETRIP</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>
        if (localStorage.getItem('etrip-tema') === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
</head>

<body>

    <nav class="menu">
        <a href="index.php" class="marca">
            <img src="/img/etrip-logo-completa.png" alt="ETRIP" class="logo-nav">
        </a>
        <ul>
            <li><a href="cadastro.php">Criar conta</a></li>
        </ul>
        <button type="button" id="toggle-tema" class="botao-tema" aria-label="Alternar modo escuro" title="Alternar modo escuro">🌙</button>
    </nav>

    <main class="camadas" style="margin-top: 110px;">

        <section class="camada" style="max-width:420px; margin:0 auto;">
            <header class="camada-topo">
                <span class="passo">🔑</span>
                <div>
                    <h2>Entrar</h2>
                    <p>Acesse sua conta ETRIP.</p>
                </div>
            </header>

            <?php if ($erro): ?>
                <p class="aviso" role="alert"><?php echo htmlspecialchars($erro); ?></p>
            <?php endif; ?>

            <form method="post" action="login.php">
                <p class="campo">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </p>
                <p class="campo">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required>
                </p>

                <div class="acao">
                    <button type="submit">Entrar</button>
                </div>
            </form>

            <p style="text-align:center; margin-top:16px; font-size:14px;">
                Não tem conta? <a href="cadastro.php">Criar conta</a>
            </p>
        </section>

    </main>

    <footer class="rodape">
        <img src="/img/etrip-logo-completa.png" alt="ETRIP" class="logo-footer">
    </footer>

    <script src="/js/tema.js"></script>

</body>

</html>