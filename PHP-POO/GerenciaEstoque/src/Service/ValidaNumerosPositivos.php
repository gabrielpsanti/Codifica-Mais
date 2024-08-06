<?php

namespace Codifica\Estoque\Service;

class ValidaNumerosPositivos
{
    public function validarNumeros(float $numero): float
    {
        if ($numero > 0){
            return $numero;
        }

        echo "---------------------------------------------------\n";
        $numero = readline("Número inválido. Digite um número maior que zero: ");
        return $this->validarNumeros($numero);
    }
}