<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de produtos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            border: 0.1px solid black;
            margin: 10px 50px 10px 50px;
        }

        button {
            border-radius: 3px;
            margin: 5px;
        }

        .superior {
            display: flex;
            justify-content: space-between;
            margin: 10px 5px 5px 5px;
            border: 0.1px solid black;
            align-items: center;
        }

        .superior__botao {
            display: flex;
        }

        .superior__pesquisa {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .lista {
            display: flex;
            flex-direction: column;
            margin: 5px;
            border: 0.1px solid black;
        }


        .lista__produto {
            display: flex;
            justify-content: space-between;
            border: 0px;
            margin: 5px;
        }

        .produto__esquerda {
            border: 0px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .esquerda__identificadores {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .produto__direita {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .direita__deletar {
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }

        .direita__deletar > button {
            background-color: #f00;
        }



    </style>
</head>
<body>
    <!-- <?php foreach ($_SESSION['produtos'] as $produto): ?>
    <pre><?= var_dump($produto) ?></pre>
    <?php endforeach; ?> -->


    <div class="superior">
        <button class="superior__botao">
            Novo Item
        </button>
        <form class="superior__pesquisa">
            <h1 class="pesquisa__titulo">Buscar item</h1>
            <input class="pesquisa__input" type="text" placeholder="Digite o nome do produto">
        </form>
    </div>

    <div class="lista">
        <div class="lista__produto">
            <div class="produto__esquerda">
                <div class="esquerda__identificadores">
                    <div class="identificadores__id">
                        #0001
                    </div>
                    <div class="identificadores__categoria">
                        Vestuário
                    </div>
                </div>
                <div class="esquerda__nome">
                    Camisa codifica+
                </div>
                <div>
                    <button class="esquerda__editar">
                        Editar
                    </button>
                </div>
                
            </div>
            <div class="produto__direita">
                <div class="direita__identificadores">
                    <div class="identificadores__sku">
                        SKU: KAS123912
                    </div>
                </div>
                <div class="direita__quantidade">
                    Quantidade: 50
                </div>
                <div class="direita__deletar">
                    <button>
                        Deletar
                    </button>
                </div>
            </div>
        </div>
        
    </div>
    <div class="lista">
        <div class="lista__produto">
            <div class="produto__esquerda">
                <div class="esquerda__identificadores">
                    <div class="identificadores__id">
                        #0001
                    </div>
                    <div class="identificadores__categoria">
                        Vestuário
                    </div>
                </div>
                <div class="esquerda__nome">
                    Camisa codifica+
                </div>
                <div>
                    <button class="esquerda__editar">
                        Editar
                    </button>
                </div>
                
            </div>
            <div class="produto__direita">
                <div class="direita__identificadores">
                    <div class="identificadores__sku">
                        SKU: KAS123912
                    </div>
                </div>
                <div class="direita__quantidade">
                    Quantidade: 50
                </div>
                <div class="direita__deletar">
                    <button>
                        Deletar
                    </button>
                </div>
            </div>
        </div>
        
    </div>

</body>
</html>