<?php
/**
 * CarroModel.php
 *
 * Model: busca os dados dos carros no banco MySQL.
 * As funções têm o MESMO nome e MESMA assinatura de antes (quando os
 * dados vinham de array) — por isso nenhum outro arquivo do projeto
 * (Resultado.php, index.php) precisa mudar, só este aqui.
 */

require_once __DIR__ . '/Query.php';

/**
 * Busca um carro pelo ID.
 * Retorna null se o carro não existir.
 *
 * O segundo parâmetro ($carros) não é mais usado — existe só pra
 * manter a mesma assinatura da versão antiga (array), então quem
 * chama essa função não precisa mudar nada.
 */
function buscarCarroPorId($carroId, $carros = null) {
    $pdo = conectarBanco();
    $stmt = $pdo->prepare('SELECT * FROM carros WHERE id = ?');
    $stmt->execute([$carroId]);
    $carro = $stmt->fetch(PDO::FETCH_ASSOC);
    return $carro ?: null;
}

/**
 * Retorna a lista de marcas únicas, em ordem alfabética.
 */
function listarMarcas($carros = null) {
    $pdo = conectarBanco();
    $stmt = $pdo->query('SELECT DISTINCT marca FROM carros ORDER BY marca');
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

/**
 * Retorna os carros de uma marca específica.
 */
function listarModelosPorMarca($marca, $carros = null) {
    $pdo = conectarBanco();
    $stmt = $pdo->prepare('SELECT * FROM carros WHERE marca = ?');
    $stmt->execute([$marca]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Retorna TODOS os carros cadastrados.
 * Usada pelo index.php pra montar o select e pra exportar em JSON
 * pro selects.js filtrar modelo/versão no navegador.
 */
function listarTodosCarros() {
    $pdo = conectarBanco();
    $stmt = $pdo->query('SELECT * FROM carros ORDER BY marca, modelo, versao');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Mantém a variável $carros disponível pra quem ainda usa esse nome
// direto (ex: index.php fazia `foreach ($carros as $carro)`), assim
// não precisa trocar require_once nem lógica nenhuma lá.
$carros = listarTodosCarros();