<?php

namespace Codifica\Forma\Service;

class ValidacaoDimensoes
{
    public function validarNumeros(float $numero): float
    {
        if ($numero >= 0){
            return $numero;
        }

        $numero = (float) readline("Número inválido, digite um valor positivo: ");
        return $this->validarNumeros($numero);
    }
}