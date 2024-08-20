<?php

namespace Codifica\Automoveis\Model;

interface VeiculoInterface
{
    public function acelerar(): void;
    public function frear(): void;
    public function exibirDetalhes() :void;
}