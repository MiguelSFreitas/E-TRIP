<?php
/**
 * Carro.php
 * Representa um carro elétrico do ETRIP.
 */

class Carro {
    public $id;
    public $marca;
    public $modelo;
    public $versao;
    public $bateriaKwh;
    public $consumoKwhKm;
    public $autonomiaKm;

    public function __construct($id, $marca, $modelo, $versao, $bateriaKwh, $consumoKwhKm, $autonomiaKm) {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->versao = $versao;
        $this->bateriaKwh = $bateriaKwh;
        $this->consumoKwhKm = $consumoKwhKm;
        $this->autonomiaKm = $autonomiaKm;
    }

    // Retorna o nome completo, tipo "BYD Dolphin Mini GS"
    public function nomeCompleto() {
        return "{$this->marca} {$this->modelo} {$this->versao}";
    }

    // Cria um objeto Carro a partir de um item do array $carros
    public static function criarDeArray($dadosArray) {
        return new Carro(
            $dadosArray['id'],
            $dadosArray['marca'],
            $dadosArray['modelo'],
            $dadosArray['versao'],
            $dadosArray['bateria_kwh'],
            $dadosArray['consumo_kwh_km'],
            $dadosArray['autonomia_km']
        );
    }
}