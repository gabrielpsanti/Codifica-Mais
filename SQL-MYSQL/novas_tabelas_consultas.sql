USE gestao_produtos;

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