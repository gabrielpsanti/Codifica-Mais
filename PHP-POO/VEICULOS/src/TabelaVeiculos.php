<?php

namespace Codifica\Automoveis;

class TabelaVeiculos {
    private $tabela;

    public function __construct() {
        $this->tabela = [
            "Carro" => [
                "Modelo" => [
                    "1" => ["descricao" => "Hatch", "preco" => 79950],
                    "2" => ["descricao" => "Sedan", "preco" => 94950],
                    "3" => ["descricao" => "SUV", "preco" => 119950]
                ],
                "Cor" => [
                    "1" => ["descricao" => "Branco", "preco" => 0],
                    "2" => ["descricao" => "Prata", "preco" => 750],
                    "3" => ["descricao" => "Preto", "preco" => 750],
                    "4" => ["descricao" => "Vermelho", "preco" => 750]
                ],
                "Diferencial" => [
                    "1" => ["descricao" => "Gasolina", "preco" => 0],
                    "2" => ["descricao" => "Alcool", "preco" => 2000],
                    "3" => ["descricao" => "Flex", "preco" => 5000]
                ]
            ],
            "Moto" => [
                "Modelo" => [
                    "1" => ["descricao" => "Street", "preco" => 19950],
                    "2" => ["descricao" => "Esportiva", "preco" => 27950],
                    "3" => ["descricao" => "Custom", "preco" => 39950]
                ],
                "Cor" => [
                    "1" => ["descricao" => "Branca", "preco" => 0],
                    "2" => ["descricao" => "Prata", "preco" => 550],
                    "3" => ["descricao" => "Preta", "preco" => 550],
                    "4" => ["descricao" => "Vermelha", "preco" => 550]
                ],
                "Diferencial" => [
                    "1" => ["descricao" => "150cc", "preco" => 0],
                    "2" => ["descricao" => "250cc", "preco" => 3750],
                    "3" => ["descricao" => "400cc", "preco" => 7950]
                ]
            ],
            "Caminhao" => [
                "Modelo" => [
                    "1" => ["descricao" => "Toco", "preco" => 595950],
                    "2" => ["descricao" => "Trucado", "preco" => 795950],
                    "3" => ["descricao" => "Carreta", "preco" => 949950]
                ],
                "Cor" => [
                    "1" => ["descricao" => "Branco", "preco" => 0],
                    "2" => ["descricao" => "Prata", "preco" => 7750],
                    "3" => ["descricao" => "Preto", "preco" => 7750],
                    "4" => ["descricao" => "Vermelho", "preco" => 7750]
                ],
                "Diferencial" => [
                    "1" => ["descricao" => "Simples", "preco" => 0],
                    "2" => ["descricao" => "Duplo", "preco" => 80450],
                    "3" => ["descricao" => "Triplo", "preco" => 159450]
                ]
            ]
        ];
    }

    public function exibirTabela() {
        foreach ($this->tabela as $tipoVeiculo => $categorias) {
            echo "## $tipoVeiculo ##\n";
            foreach ($categorias as $categoria => $opcoes) {
                echo "$categoria:\n";
                foreach ($opcoes as $codigo => $detalhes) {
                    echo "  $codigo - {$detalhes['descricao']} (+ R$ " . number_format($detalhes['preco'], 2, ',', '.') . ")\n";
                }
            }
            echo "\n";
        }
    }

    public function obterTabela() {
        return $this->tabela;
    }
}
