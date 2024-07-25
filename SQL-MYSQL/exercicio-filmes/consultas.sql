USE codifica;

SELECT * FROM FILMES;

SELECT titulo_original, avaliacao 
FROM filmes 
ORDER BY avaliacao DESC;

SELECT *
FROM filmes 
ORDER BY duracao DESC LIMIT 1;

SELECT titulo_do_filme, duracao, classificacao 
FROM filmes 
WHERE classificacao <= 16 
ORDER BY duracao LIMIT 3;

SELECT *
FROM filmes 
ORDER BY ano_de_lancamento, avaliacao DESC;

SELECT *
FROM filmes 
WHERE categorias LIKE '%Drama%';

SELECT COUNT(titulo_do_filme) as total_registros 
FROM filmes;

SELECT classificacao, COUNT(classificacao) as total_registros 
FROM filmes 
GROUP BY classificacao 
ORDER BY classificacao;

SELECT classificacao, COUNT(id_filme) as total_registros, SUM(duracao) as duracao_total, ROUND(AVG(avaliacao), 1) as avaliacao_media 
FROM filmes 
GROUP BY classificacao 
ORDER BY classificacao;

-- exercício removido
USE codifica;

SELECT sum(x.duracao) AS duracao_total
FROM(
    SELECT duracao, COUNT(id_filme) AS auxiliar 
    FROM filmes 
    GROUP BY duracao 
    ORDER BY duracao DESC LIMIT 3
    ) x 
GROUP BY x.auxiliar;
