-- ============================================================
-- dados_iniciais.sql — ETRIP
-- Popula as tabelas carros e postos_recarga com os dados já
-- verificados. Rode DEPOIS do schema.sql.
-- ============================================================

USE etrip;

-- ------------------------------------------------------------
-- Carros (9 versões, dados verificados em fichas técnicas/Inmetro)
-- ------------------------------------------------------------
INSERT INTO carros (marca, modelo, versao, bateria_kwh, consumo_kwh_km, autonomia_km, caminho_imagem) VALUES
('BYD', 'Dolphin Mini', 'GS', 38.0, 0.136, 280, 'carrosimg/byd-dolphin-mini.png'),
('BYD', 'Dolphin Mini', 'GL', 30.08, 0.096, 224, ''),
('BYD', 'Dolphin', 'GS', 44.9, 0.154, 291, ''),
('Geely', 'EX2', 'Pro', 39.4, 0.136, 289, ''),
('Geely', 'EX2', 'Max', 39.4, 0.136, 289, ''),
('Chevrolet', 'Spark EUV', 'Padrão', 42.0, 0.163, 258, ''),
('BYD', 'Yuan Pro', 'Padrão', 45.1, 0.135, 250, ''),
('GAC', 'Aion UT', 'Premium', 44.12, 0.174, 253, ''),
('GAC', 'Aion UT', 'Elite', 60.0, 0.194, 310, '');

-- ------------------------------------------------------------
-- Postos de recarga (21 postos reais, pesquisados no Open Charge Map)
-- ------------------------------------------------------------
INSERT INTO postos_recarga (nome, cidade, endereco, tipo_conector, potencia_kw) VALUES
('Posto Jisa (BR)', 'Pinheiros', 'Av. Setembrino Pelissari, 40 - Bairro Pinheirinho, Pinheiros - ES, 29980-000, Brazil', 'CCS2', 60),
('Sau2 | BR-101', 'São Mateus', 'Sau2 - BR-101 - Conceição da Barra, ES, 29960-000', 'Type 2', 7),
('Ponto De Apoio Rodonaldo', 'São Mateus', 'Ponto De Apoio Rodonaldo - BR-101, 57 - São Mateus, ES, Brasil', 'Type 2', 7),
('EDP - São Mateus', 'São Mateus', 'R. Manoel Andrade, 14 - Centro, São Mateus - ES, 29936-714, Brazil', 'Type 2', 7),
('Shopping Patiomix Linhares', 'Linhares', 'Shopping Patiomix Linhares - Linhares, ES, 29960-000', 'Type 2', 6),
('Eletroposto Ouro Negro', 'Linhares', 'Av. Prefeito Samuel Batista Cruz, 2319 - Colina, Linhares - ES, 29900-440, Brazil', 'CCS2', 60),
('Posto Petrobrás', 'Linhares', 'Av. Prefeito Samuel Batista Cruz, 1276 - Araçá, Linhares - ES, 29901-420, Brazil', 'CCS2', 60),
('SAU06 - Eco 101 KM210', 'Ibiraçu', 'BR-101, 2108 - Ibiraçu, ES, 29670-000, Brazil', 'Type 2', 7),
('SAU07 - Eco 101', 'Serra', 'Rod. Governador Mário Covas, 7 - Calogi, Serra - ES, Brasil', 'Type 2', 6),
('THE GARDEN ALPHAVILLE', 'Serra', 'Av. Mara Regina Paludo, 114 - Alphaville Jacuhy, Carapina, Serra (ES)', 'CCS2', 60),
('Zletric - Vitória Apart Hospital', 'Serra', 'R. Elias Thomas, 88 - Boa Vista I, Serra - ES, 29161-026, Brasil', 'CCS2', 60),
('Estação de recarga ChargeOn - Assai Vitória Aeroporto', 'Vitória', 'Av. Fernando Ferrari, 3740 - Goiabeiras, Vitória - ES, 29075-685, Brasil', 'CCS2', 59),
('EcoDot. - Fucape Business School', 'Vitória', 'Av. Fernando Ferrari, 1358 - Boa Vista, Vitória - ES, 29075-505', 'Type 2', 6),
('Posto Champagnat Praia Do Canto', 'Vitória', 'Av Nossa Sra da Penha, 508 - Praia do Canto, Vitória - ES, 29055-131, Brazil', 'Type 2', 6),
('Shopping Vitória - Acesso B', 'Vitória', 'Av. Américo Buaiz, 200 - Enseada do Suá, Vitória - ES, 29050-420, Brazil', 'CCS2', 120),
('Eletroposto Champagnat - HB Energi', 'Vila Velha', 'Avenida Hugo Musso, 500 - Praia da Costa - Vila Velha', 'CCS2', 80),
('Shopping Praia Da Costa', 'Vila Velha', 'Shopping Praia Da Costa R. Inácio Higino, 956-1038 - Vila Velha, ES, 29107, Brasil', 'Type 2', 6),
('Shopping Vila Velha', 'Vila Velha', 'Av. Luciano das Neves, 2418 - Divino Espírito Santo, Vila Velha - ES, 29100-200, Brasil', 'Type 2', 22),
('Posto Ipiranga', 'Vila Velha', 'Av. Santa Leopoldina, 1418 - Coqueiral de Itaparica, Vila Velha - ES, 29102-385, Brasil', 'CCS2', 60),
('Boulevard Shopping Vila Velha', 'Vila Velha', 'Boulevard Shopping Vila Velha - Rod. do Sol, 5000 - Itaparica, Vila Velha - ES, 29103-900', 'CCS2', 80),
('Boulevard Shopping Vila Velha', 'Vila Velha', 'Boulevard Shopping Vila Velha - Rod. do Sol, 5000 - Itaparica, Vila Velha - ES, 29103-900', 'Type 2', 22);