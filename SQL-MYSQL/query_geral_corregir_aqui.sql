/* CRIAR DATABASE E TABELA PRODUTOS (LISTA 01 - 27/06) */
CREATE DATABASE gestao_produtos;

USE gestao_produtos;

CREATE TABLE produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100),
    sku VARCHAR (30),
    descricao VARCHAR (200),
    categoria VARCHAR (30),
    preco FLOAT,
    unidade_medida VARCHAR (20),
    peso FLOAT,
    quantidade_estoque INT,
    fabricante VARCHAR (50),
    fornecedor VARCHAR(50),
    deleted_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL
);


/* INSERIR DADOS NA TABELA PRODUTOS (LISTA 01 - 27/06) */
INSERT INTO produtos (nome, sku, descricao, categoria, preco, unidade_medida, peso, quantidade_estoque, fabricante, fornecedor) VALUES
('Produto A', 'SKU001', 'Descrição do Produto A', 'Categoria 1', 12.99, 'Unidade', 1, 100, 'Fabricante A', 'Fornecedor A'),
('Produto B', 'SKU002', 'Descrição do Produto B', 'Categoria 2', 25.50, 'Litros', 1.25, 50, 'Fabricante B', 'Fornecedor B'),
('Produto C', 'SKU003', 'Descrição do Produto C', 'Categoria 3', 7.80, 'Litros', 0.3, 200, 'Fabricante A', 'Fornecedor C'),
('Produto D', 'SKU004', 'Descrição do Produto D', 'Categoria 1', 19.99, 'Quilos', 1.2, 30, 'Fabricante C', 'Fornecedor D'),
('Produto E', 'SKU005', 'Descrição do Produto E', 'Categoria 2', 10.00, 'Unidade', 1, 80, 'Fabricante A', 'Fornecedor E'),
('Produto F', 'SKU006', 'Descrição do Produto F', 'Categoria 3', 30.00, 'Unidade', 1, 60, 'Fabricante D', 'Fornecedor A'),
('Produto G', 'SKU007', 'Descrição do Produto G', 'Categoria 1', 14.50, 'Quilos', 0.4, 120, 'Fabricante B', 'Fornecedor B'),
('Produto H', 'SKU008', 'Descrição do Produto H', 'Categoria 2', 22.00, 'Litros', 1.1, 90, 'Fabricante C', 'Fornecedor C'),
('Produto I', 'SKU009', 'Descrição do Produto I', 'Categoria 3', 18.75, 'Litros', 1.3, 70, 'Fabricante D', 'Fornecedor D'),
('Produto J', 'SKU010', 'Descrição do Produto J', 'Categoria 1', 27.30, 'Unidade', 1, 110, 'Fabricante B', 'Fornecedor E');


/* ATUALIZAR DADOS DA TABELA PRODUTOS (LISTA 01 - 27/06) */
UPDATE produtos SET FORNECEDOR = 'Fornecedor XX', UPDATED_AT = CURRENT_TIMESTAMP 
WHERE FORNECEDOR = 'Fornecedor A';
UPDATE produtos 
SET PRECO = ROUND(PRECO* 0.8, 2),  UPDATED_AT = CURRENT_TIMESTAMP
WHERE CATEGORIA = 'Categoria 1';


/* CRIAR NOVAS TABELAS SEGREGADAS (LISTA 02 - 04/07) */
CREATE TABLE categorias (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_categoria VARCHAR(50),
    deleted_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL
);
CREATE TABLE unidades_medida (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_unidade VARCHAR(50),
    deleted_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL
);
CREATE TABLE fabricantes (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_fabricante VARCHAR(70),
    deleted_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL
);
CREATE TABLE fornecedores (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(70),
    deleted_at TIMESTAMP DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL
);


/* POPULAR NOVAS TABELAS SEGREGADAS (LISTA 02 - 04/07) */
INSERT INTO categorias (nome_categoria) VALUES
('Categoria 1'), ('Categoria 2'), ('Categoria 3');
INSERT INTO unidades_medida (nome_unidade) VALUES
('Unidade'), ('Litros'), ('Quilos');
INSERT INTO fabricantes (nome_fabricante) VALUES
('Fabricante A'), ('Fabricante B'), ('Fabricante C'), ('Fabricante D');
INSERT INTO fornecedores (nome_fornecedor) VALUES
('Fornecedor XX'), ('Fornecedor B'), ('Fornecedor C'), ('Fornecedor D'), ('Fornecedor E');


/* MODIFICAR TABELA PRODUTOS PARA BUSCAR ID DE FORA (LISTA 02 - 04/07) */
ALTER TABLE produtos ADD COLUMN (categoria_id INT);
UPDATE produtos SET categoria_id = 1 WHERE categoria = 'Categoria 1';
UPDATE produtos SET categoria_id = 2 WHERE categoria = 'Categoria 2';
UPDATE produtos SET categoria_id = 3 WHERE categoria = 'Categoria 3';
ALTER TABLE produtos DROP COLUMN categoria;

ALTER TABLE produtos ADD COLUMN (unidade_medida_id INT);
UPDATE produtos SET unidade_medida_id = 1 WHERE unidade_medida = 'Unidade';
UPDATE produtos SET unidade_medida_id = 2 WHERE unidade_medida = 'Litros';
UPDATE produtos SET unidade_medida_id = 3 WHERE unidade_medida = 'Quilos';
ALTER TABLE produtos DROP COLUMN unidade_medida;

ALTER TABLE produtos ADD COLUMN (fabricante_id INT);
UPDATE produtos SET fabricante_id = 1 WHERE fabricante = 'Fabricante A';
UPDATE produtos SET fabricante_id = 2 WHERE fabricante = 'Fabricante B';
UPDATE produtos SET fabricante_id = 3 WHERE fabricante = 'Fabricante C';
UPDATE produtos SET fabricante_id = 4 WHERE fabricante = 'Fabricante D';
ALTER TABLE produtos DROP COLUMN fabricante;

ALTER TABLE produtos ADD COLUMN (fornecedor_id INT);
UPDATE produtos SET fornecedor_id = 1 WHERE fornecedor = 'Fornecedor XX';
UPDATE produtos SET fornecedor_id = 2 WHERE fornecedor = 'Fornecedor B';
UPDATE produtos SET fornecedor_id = 3 WHERE fornecedor = 'Fornecedor C';
UPDATE produtos SET fornecedor_id = 4 WHERE fornecedor = 'Fornecedor D';
UPDATE produtos SET fornecedor_id = 5 WHERE fornecedor = 'Fornecedor E';
ALTER TABLE produtos DROP COLUMN fornecedor;

/* CONSULTAS COM JOINS (LISTA 02 - 04/07) */
SELECT p.nome as nome_produto, p.sku, p.descricao, p.preco, p.peso, p.quantidade_estoque as estoque, fab.nome_fabricante
FROM produtos p
INNER JOIN fabricantes fab
ON p.fabricante_id = fab.id
WHERE fab.id = 3;

SELECT p.nome as nome_produto, p.sku, p.descricao, p.preco, p.peso, p.quantidade_estoque as estoque, c.nome_categoria as categoria, u.nome_unidade as un_medida
FROM produtos p
INNER JOIN categorias c
ON p.categoria_id = c.id
INNER JOIN unidades_medida u
ON p.unidade_medida_id = u.id
WHERE c.id = 1 AND u.id = 3;

SELECT fr.nome_fornecedor, p.nome as produto, SUM(p.quantidade_estoque) as total_estoque
FROM produtos p
INNER JOIN fornecedores fr
WHERE p.fornecedor_id = 5
GROUP BY fr.nome_fornecedor, p.nome
HAVING fr.nome_fornecedor = 'Fornecedor E';