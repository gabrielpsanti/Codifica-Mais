<?php

namespace Codifica\Produtos;

session_start();

class Produtos
{
    private function criarID(): int
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
    }

    public function salvar(): void
    {
        $id = $this->criarID();

        $_SESSION['produtos'][$id] = $_REQUEST;

        header('Location: /produtos');

    }

    public function editar()
    {
        include '../public/formulario-edit.php';
    }

    public function atualizar($id): void
    {
        $indice = $this->procurarIndice($id);
    
        if ($indice !== false) {
            $_SESSION['produtos'][$indice] = $_REQUEST;
        }
    }

    public function deletar($id): void
    {
        $indice = $this->procurarIndice($id);

        if ($indice !== false) {    
            unset($_SESSION['produtos'][$indice]);
            $_SESSION['produtos'] = array_values($_SESSION['produtos']);
            header('Location: /');
        }
    }
    
}
