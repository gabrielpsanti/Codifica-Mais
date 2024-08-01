<?php

namespace Codifica\Funcionarios\Service;

class ValidacaoNumeros
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