<?php

namespace Codifica\Animais;

interface Animal
{
    public function fazerSom(): string;
    public function getNome(): string;
}