CREATE DATABASE gestao_produtos;

USE gestao_produtos;

CREATE TABLE produtos (
	id INT,
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

