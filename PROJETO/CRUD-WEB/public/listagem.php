<?php

// namespace Public;

// use App\Produtos;

// $rotasProdutos = new Produtos();
// var_dump($rotasProdutos->listar());
// exit();

session_start();

if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}


function criarID()
{
    $novoID = end($_SESSION['produtos'])['id'] + 1;
    return $novoID;
}

if (isset($_POST['editar'])) {

    $id = $_POST['id'];

    $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));

    if ($indice !== false) {
        $_SESSION['produtos'][$indice]['nome'] = $_POST['nome'];
        $_SESSION['produtos'][$indice]['sku'] = $_POST['sku'];
        $_SESSION['produtos'][$indice]['valor'] = $_POST['valor'];
        $_SESSION['produtos'][$indice]['quantidade'] = $_POST['quantidade'];
        $_SESSION['produtos'][$indice]['unidade_medida_id'] = $_POST['unidade-medida'];
        $_SESSION['produtos'][$indice]['categoria_id'] = $_POST['tag'];

        header('Location: listagem.php');
        exit;
    }
}

if (isset($_POST['cadastrar'])) {

    $id = criarID();

    $_SESSION['produtos'][] = [
        'id' => $id,
        'nome' => $_POST['nome'],
        'sku' => $_POST['sku'],
        'unidade_medida_id' => $_POST['unidade-medida'],
        'valor' => $_POST['valor'],
        'quantidade' => $_POST['quantidade'],
        'categoria_id' => $_POST['tag'],
    ];
    header('Location: listagem.php');
    exit;
}

if (isset($_POST['deletar'])){

    $id = $_POST['id'];
    $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));
    if ($indice !== false) {    
        unset($_SESSION['produtos'][$indice]);
        $_SESSION['produtos'] = array_values($_SESSION['produtos']);
        header('Location: listagem.php');
        exit;
    }
}

// if (isset($_POST['pesquisar'])) {
//     $palavraPesquisada = $_POST['pesquisar'];

//     $novoArray = [];
//     foreach($produtos as $produto) {
//         if (str_contains($produto['nome'], $palavraPesquisada)) {
//             $novoArray[] = $produto;
//         }
//     }

//     var_dump($novoArray);

//     if (!empty($novoArray)) {
//         $produtos = $novoArray;
//         $var_dump($produtos);
//         header('Location: listagem.php');
//         exit;
//     }
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
                <a href="formulario-cadastro.php" class="new-item-btn">
                    <i class="fa-solid fa-plus"></i>
                    &nbspNovo item
                </a>
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
                            <a href="formulario-edit.php?id=<?= $produto['id'] ?>" class="edit-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                                &nbspEditar
                            </a>
                            <form action="listagem.php" method="POST">
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