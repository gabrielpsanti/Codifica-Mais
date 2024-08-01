<?php

namespace Codifica\Animais\Model;

use Codifica\Animais\Mamifero;

class Cachorro extends Mamifero
{
    public function fazerSom(): string
    {
        return "Latido";
    }
}