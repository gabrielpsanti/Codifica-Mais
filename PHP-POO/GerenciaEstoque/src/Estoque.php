<?php

namespace Codifica\Estoque;

use Codifica\Estoque\Service\ValidaNumerosPositivos;
use Codifica\Estoque\Model\Produto;
use Codifica\Estoque\Model\Types\{JogoDigital, JogoFisico, LivroDigital, LivroFisico};

class Estoque
{
    private array $estoque = [];

    public function procurarIndice(string $sku): int
    {
        foreach ($this->estoque as $key => $value) {
            if ($value->getSku() == $sku) {
                echo "-------------------\n";
                echo "Produto encontrado!\n";
                return $key;
            }
        }

        echo "-------------------------------------------------\n";
        return $this->procurarIndice((string) readline("Produto não encontrado. Digite o SKU novamente: "));
    }

    protected function validarNumeros(float $numero): float
    {
        $validador = new ValidaNumerosPositivos();
        return $validador->validarNumeros($numero);
    }

    private function checarTipo(Produto $produto): string
    {
        if ($produto instanceof LivroFisico || $produto instanceof JogoFisico) {    
            return 'fisico';
        }
        if ($produto instanceof LivroDigital || $produto instanceof JogoDigital) {
            return 'digital';
        }

        return 'Não encontrado';
    }

    public function adicionarProduto(Produto $produto): void
    {
        $this->estoque[] = $produto;
        echo "Produto " . $produto->getSku() . " adicionado com sucesso!\n";
    }

    public function venderProduto(string $sku, int $quantidade)
    {
        $key = $this->procurarIndice($sku);
        $quantidade = $this->validarNumeros($quantidade);
        $tipo = $this->checarTipo($this->estoque[$key]);

        switch ($tipo) {
            case 'fisico':
                if ($this->estoque[$key]->getQuantidade() < $quantidade) {
                    echo "---------------------------------------------------------\n";
                    return $this->venderProduto($sku, (int) readline("Quantidade em estoque insuficiente. Digite novamente: "));
                }
                $novaQuantidade = $this->estoque[$key]->getQuantidade() - $quantidade;
                $this->estoque[$key]->setQuantidade($novaQuantidade);
                $this->estoque[$key]->setVendas($quantidade);
                $this->estoque[$key]->setVendasTotais();
                echo "----------------------------------------------------------\n";
                echo "Venda de produto físico contabilizada! Estoque atual: {$this->estoque[$key]->getQuantidade()}\n";
                echo "Total de vendas deste produto: {$this->estoque[$key]->getVendas()} \nValor total: R$ {$this->estoque[$key]->getVendasTotais()}\n";
                break;
            case 'digital':
                $this->estoque[$key]->setVendas($quantidade);
                $this->estoque[$key]->setVendasTotais();
                echo "---------------------------------------\n";
                echo "Venda de produto digital contabilizada!\n";
                echo "Total de vendas deste produto: {$this->estoque[$key]->getVendas()} \nValor total: R$ {$this->estoque[$key]->getVendasTotais()}\n";
                break;
            default:
                echo "-------------------------------------------\n";
                echo "Opção inválida. Por favor, tente novamente.\n";
                break;
        }
    }

    public function modificarPreco(string $sku, float $novoPreco): void
    {
        $key = $this->procurarIndice($sku);
        $novoPreco = $this->validarNumeros($novoPreco);
        $this->estoque[$key]->setPrecos($novoPreco);
        echo "Preço do produto {$this->estoque[$key]->getSku()} alterado para R$ ". number_format($novoPreco, 2, ',', '.') . "\n";
    }

    public function detalhesProduto(string $sku): void
    {
        $key = $this->procurarIndice($sku);
        $this->estoque[$key]->getProduto();
    }

    public function listarEstoque(): void
    {
        foreach ($this->estoque as $value) {
            $value->getProduto();
        }
    }

    public function adicionarEstoque(string $sku, int $quantidade): void
    {
        $key = $this->procurarIndice($sku);
        $tipo = $this->checarTipo($this->estoque[$key]);

        switch ($tipo) {
            case 'fisico':
                $this->estoque[$key]->setQuantidade($this->estoque[$key]->getQuantidade() + $quantidade);
                echo "Produto {$this->estoque[$key]->getSku()}: adicionado $quantidade unidades \nEstoque atual: {$this->estoque[$key]->getQuantidade()}\n";
                break;
            case 'digital':
                echo "----------------------------------\n";
                echo "Produto digital, estoque infinito!\n";
                break;
            default:
                echo "-------------------------------------------\n";
                echo "Opção inválida. Por favor, tente novamente.\n";
                break;
        }
        
    }

    public function contarEstoque(): void
    {
        $total = 0;
        $produtosFisicos = 0;
        $produtosDigitais = 0;
        
        foreach ($this->estoque as $value) {
            if ($value instanceof LivroFisico || $value instanceof JogoFisico) {
                $total += $value->getQuantidade();
                $produtosFisicos++;
            } elseif ($value instanceof LivroDigital || $value instanceof JogoDigital) {
                $produtosDigitais++;
            }
        }
        echo "------------------------------\n";
        echo "Total de Produtos Registrados:\n";
        echo "Produtos Físicos: $produtosFisicos\n";
        echo "Produtos Digitais: $produtosDigitais\n";
        echo "Unidades em Estoque (Produtos Físicos): $total\n";
    }

    public function deletarProduto(string $sku): void
    {
        $key = $this->procurarIndice($sku);
        echo "---------------------------------------\n";
        echo "Produto {$this->estoque[$key]->getSku()} deletado com sucesso!\n";
        unset($this->estoque[$key]);
        // Rearranjo dos índices do array
        $this->estoque = array_values($this->estoque);
    }
}