CREATE DATABASE IF NOT EXISTS codifica;

USE codifica;

CREATE TABLE IF NOT EXISTS filmes (
	id_filme INT AUTO_INCREMENT PRIMARY KEY,
    titulo_do_filme VARCHAR(255),
    titulo_original VARCHAR(255),
    ano_de_lancamento SMALLINT,
    classificacao VARCHAR(255),
	duracao INT,
    categorias VARCHAR(255),
    avaliacao DECIMAL(3,1)
);