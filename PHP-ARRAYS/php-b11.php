<?php

$estoque = [
    // ↓ ↓ descomentar abaixo caso queira realizar os testes
    // "PROD1" => [
    //     'nome'=> 'Camisa',
    //     'tamanho'=> 'M',
    //     'cor'=> 'Azul',
    //     'quantidade' => '10'
    // ],
    // "PROD2" => [
    //     'nome'=> 'Tenis',
    //     'tamanho'=> '40',
    //     'cor'=> 'Preto',
    //     'quantidade' => '5'
    // ],
    // "PROD3" => [
    //     'nome'=> 'Bermuda',
    //     'tamanho'=> '38',
    //     'cor'=> 'Verde',
    //     'quantidade' => '2'
    // ]
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
            echo "Listar o Estoque\n";
            listarEstoque($estoque);
            break;
        case 5:
            echo "Saindo...\n";
            exit; // Sai do loop e encerra o script
        default:
            echo "Opção inválida. Por favor, tente novamente.\n";
            break;
    }
}
