SELECT 
            produto.id,
            produto.nome,
            produto.sku,
            produto.valor,
            produto.quantidade,
            categoria.id AS categoria_id,
            categoria.nome AS categoria_nome,
            unidade_medida.id AS unidade_medida_id,
            unidade_medida.nome AS unidade_nome
        FROM 
            produto
        INNER JOIN 
            categoria ON produto.categoria_id = categoria.id
        INNER JOIN 
            unidade_medida ON produto.unidade_medida_id = unidade_medida.id
        ORDER BY 
            produto.id ASC;