<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/backend/data/Query.php';

iniciarSessao();

// Se já estiver logado, não faz sentido ver a tela de cadastro
if (usuarioLogado()) {
    header('Location: index.php');
    exit;
}

$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmarSenha = $_POST['confirmar_senha'] ?? '';

    try {
        if ($nome === '' || $email === '' || $senha === '') {
            throw new Exception('Preencha todos os campos.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('E-mail inválido.');
        }
        if (strlen($senha) < 6) {
            throw new Exception('A senha precisa ter pelo menos 6 caracteres.');
        }
        if ($senha !== $confirmarSenha) {
            throw new Exception('As senhas não coincidem.');
        }

        $pdo = conectarBanco();

        $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            throw new Exception('Já existe uma conta com esse e-mail.');
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha_hash) VALUES (?, ?, ?)');
        $stmt->execute([$nome, $email, $senhaHash]);

       
        $_SESSION['usuario_id'] = $pdo->lastInsertId();
        $_SESSION['usuario_nome'] = $nome;

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
    <title>Criar conta — ETRIP</title>
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
            <li><a href="login.php">Entrar</a></li>
        </ul>
        <button type="button" id="toggle-tema" class="botao-tema" aria-label="Alternar modo escuro" title="Alternar modo escuro">🌙</button>
    </nav>

    <main class="camadas" style="margin-top: 110px;">

        <section class="camada" style="max-width:420px; margin:0 auto;">
            <header class="camada-topo">
                <span class="passo">＋</span>
                <div>
                    <h2>Criar conta</h2>
                    <p>Suas viagens ficam salvas só pra você.</p>
                </div>
            </header>

            <?php if ($erro): ?>
                <p class="aviso" role="alert"><?php echo htmlspecialchars($erro); ?></p>
            <?php endif; ?>

            <form method="post" action="cadastro.php">
                <p class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>">
                </p>
                <p class="campo">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </p>
                <p class="campo">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required minlength="6">
                </p>
                <p class="campo">
                    <label for="confirmar_senha">Confirmar senha</label>
                    <input type="password" name="confirmar_senha" id="confirmar_senha" required minlength="6">
                </p>

                <div class="acao">
                    <button type="submit">Criar conta</button>
                </div>
            </form>

            <p style="text-align:center; margin-top:16px; font-size:14px;">
                Já tem conta? <a href="login.php">Entrar</a>
            </p>
        </section>

    </main>

    <footer class="rodape">
        <img src="/img/etrip-logo-completa.png" alt="ETRIP" class="logo-footer">
    </footer>

    <script src="/js/tema.js"></script>

</body>

</html>