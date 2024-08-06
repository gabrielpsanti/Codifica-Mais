<?php

namespace Codifica\Estoque\Model;

interface ProdutoInterface
{
    public function getTitulo(): string;
    public function getPreco();
}