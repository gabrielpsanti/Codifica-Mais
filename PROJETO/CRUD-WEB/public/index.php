<?php

    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../src/helper.php';
    require __DIR__ . '/../config/keys/bdkeys.php';


    use App\Controllers\ProdutoController;

    $instance = new ProdutoController(DB_HOST, DB_NAME, DB_USER, DB_PASS);

    $page = $_SERVER['PATH_INFO'];

    if ($page == '/' || !isset($_SERVER['PATH_INFO']) || $page == '/produtos' || $page == '/produtos/pesquisar'){ 
        return $instance->listar();
    }

    if ($page == '/produtos/criar'){
        $instance->criar();
    }

    if ($page == '/produtos/salvar'){
        $instance->salvar($_POST, $_FILES);
    }

    if ($page == '/produtos/editar'){
        $instance->editar();
    }

    if ($page == '/produtos/atualizar'){
        $instance->atualizar($_GET['id'], $_POST);
    }

    if ($page == '/produtos/deletar'){
        $instance->deletar($_GET['id']);
    }

    else {
        echo "Página não encontrada! :(";
    }



 