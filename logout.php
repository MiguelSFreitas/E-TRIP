<?php
require_once __DIR__ . '/auth.php';
iniciarSessao();

$_SESSION = [];
session_destroy();

header('Location: login.php');
exit;