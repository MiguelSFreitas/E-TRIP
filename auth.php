<?php


function iniciarSessao() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}


function usuarioLogado() {
    iniciarSessao();
    return isset($_SESSION['usuario_id']);
}


function exigirLogin() {
    iniciarSessao();
    if (!usuarioLogado()) {
        header('Location: login.php');
        exit;
    }
}


function idUsuarioLogado() {
    iniciarSessao();
    return $_SESSION['usuario_id'] ?? null;
}

function nomeUsuarioLogado() {
    iniciarSessao();
    return $_SESSION['usuario_nome'] ?? '';
}