<?php

use App\Controllers\ProdutoController;

$instance = new ProdutoController(DB_HOST, DB_NAME, DB_USER, DB_PASS);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de itens</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="new-item">
                <form action="/produtos/criar" method="POST"">
                    <input type="hidden" name="criar">
                    <button type="submit" class="new-item-btn">
                        <i class="fa-solid fa-plus"></i>
                        &nbspNovo item
                    </button>
                </form>
            </div>
            
            <div class="search-bar">
                <label for="pesquisar">Buscar item</label>
                <form action="/produtos/pesquisar" method="GET">
                    <div class="search-body">
                        <input class="search-input" type="text" name="str" id="pesquisar">
                        <button type="submit" class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
                
        </div>
        <div class="container-items">
            <?php 
                if(isset($_GET['str']) && !empty($_GET['str'])) {
                    $produtos = $instance->pesquisar($_GET['str']);
                } else {
                    $produtos = $instance->selectAll(); 
                } 
            ?>
            <?php if (empty($produtos)) {?>
                <div class="item">
                    <p>Nenhum produto encontrado.</p>
                </div>
                    
            <?php } else { ?>
                <?php foreach ($produtos as $produto) { ?>
                    <div class="item">
                        <div class="item-body">
                            <div class="item-left">
                                <div class="identificadores">
                                    <p class="id">#00000<?= $produto['id']?>&nbsp</p>
                                    <span class="tag-<?= $produto['categoria_id']?>"><?= $produto['categoria_nome']?></span>
                                </div> 
                                <p class="item-name"><?= $produto['nome']?></p>
                            </div>
                            <div class="item-right">
                                <p>SKU: <?= $produto['sku']?></p>
                                <p>Quantidade: <?= $produto['quantidade']?></p>
                            </div>
                        </div>
                        
                        <div class="container-btns">
                        <form action="/produtos/editar" method="GET">
                            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                            <button class="edit-btn" type="submit">
                                <i class="fa-solid fa-pen-to-square"></i>
                                &nbspEditar
                            </button>
                        </form>
                            
                            <form action="/produtos/deletar?id=<?= $produto['id'] ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                                <button class="delete-btn" type="submit" name="deletar">
                                    Deletar&nbsp
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            

        </div>
    </div>
    
</body>
</html>