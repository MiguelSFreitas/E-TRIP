<?php
/**
 * PostoRecarga.php
 * Representa um posto de recarga do ETRIP.
 */

class PostoRecarga {
    public $id;
    public $nome;
    public $cidade;
    public $endereco;
    public $tipoConector;
    public $potenciaKw;

    public function __construct($id, $nome, $cidade, $endereco, $tipoConector, $potenciaKw) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->tipoConector = $tipoConector;
        $this->potenciaKw = $potenciaKw;
    }

    // Cria um objeto PostoRecarga a partir de um item do array $postos
    public static function criarDeArray($dadosArray) {
        return new PostoRecarga(
            $dadosArray['id'],
            $dadosArray['nome'],
            $dadosArray['cidade'],
            $dadosArray['endereco'],
            $dadosArray['tipo_conector'],
            $dadosArray['potencia_kw']
        );
    }
}