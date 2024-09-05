<?php
session_start();

function imprimirDadosSimples(int $id, string $chave): void 
{
    $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));
    if ($indice === false) {
        echo "";
    } else {
        echo $_SESSION['produtos'][$indice][$chave];
    }
}

function imprimirDadosSelect(int $id, string $chave, string $tabelaTipo): void
{
    $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));
    if ($indice === false) {
        echo "";
    } else {
        $idTabela = $_SESSION['produtos'][$indice][$chave];
        $valor = $_SESSION[$tabelaTipo][$idTabela];
        echo "- $valor *";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produto</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    
    <div class="container">
            <div class="header cadastro">
                <a class="new-item-btn cadastro" href="/">
                    <i class="fa-solid fa-chevron-left"></i>
                    &nbspVoltar
                </a>
            

                <h2 class="cadastro-title">Atualizar item</h2>
            </div>
            <div class="formulario">
                <div class="container-form">
                    <form action="/" method="POST">
                        <input type="hidden" name="id" value="<?= $_REQUEST['id-edit'] ?>">

                        <div class="cadastro-name">
                            <label for="nome" class="required">Nome</label><br>
                            <input type="text" name="nome" id="nome" value="<?php imprimirDadosSimples($_REQUEST['id-edit'], 'nome');?>" required><br>
                        </div>
                        
                        
                        <div class="container-halfs">
                            <div class="half">
                                <label for="sku" class="required">SKU</label><br>
                                <input type="text" name="sku" id="sku" value="<?php imprimirDadosSimples($_REQUEST['id-edit'], 'sku');?>" required>

                                <label for="unidade-medida" class="required">Unidade de medida</label>
                                <select name="unidade-medida" id="unidade-medida" required>
                                    <option value="" selected disabled>
                                        <?php imprimirDadosSelect($_REQUEST['id-edit'], 'unidade_medida_id', 'unidades_medidas');?>
                                    </option>
                                    <option value="1">Un</option>
                                    <option value="2">Kg</option>
                                    <option value="3">g</option>
                                    <option value="4">L</option>
                                    <option value="5">mm</option>
                                    <option value="6">cm</option>
                                    <option value="7">m</option>
                                    <option value="8">m²</option>
                                </select>
                            </div>
                            <div class="half">
                                <label for="valor" class="required">Preço</label><br>
                                <input type="number" name="valor" id="valor" step="0.01" value="<?php imprimirDadosSimples($_REQUEST['id-edit'], 'valor');?>" required><br>

                                <label for="quantidade" class="required">Quantidade</label><br>
                                <input type="number" name="quantidade" id="quantidade" value="<?php imprimirDadosSimples($_REQUEST['id-edit'], 'quantidade');?>" required><br>
                            </div>
                            
                            
                        </div>
                            

                        <div class="cadastro-categoria">
                            <section>
                                <label for="categorias" class="required">Categorias</label><br>
                                <select name="tag" id="tag" required>
                                    <option value="" selected disabled>
                                        <?php imprimirDadosSelect($_REQUEST['id-edit'], 'categoria_id', 'categorias');?>
                                    </option>
                                    <option value="1">Eletrônicos</option>
                                    <option value="2">Eletrodomesticos</option>
                                    <option value="3">Móveis</option>
                                    <option value="4">Decoração</option>
                                    <option value="5">Vestuário</option>
                                    <option value="7">Outros</option>
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