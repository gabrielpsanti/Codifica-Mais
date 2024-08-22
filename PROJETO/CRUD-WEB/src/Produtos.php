<?php

namespace App;

class Produtos
{
    public function listar(): array
    {
        return $_SESSION['produtos'];
    }
}
