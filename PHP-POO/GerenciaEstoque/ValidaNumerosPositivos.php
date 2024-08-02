<?php

class ValidaNumerosPositivos
{
    public function validarNumeros(float $numero): float
    {
        if ($numero > 0){
            return $numero;
        }

        $numero = readline("Número inválido. Digite um número maior que zero: ");
        return $numero;
    }
}