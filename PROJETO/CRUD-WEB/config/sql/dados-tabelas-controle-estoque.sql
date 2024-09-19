-- Inserts para a tabela de Categorias
INSERT INTO categoria (id, nome) VALUES
(1, 'Eletrônicos'),
(2, 'Eletrodomésticos'),
(3, 'Móveis'),
(4, 'Decoração'),
(5, 'Vestuário'),
(7, 'Outros');

-- Inserts para a tabela de Unidades de Medida
INSERT INTO unidade_medida (id, nome) VALUES
(1, 'Un'),
(2, 'Kg'),
(3, 'g'),
(4, 'L'),
(5, 'mm'),
(6, 'cm'),
(7, 'm'),
(8, 'm²');

-- Inserts para a tabela de Produtos
INSERT INTO produto (id, nome, sku, unidade_medida_id, valor, quantidade, categoria_id) VALUES
(1, 'Smartphone', '123456', 1, 1500.00, 10, 1),
(2, 'Geladeira', '123457', 2, 2500.00, 5, 2);
