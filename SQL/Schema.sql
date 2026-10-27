-- ============================================================
-- schema.sql — ETRIP
-- Rode este arquivo no MySQL Workbench (ou phpMyAdmin) pra criar
-- o banco e as duas tabelas: carros e postos_recarga.
-- ============================================================

CREATE DATABASE IF NOT EXISTS etrip CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE etrip;

-- ------------------------------------------------------------
-- Tabela: carros
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    versao VARCHAR(50) NOT NULL,
    bateria_kwh DECIMAL(6,2) NOT NULL,
    consumo_kwh_km DECIMAL(6,3) NOT NULL,
    autonomia_km INT NOT NULL,
    caminho_imagem VARCHAR(255) DEFAULT ''
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Tabela: postos_recarga
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS postos_recarga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    tipo_conector VARCHAR(30) NOT NULL,
    potencia_kw DECIMAL(6,2) NOT NULL,
    INDEX idx_cidade (cidade)
) ENGINE=InnoDB;