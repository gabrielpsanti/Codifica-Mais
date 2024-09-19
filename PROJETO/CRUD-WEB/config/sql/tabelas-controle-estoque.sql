CREATE DATABASE crudcodifica;

USE crudcodifica;

-- Tabela de Categorias
CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE INDEX idx_categoria_nome ON categoria(nome);

-- Tabela de Unidades de Medida
CREATE TABLE unidade_medida (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

CREATE INDEX idx_unidade_nome ON unidade_medida(nome);

-- Tabela de Produtos
CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sku VARCHAR(50) NOT NULL,
    unidade_medida_id INT NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    categoria_id INT NOT NULL
);

CREATE INDEX idx_produto_categoria ON produto(categoria_id);
CREATE INDEX idx_produto_unidade ON produto(unidade_medida_id);
 