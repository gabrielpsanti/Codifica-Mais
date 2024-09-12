<?php

namespace App;

use PDO;

class Produtos
{
    public function criarID(): int
    {
        $novoID = end($_SESSION['produtos'])['id'] + 1;
        return $novoID;
    }

    private function procurarIndice($id): int
    {
        $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));
        return $indice;
    }

    public function listar()
    {
        include '../public/listagem.php';
        exit;
    }

    public function criar()
    {
        include '../public/formulario-cadastro.php';
        exit;
    }

    public function salvar(): void
    {

        $_SESSION['produtos'][] = $_POST;

        header('Location: /produtos');

    }

    public function editar()
    {
        include '../public/formulario-edit.php';
        exit;
    }

    public function atualizar($id): void
    {
        $indice = $this->procurarIndice($id);
    
        if ($indice !== false) {
            $_SESSION['produtos'][$indice] = $_REQUEST;
        }

        header('Location: /produtos');
    }

    public function deletar($id): void
    {
        $indice = $this->procurarIndice($id);

        if ($indice !== false) {    
            unset($_SESSION['produtos'][$indice]);
            $_SESSION['produtos'] = array_values($_SESSION['produtos']);
            header('Location: /produtos');
        }
    }
    
}
