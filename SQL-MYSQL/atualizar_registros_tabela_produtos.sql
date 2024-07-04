USE gestao_produtos;

UPDATE produtos SET FORNECEDOR = 'Fornecedor XX', UPDATED_AT = CURRENT_TIMESTAMP 
WHERE FORNECEDOR = 'Fornecedor A';

UPDATE produtos 
SET PRECO = ROUND(PRECO* 0.8, 2),  UPDATED_AT = CURRENT_TIMESTAMP
WHERE CATEGORIA = 'Categoria 1';