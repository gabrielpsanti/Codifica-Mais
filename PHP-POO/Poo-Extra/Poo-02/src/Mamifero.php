<?php

namespace Codifica\Animais;

use Codifica\Animais\Animal;
abstract class Mamifero implements Animal
{
    protected string $nome;
    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }
    abstract public function fazerSom(): string;

    public function getNome(): string
    {
        return $this->nome;
    }
}