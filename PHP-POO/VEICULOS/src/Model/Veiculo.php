<?php

namespace Codifica\Veiculos\Model;

abstract class Veiculo
{
    protected string $nome;
    protected int $anoFabricacao;
    protected string $cor;

    public function __construct(string $nome, int $anoFabricacao, string $cor)
    {
        $this->nome = $nome;
        $this->anoFabricacao = $anoFabricacao;
        $this->cor = $cor;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getAnoFabricacao(): string
    {
        return $this->anoFabricacao;
    }

    public function getVeiculo(): string
    {
        return "Modelo: {$this->nome} | Ano: {$this->anoFabricacao} | Cor: {$this->cor}";
    }

}