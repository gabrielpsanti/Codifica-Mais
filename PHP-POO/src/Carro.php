<?php

class Carro
{
    private string $marca;
    private string $modelo;
    private int $anoFabricacao;

    private static string $nomeDaLocadora = 'Codifica Alugacar';
    
    public function __construct($marca, $modelo, $anoFabricacao)
    {
        $this->validarAno($anoFabricacao);
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anoFabricacao = $anoFabricacao;
        echo "objeto criado. Carro: $this->modelo | Marca: $this->marca | Ano $this->anoFabricacao\n";
    }

    public function acelerar() :void
    {
        echo "O carro $this->modelo $this->anoFabricacao acelerou.\n";
    }

    public function frear() :void
    {
        echo "O carro $this->modelo $this->anoFabricacao freou.\n";
    }

    private function validarAno(int $anoFabricacao) :void
    {
        if ($anoFabricacao < 1500 || $anoFabricacao > 2024){
            echo "Ano inválido. Tente novamente.\n";
            exit;
        }

        echo "Ano $anoFabricacao aceito, ";
        return;
    }

    public static function getLocadora() :string
    {
        return 'O nome da locadora é: '
        . self::$nomeDaLocadora
        . '.'
        . PHP_EOL;
    }
}    