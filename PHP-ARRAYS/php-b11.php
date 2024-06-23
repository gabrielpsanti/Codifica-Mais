<?php

$estoque = [
    [
        'sku' => 'GRA-001',
        'nome' => 'Arroz 5kg',
        'unidade_medida' => '5kg',
        'quantidade' => 50,
        'preco' => 37.95
        ],
        [
        'sku' => 'GRA-002',
        'nome' => 'Feijão Preto 1kg',
        'unidade_medida' => '1kg',
        'quantidade' => 30,
        'preco' => 8.99
        ],
        [
        'sku' => 'MAS-003',
        'nome' => 'Macarrão Espaguete 500g',
        'unidade_medida' => '500g',
        'quantidade' => 100,
        'preco' => 9.99
        ],
        [
        'sku' => 'MAN-004',
        'nome' => 'Óleo de Soja 900ml',
        'unidade_medida' => '900ml',
        'quantidade' => 60,
        'preco' => 6.98
        ],
        [
        'sku' => 'GRA-005',
        'nome' => 'Açúcar Refinado 1kg',
        'unidade_medida' => '1kg',
        'quantidade' => 80,
        'preco' => 4.98
        ],
        [
        'sku' => 'GRA-006',
        'nome' => 'Sal Refinado 1kg',
        'unidade_medida' => '1kg',
        'quantidade' => 40,
        'preco' => 4.5
        ],
        [
        'sku' => 'GRA-007',
        'nome' => 'Café Torrado e Moído 500g',
        'unidade_medida' => '500g',
        'quantidade' => 20,
        'preco' => 16.98
        ],
        [
        'sku' => 'BEB-008',
        'nome' => 'Leite UHT Integral 1L',
        'unidade_medida' => '1L',
        'quantidade' => 70,
        'preco' => 6.99
        ],
        [
        'sku' => 'GRA-009',
        'nome' => 'Farinha de Trigo 1kg',
        'unidade_medida' => '1kg',
        'quantidade' => 90,
        'preco' => 5.45
        ],
        [
        'sku' => 'PRO-010',
        'nome' => 'Molho de Tomate',
        'unidade_medida' => '340g',
        'quantidade' => 50,
        'preco' => 3.99
        ]
];

// Função para adicionar produtos
function adicionarProduto(&$estoque, $codigo, $nome, $tamanho, $cor, $quantidade)
{
    $estoque += [
         $codigo  => [
            'nome'=> $nome,
            'tamanho'=> $tamanho,
            'cor'=> $cor,
            'quantidade' => $quantidade
            ]
    ]; 
    echo "Produto adicionado. \n";
}

// Função para listar estoque
function listarEstoque($estoque){
    if (empty($estoque)) {
        echo "Lista vazia, nenhum produto em estoque.\n";
    } else {
        foreach ($estoque as $key => $value) {
            ['nome' => $nome, 
            'tamanho' => $tamanho, 
            'cor' => $cor, 
            'quantidade' => $quantidade] = $value; // Lista para simplificar chamada dos elementos do array
            echo "Codigo: $key <----- \nNome: $nome  Tam: $tamanho  Cor: $cor  Qnt: $quantidade" . PHP_EOL;
        }
    };
    
}

// Função para exibir o menu e obter a escolha do usuário
function exibirMenu()
{
    echo "\n";
    echo "Escolha uma das opções abaixo:\n";
    echo "1. Adicionar um produto\n";
    echo "2. Vender um produto\n";
    echo "3. Verificar Estoque\n";
    echo "4. Listar o Estoque\n";
    echo "5. Sair\n";
    $opcao = readline("Digite a sua escolha: ");
    return $opcao;
}

// Função para verificar estoque
function verificarEstoque($estoque, $codigo)
{
    if (!array_key_exists($codigo, $estoque)){
        echo "Produto não encontrado. \n";
    } else {
        echo "Produto encontrado. Estoque atual: " . $estoque[$codigo]['quantidade'] . PHP_EOL;
    }
}

// Função para atualizar estoque
function adicionarEstoque (&$estoque, $sku, $quantidade) 
{
    $indice = array_search($sku, array_column($estoque, 'sku'));
    $estoque[$indice]['quantidade'] += $quantidade;
    echo "Estoque adicionado. Quantidade atual: " . $estoque[$indice]['quantidade'] . PHP_EOL;
}

// Função para relizar venda de produto
function venderProduto(&$estoque, $codigo, $quantidade) {
    // Primeiro verifica se há o produto em estoque
    if (!array_key_exists($codigo, $estoque)){
        echo "Produto não encontrado. Código inválido. \n";
    } else {
        // Se houver, verifica se a quantidade solicitada é válida
        if ($quantidade <= 0) {
            echo "Entrada esperada: valor MAIOR QUE ZERO. Operação encerrada.\n";
        } elseif ($quantidade > $estoque[$codigo]["quantidade"]) {
            echo "Quantidade solicitada maior do que a disponível em estoque. Operação encerrada. \n";
        } else {
            // Se a quantidade digitada for válida, segue com a operação
            $estoque[$codigo]['quantidade'] -= $quantidade;
            if ($estoque[$codigo]['quantidade'] == 0){
                echo "Estoque atualizado. Quantidade atual: " . $estoque[$codigo]['quantidade'] . ". \n----> Produto removido de estoque! <----\n";
                unset($estoque[$codigo]);
            } else {
                echo "Estoque atualizado. Quantidade atual: " . $estoque[$codigo]['quantidade'] . PHP_EOL;
            }
        }
    }
}

while (true) {

    $opcao = exibirMenu();

    switch ($opcao) {
        case 1:
            echo "Adicionar um produto\n";
            // Verifica se o array está vazio. Se estiver, segue com a operação e adiciona novo produto
            if (empty($estoque)){
                $codigo = readline("Digite o Código do produto: ");
                $nome = readline("Digite o Nome do produto: ");
                $tamanho = readline("Digite o Tamanho: ");
                $cor = readline("Digite a Cor: ");
                $quantidade = readline("Digite a Quantidade: ");
                adicionarProduto($estoque, $codigo, $nome, $tamanho, $cor, $quantidade);    
            } else {
                // Se o array não estiver vazio, o programa verifica se há algum produto com esse mesmo código para não duplicar linhas
                $codigo = readline("Digite o Código do produto: ");
                if (array_key_exists($codigo, $estoque)){
                    // Se existir, apenas incrementa quantidade sem necessidade de solicitar os outros dados
                    $quantidade = readline("Produto encontrado. Digite a quantidade que deseja adicionar: ");
                    $estoque[$codigo]['quantidade'] += $quantidade;
                    echo "Estoque atualizado. Quantidade atual do produto: ". $estoque[$codigo]['quantidade'] . PHP_EOL;
                } else {
                    // Se não, adiciona novo produto
                    $nome = readline("Digite o Nome do produto: ");
                    $tamanho = readline("Digite o Tamanho: ");
                    $cor = readline("Digite a Cor: ");
                    $quantidade = readline("Digite a Quantidade: ");
                    adicionarProduto($estoque, $codigo, $nome, $tamanho, $cor, $quantidade);
                    break;
                }
            }
            break;
        case 2:
            echo "Vender um produto\n";
            $codigo = readline("Digite o código do produto que deseja registrar a venda: ");
            $quantidade = readline("Digite a quantidade: ");
            venderProduto($estoque, $codigo, $quantidade);
            break;
        case 3:
            echo "Verificar Estoque\n";
            $codigo = readline("Digite o código do produto: ");
            verificarEstoque($estoque, $codigo);
            break;
        case 4:
            echo "Atualizar Estoque";
            adicionarEstoque($estoque, $sku, $quantidade);
            break;
        case 5:
            echo "Listar o Estoque\n";
            listarEstoque($estoque);
            break;
        case 6:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida. Por favor, tente novamente.\n";
            break;
    }
}
