<?php

// require __DIR__ . '/../vendor/autoload.php';

// use Codifica\Produtos\Produtos;

// $rota = new Produtos();

session_start();

// if (!isset($_SESSION['produtos'])) {
//     $rota->listar();
// }

// if (isset($_POST['cadastrar'])) {

//     $rota->criar();
// }

// if (isset($_POST['editar'])) {

//     $rota->editar($_POST['id']);
// }

// if (isset($_POST['deletar'])){

//     $rota->deletar($_POST['id']);

// }


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
                <form action="/" method="POST"">
                    <input type="hidden" name="criar">
                    <button type="submit" class="new-item-btn">
                        <i class="fa-solid fa-plus"></i>
                        &nbspNovo item
                    </button>
                </form>
            </div>
            
            <div class="search-bar">
                <label for="pesquisar">&nbspBuscar item</label>
                <form action="listagem.php" method="POST">
                    <div class="search-body">
                        <input class="search-input" type="text" name="pesquisar" id="pesquisar">
                        <button type="submit" class="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
                
        </div>
        <div class="container-items">
            <?php if (empty($_SESSION['produtos'])) {?>
                <div class="item">
                    <p>Nenhum produto encontrado.</p>
                </div>
                    
            <?php } else { ?>
                <?php foreach ($_SESSION['produtos'] as $produto) { ?>
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
                        <form action="/" method="POST">
                            <input type="hidden" name="id-edit" value="<?= $produto['id'] ?>">
                            <button class="edit-btn" type="submit">
                                <i class="fa-solid fa-pen-to-square"></i>
                                &nbspEditar
                            </button>
                        </form>
                            
                            <form action="/" method="POST">
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