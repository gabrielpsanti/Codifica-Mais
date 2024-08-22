<?php

// namespace Public;

// use App\Produtos;

// $rotasProdutos = new Produtos();
// var_dump($rotasProdutos->listar());
// exit();

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de itens</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="new-item">
                <a href="formulario-cadastro.php" class="new-item-btn">
                    <i class="fa-solid fa-plus"></i>
                    &nbspNovo item
                </a>
            </div>
            
            <div class="search-bar">
                <label for="search">&nbspBuscar item</label>
                <div class="search-body">
                    <input class="search-input" type="search" name="search">
                    <button class= "search-btn" name="search-btn" aria-label="Buscar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
                
        </div>
        <div class="container-items">
            <?php foreach ($_SESSION['produtos'] as $produto):?>
            <div class="item">
                <div class="item-body">
                    <div class="item-left">
                        <div class="identificadores">
                            <p class="id">#00000<?= $produto['id']?>&nbsp</p>
                            <span class="tag-<?= $produto['categoria_id']?>"><?= $_SESSION['categorias'][$produto['categoria_id']]?></span>
                        </div> 
                        <p class="item-name"><?= $produto['nome']?></p>
                    </div>
                    <div class="item-right">
                        <p>SKU: <?= $produto['sku']?></p>
                        <p>Quantidade: <?= $produto['quantidade']?></p>
                    </div>
                </div>
                
                <div class="container-btns">
                    <a href="formulario-edit.php" class="edit-btn">
                        <i class="fa-solid fa-pen-to-square"></i>
                        &nbspEditar
                    </a>
                    <button class="delete-btn">
                        Deletar&nbsp
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <?php endforeach; ?> 
            

        </div>
    </div>
    
</body>
</html>