<?php
    // Inicia a sessão
    session_start();

    require __DIR__ . '/../vendor/autoload.php';

    use Codifica\Produtos\Produtos;

    // Define o array de categorias, unidades de medida e produtos
    $_SESSION['categorias'] = [
        '1' => 'Eletrônicos',
        '2' => 'Eletrodomésticos',
        '3' => 'Móveis',
        '4' => 'Decoração',
        '5' => 'Vestuário',
        '7' => 'Outros'
    ];

    $_SESSION['unidades_medidas'] = [
        '1' => 'Un',
        '2' => 'Kg',
        '3' => 'g',
        '4' => 'L',
        '5' => 'mm',
        '6' => 'cm',
        '7' => 'm',
        '8' => 'm²',
    ];

    $_SESSION['produtos'] = [[
            'id' => 1,
            'nome' => 'Smartphone',
            'sku' => '123456',
            'unidade_medida_id' => '1',
            'valor' => 1500.00,
            'quantidade' => 10,
            'categoria_id' => '1',
        ],[
            'id' => 2,
            'nome' => 'Geladeira',
            'sku' => '123457',
            'unidade_medida_id' => '2',
            'valor' => 2500.00,
            'quantidade' => 50,
            'categoria_id' => '2',
        ],
        [
            'id' => 3,
            'nome' => 'Celular',
            'sku' => '123457',
            'unidade_medida_id' => '2',
            'valor' => 20.00,
            'quantidade' => 5,
            'categoria_id' => '3',
        ],
        [
            'id' => 4,
            'nome' => 'Cadeira',
            'sku' => '123457',
            'unidade_medida_id' => '2',
            'valor' => 2500.00,
            'quantidade' => 4,
            'categoria_id' => '4',
        ],
        [
            'id' => 5,
            'nome' => 'Camisa',
            'sku' => '123457',
            'unidade_medida_id' => '2',
            'valor' => 2500.00,
            'quantidade' => 5,
            'categoria_id' => '5',
        ],
        [
            'id' => 6,
            'nome' => 'Geladeira',
            'sku' => '123457',
            'unidade_medida_id' => '2',
            'valor' => 90.00,
            'quantidade' => 5,
            'categoria_id' => '7',
        ],
    ];

    $rota = new Produtos();

    if (!isset($_SESSION['produtos'])) {
        $_SESSION['produtos'] = [];
    }

    if (isset($_SESSION['produtos']) && (!isset($_REQUEST['criar'])) && (!isset($_REQUEST['id-edit'])) && (!isset($_REQUEST['deletar']))) {
        $rota->listar();
    }

    if (isset($_REQUEST['criar'])) {
        $rota->criar();
    }

    if (isset($_REQUEST['salvar'])) {
        $rota->salvar();
    }

    if (isset($_REQUEST['id-edit'])) {
        $rota->editar();
    }

    if (isset($_REQUEST['atualizar'])) {
        $rota->atualizar($_REQUEST['id']);
    }

    if (isset($_REQUEST['deletar'])){
        $rota->deletar($_REQUEST['id']);

    }
