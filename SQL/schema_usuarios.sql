-- ============================================================
-- schema_usuarios.sql — ETRIP
-- Adiciona login/contas e migra o histórico de JSON pra MySQL.
-- Rode DEPOIS do schema.sql e do dados_iniciais.sql.
-- ============================================================

USE etrip;

-- ------------------------------------------------------------
-- Tabela: usuarios
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Tabela: historico_simulacoes (substitui o historico.json)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS historico_simulacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    carro VARCHAR(150) NOT NULL,
    imagem VARCHAR(255) DEFAULT '',
    origem VARCHAR(50) NOT NULL,
    destino VARCHAR(50) NOT NULL,
    distancia_km DECIMAL(6,1) NOT NULL,
    situacao VARCHAR(30) NOT NULL,
    data_hora DATETIME DEFAULT CURRENT_TIMESTAMP,
    carro_id INT NOT NULL,
    percentual_saida DECIMAL(5,2) NOT NULL,
    percentual_chegada DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    INDEX idx_usuario (usuario_id)
) ENGINE=InnoDB;