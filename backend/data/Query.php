<?php
/**
 * Query.php
 *
 * Abre (e devolve) a conexão PDO com o banco MySQL do ETRIP.
 * Ajuste $usuario e $senha conforme o ambiente (no XAMPP padrão,
 * usuário "root" e senha em branco já funcionam).
 */
function conectarBanco() {
    $host = 'localhost';
    $dbname = 'etrip';
    $usuario = 'MiguelSFreitas';
    $senha = '1234';

    try {
        $pdo = new PDO(
            "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
            $usuario,
            $senha
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        throw new Exception('Não foi possível conectar ao banco de dados. Verifique se o MySQL está rodando.');
    }
}