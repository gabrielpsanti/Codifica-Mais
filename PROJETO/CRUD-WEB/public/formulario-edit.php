<?php
session_start();

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
                <a class="new-item-btn cadastro" href="listagem.php">
                    <i class="fa-solid fa-chevron-left"></i>
                    &nbspVoltar
                </a>
            

                <h2 class="cadastro-title">Atualizar item</h2>
            </div>
            <div class="formulario">
                <div class="container-form">
                    <form action="cadastro.php" method="POST">
                        <div class="cadastro-name">
                            <label for="name" class="required">Nome</label><br>
                            <input type="text" name="name" id="name" required><br>
                        </div>
                        
                        
                        <div class="container-halfs">
                            <div class="half">
                                <label for="sku" class="required">SKU</label><br>
                                <input type="text" name="sku" id="sku" required>

                                <label for="unidade-medida" class="required">Unidade de medida</label>
                                <input type="text" name="unidade-medida" id="unidade-medida" required>
                            </div>
                            <div class="half">
                                <label for="preco" class="required">Preço</label><br>
                                <input type="number" name="preco" id="preco" required>

                                <label for="quantidade" class="required">Quantidade</label><br>
                            <input type="number" name="quantidade" id="quantidade" required>
                            </div>
                            
                            
                        </div>
                            

                        <div class="cadastro-categoria">
                            <section>
                                <label for="categorias" class="required">Categorias</label><br>
                                <select name="tag" required>
                                    <option value="0" selected disabled></option>
                                    <option value="eletronico">Eletrônico</option>
                                    <option value="eletrodomestico">Eletrodomestico</opetion>
                                    <option value="moveis">Móveis</opetion>
                                    <option value="decoracao">Decoração</opetion>
                                    <option value="vestuario">Vestuário</opetion>
                                    <option value="outros">Outros</opetion>
                                </select>
                            </section>
                            
                            <button class="edit-btn" type="submit">Atualizar</button>
                        </div>
                </div>
            </div>
    </div>
</body>
</html>