<?php

use App\Controllers\ProdutoController;

$instance = new ProdutoController(DB_HOST, DB_NAME, DB_USER, DB_PASS);

$id = $_GET['id'];

$produto = $instance->selectUnitario($id);
$produto = $produto[0];

$unidadeMedidas = $instance->selectMedidas();
$categorias = $instance->selectCategorias();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produto</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
    <div class="container">
            <div class="header cadastro">
                <a class="new-item-btn cadastro" href="/produtos">
                    <i class="fa-solid fa-chevron-left"></i>
                    &nbspVoltar
                </a>
            

                <h2 class="cadastro-title">Atualizar item</h2>
            </div>
            <div class="formulario">
                <div class="container-form">
                    <form action="/produtos/atualizar?id=<?= $produto['id'] ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                        <div class="cadastro-name">
                            <label for="nome" class="required">Nome</label><br>
                            <input type="text" name="nome" id="nome" value="<?= $produto['nome']?>" required><br>
                        </div>
                        
                        
                        <div class="container-halfs">
                            <div class="half">
                                <label for="sku" class="required">SKU</label><br>
                                <input type="text" name="sku" id="sku" value="<?= $produto['sku']?>" required>

                                <label for="unidade-medida" class="required">Unidade de medida</label>
                                <select name="unidade_medida_id" id="unidade-medida" required>
                                <?php
                                foreach ($unidadeMedidas as $unidade) {
                                    $selected = ($unidade['id'] == $produto['unidade_medida_id']) ? 'selected' : '';
                                    echo "<option value=" . $unidade['id'] . " $selected>{$unidade['nome']}</option>";
                                }
                                ?>
                                </select>
                            </div>
                            <div class="half">
                                <label for="valor" class="required">Preço</label><br>
                                <input type="number" name="valor" id="valor" step="0.01" value="<?= $produto['valor']?>" required><br>

                                <label for="quantidade" class="required">Quantidade</label><br>
                                <input type="number" name="quantidade" id="quantidade" value="<?= $produto['quantidade']?>" required><br>
                            </div>
                            
                            
                        </div>
                            

                        <div class="cadastro-categoria">
                            <section>
                                <label for="categorias" class="required">Categorias</label><br>
                                <select name="categoria_id" id="tag" required>
                                <?php
                                foreach ($categorias as $categoria) {
                                    $selected = ($categoria['id'] == $produto['categoria_id']) ? 'selected' : '';
                                    echo "<option value=" . $categoria['id'] . " $selected>{$categoria['nome']}</option>";
                                }
                                ?>
                                </select>
                            </section>
                            
                            <button class="edit-btn" type="submit" name="atualizar">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>
</html>