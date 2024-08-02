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

function exibirMenu()
{
    echo "\n";
    echo "Escolha uma das opções abaixo:\n";
    echo "1. Criar novo produto\n";
    echo "2. Vender um produto\n";
    echo "3. Verificar Estoque\n";
    echo "4. Listar o Estoque\n";
    echo "5. Adicionar Qntd Estoque\n";
    echo "6. Contagem de Estoque\n";
    echo "7. Deletar Produto\n";
    echo "8. Sair\n";
    $opcao = readline("Digite a sua escolha: ");
    return $opcao;
}

// Função para verificar se o SKU existe e retornar índice, caso exista
function checarSku($estoque, $sku)
{
    if (array_search($sku, array_column($estoque, 'sku')) === false){
        return false;
    } else {
        $indice = array_search($sku, array_column($estoque, 'sku'));
        return $indice;
    }
}

// Função para criar um novo produto
function criarProduto(&$estoque, $sku, $nome, $unidade_medida, $preco, $quantidade)
{
    $estoque[] = [
        'sku'=> $sku,
        'nome'=> $nome,
        'unidade_medida'=> $unidade_medida,
        'preco'=> $preco,
        'quantidade' => $quantidade
    ]; 
    echo "Produto adicionado. \n";
    var_dump($estoque);
}

// Função para vender um produto
function venderProduto(&$estoque, $sku) {
    // Primeiro verifica se há o produto em estoque
    if (checarSku($estoque, $sku) === false){
        echo "Produto não encontrado. SKU inválido. \n";
    } else {
        // Se houver, salva o índice e verifica se a quantidade solicitada é válida
        $indice = checarSku($estoque, $sku);
        $quantidade = readline("Digite a quantidade: ");
        if ($quantidade <= 0) {
            echo "Entrada esperada: valor MAIOR QUE ZERO. Operação encerrada.\n";
        } elseif ($quantidade > $estoque[$indice]["quantidade"]) {
            echo "Quantidade solicitada maior do que a disponível em estoque. Operação encerrada. \n";
        } else {
            // Se a quantidade digitada for válida, segue com a operação
            $estoque[$indice]['quantidade'] -= $quantidade;
            echo "Estoque atualizado. Quantidade atual: " . $estoque[$indice]['quantidade'] . PHP_EOL;
        }
    }
}

// Função para verificar o estoque
function verificarEstoque($estoque, $sku)
{
    if (checarSku($estoque, $sku) === false){
        echo "Produto não encontrado. SKU inválido.\n";
    } else {
        echo "Produto encontrado. Estoque atual: " . $estoque[checarSku($estoque, $sku)]['quantidade'] . PHP_EOL;
    }
}

// Função para listar o estoque em ordem alfabética
function listarEstoque($estoque){    
    if (empty($estoque)) {
        echo "Lista vazia, nenhum produto em estoque.\n";
    } else {
        usort($estoque, 'compararValores');
        foreach ($estoque as $value) {
             // Lista para simplificar chamada dos elementos do array
            ['sku' => $sku,
            'nome' => $nome, 
            'unidade_medida' => $unidade_medida, 
            'preco' => $preco, 
            'quantidade' => $quantidade] = $value;
            echo "SKU: $sku \nNome: $nome  Und: $unidade_medida  Qnt: $quantidade  Preço: R$$preco" . PHP_EOL . "------------------------" . PHP_EOL;
        }
    };
}

// Função usada para usort dentro de listarEstoque()
function compararValores($a, $b)
{
    $ordem = $a['nome'] <=> $b['nome'];
    return $ordem;
}

// Função para adicionar quantidade ao estoque
function adicionarQuantidade (&$estoque, $sku) 
{
    if (checarSku($estoque, $sku) === false){
        echo "Produto não encontrado. SKU inválido. \n";
        return;
    } else {
        $quantidade = readline("Digite a quantidade: ");
        $indice = array_search($sku, array_column($estoque, 'sku'));
        $estoque[$indice]['quantidade'] += $quantidade;
        echo "Quantidade adicionada. Estoque atual: " . $estoque[$indice]['quantidade'] . PHP_EOL;
    }
}

// Função para contar o estoque
function contarEstoque($estoque){
    echo "Estoque composto por " . count($estoque) . " produtos diferentes. \n";
    $total = 0;
    foreach ($estoque as $value) {
    $total += $value['quantidade'];
    }
    echo "Total de itens em estoque: " . $total . " unidades. \n";
}

// Função para deletar um produto
function deletarProduto(&$estoque, $sku)
{
    if (checarSku($estoque, $sku) === false){
        echo "Produto não encontrado. SKU inválido. \n";
        return;
    } else {
        echo "Produto encontrado. Deseja mesmo deletar o produto? (S/N)\n";
        $resposta = readline();
        if ($resposta == "s" or $resposta == "S") {
            $indice = array_search($sku, array_column($estoque, 'sku'));
            unset($estoque[$indice]);
            echo "Operação concluída. Produto removido com sucesso.\n";
        } else {
            echo "Operação encerrada. \n";
        }
    }
}

while (true) {

    $opcao = exibirMenu();

    switch ($opcao) {
        case 1:
            echo "Criar um produto\n";
            // Verifica se o array está vazio. Se estiver, segue com a operação e adiciona novo produto
            if (empty($estoque)){
                $sku = readline("Digite o SKU do produto: ");
                $nome = readline("Digite o Nome do produto: ");
                $unidade_medida = readline("Digite o unidade_medida: ");
                $preco = readline("Digite a preco: ");
                $quantidade = readline("Digite a Quantidade: ");
                criarProduto($estoque, $sku, $nome, $unidade_medida, $preco, $quantidade);   
            // Se o array não estiver vazio, o programa verifica se há algum produto com esse mesmo SKU 
            } else { 
                $sku = readline("Digite o SKU do produto: ");
                // Verifica se o SKU existe
                if (checarSku($estoque, $sku) != false){
                    echo "SKU já existente. Não é possível criar um novo produto com o mesmo SKU." . PHP_EOL;
                } else {
                    // Se não existir, adiciona novo produto
                    $nome = readline("Digite o Nome do produto: ");
                    $unidade_medida = readline("Digite o unidade_medida: ");
                    $preco = readline("Digite o Preço: ");
                    $quantidade = readline("Digite a Quantidade: ");
                    echo "Passou aqui";
                    criarProduto($estoque, $sku, $nome, $unidade_medida, $preco, $quantidade);
                }
            }
            break;
        case 2:
            echo "Vender um produto\n";
            $sku = readline("Digite o SKU do produto que deseja registrar a venda: ");
            venderProduto($estoque, $sku);
            break;
        case 3:
            echo "Verificar Estoque\n";
            $sku = readline("Digite o SKU do produto: ");
            verificarEstoque($estoque, $sku);
            break;
        case 4:
            echo "Listar o Estoque\n";
            listarEstoque($estoque);
            break;
        case 5:
            echo "Adicionar Qntd Estoque\n";
            $sku = readline("Digite o SKU do produto: ");
            adicionarQuantidade($estoque, $sku);
            break;

        case 6: 
            echo "Contagem de Estoque\n";
            contarEstoque($estoque);
            break;
        case 7:
            echo "Deletar Produto\n";
            $sku = readline("Digite o SKU do produto que deseja deletar: ");
            deletarProduto($estoque, $sku);
            break;
        case 8:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida. Por favor, tente novamente.\n";
            break;
    }
}