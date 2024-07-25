USE gestao_produtos;

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