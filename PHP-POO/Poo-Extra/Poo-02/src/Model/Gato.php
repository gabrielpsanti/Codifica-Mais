<?php

namespace Codifica\Animais\Model;

use Codifica\Animais\Mamifero;

class Gato extends Mamifero
{
    public function fazerSom(): string
    {
        return "Miau";
    }
}