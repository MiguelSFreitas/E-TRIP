<?php
/**
 * PostoModel.php
 *
 * Model: busca os postos de recarga no banco MySQL.
 * Mesmas funções, mesma assinatura da versão em array — nenhum outro
 * arquivo do projeto precisa mudar.
 */

require_once __DIR__ . '/Query.php';

/**
 * Busca todos os postos cadastrados numa cidade específica.
 *
 * O segundo parâmetro ($postos) não é mais usado — existe só pra
 * manter compatibilidade com quem já chama essa função assim.
 */
function buscarPostosPorCidade($cidade, $postos = null) {
    $pdo = conectarBanco();
    $stmt = $pdo->prepare('SELECT * FROM postos_recarga WHERE cidade = ?');
    $stmt->execute([$cidade]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Busca um posto específico pelo ID.
 */
function buscarPostoPorId($postoId, $postos = null) {
    $pdo = conectarBanco();
    $stmt = $pdo->prepare('SELECT * FROM postos_recarga WHERE id = ?');
    $stmt->execute([$postoId]);
    $posto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $posto ?: null;
}