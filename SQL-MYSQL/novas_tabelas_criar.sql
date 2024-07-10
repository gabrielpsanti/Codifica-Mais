USE gestao_produtos;

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