<?php

namespace Codifica\Automoveis;

use Codifica\Automoveis\TabelaVeiculos;
use Codifica\Automoveis\Model\{Carro, Moto, Caminhao};

class MenuInicial {
    private $tabelaVeiculos;

    public function __construct() {
        $this->tabelaVeiculos = new TabelaVeiculos();
    }

    public function iniciar() {
        echo "Bem-vindo(a) à fábrica de veículos Codifica Motors!\n";
        echo "Tabela 2024 contém os seguintes veículos:\n";
        echo "  1 - Carro\n";
        echo "  2 - Moto\n";
        echo "  3 - Caminhão\n";
        echo "  4 - Exibir Tabela Completa\n";

        $tipo = readline("Opção desejada: ");

        switch ($tipo) {
            case 1:
                $this->criarCarro();
                break;
            case 2:
                $this->criarMoto();
                break;
            case 3:
                $this->criarCaminhao();
                break;
            case 4:
                $this->tabelaVeiculos->exibirTabela();
                break;
            default:
                echo "Opção inválida. Tente novamente.\n";
                $this->iniciar();
                break;
        }
    }

    private function criarCarro() {
        $modelo = $this->escolherOpcao("Carro", "Modelo");
        $cor = $this->escolherOpcao("Carro", "Cor");
        $diferencial = $this->escolherOpcao("Carro", "Diferencial");

        $carro = new Carro($modelo, $cor, $diferencial);

        echo "\nPedido realizado com sucesso!\n\n### Detalhes do pedido ###\n";
        $carro->exibirDetalhes();
        echo "Preço final do Carro: R$ " . number_format($carro->calcularPreco(), 2, ',', '.') . "\n";
    }

    private function criarMoto() {
        $modelo = $this->escolherOpcao("Moto", "Modelo");
        $cor = $this->escolherOpcao("Moto", "Cor");
        $diferencial = $this->escolherOpcao("Moto", "Diferencial");

        $moto = new Moto($modelo, $cor, $diferencial);

        echo "\nPedido realizado com sucesso!\n\n### Detalhes do pedido ###\n";
        $moto->exibirDetalhes();
        echo "Preço final da Moto: R$ " . number_format($moto->calcularPreco(), 2, ',', '.') . "\n";
    }

    private function criarCaminhao() {
        $modelo = $this->escolherOpcao("Caminhao", "Modelo");
        $cor = $this->escolherOpcao("Caminhao", "Cor");
        $diferencial = $this->escolherOpcao("Caminhao", "Diferencial");

        $caminhao = new Caminhao($modelo, $cor, $diferencial);

        echo "\nPedido realizado com sucesso!\n\n### Detalhes do pedido ###\n";
        $caminhao->exibirDetalhes();
        echo "Preço final do Caminhão: R$ " . number_format($caminhao->calcularPreco(), 2, ',', '.') . "\n";
    }

    private function escolherOpcao($tipoVeiculo, $categoria) {
        $tabela = $this->tabelaVeiculos->obterTabela();
        
        echo "Escolha a opção de $categoria para o $tipoVeiculo:\n";
        foreach ($tabela[$tipoVeiculo][$categoria] as $codigo => $detalhes) {
            echo "  Digite $codigo - {$detalhes['descricao']} (+ R$ " . number_format($detalhes['preco'], 2, ',', '.') . ")\n";
        }

        while (true) {
            $opcao = readline("Opção desejada: ");
            
            if (isset($tabela[$tipoVeiculo][$categoria][$opcao])) {
                return $tabela[$tipoVeiculo][$categoria][$opcao];
            } else {
                echo "Opção inválida. Tente novamente.\n";
            }
        }
    }
}

