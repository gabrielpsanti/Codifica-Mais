<?php

namespace Codifica\Estoque;

use Codifica\Estoque\Estoque;

use Codifica\Estoque\Model\Types\{JogoDigital, JogoFisico, LivroDigital, LivroFisico};

class MenuInterativo
{
    protected function exibirMenu()
    {
        echo "------------------------------------------------------------------\n";
        echo ">> Sistema de gestão de estoque da loja Codifica Livros e Jogos <<\n";
        echo "------------------------------------------------------------------\n";
        echo "Escolha uma das opções abaixo:\n";
        echo "------------------------------\n";
        echo "1. Criar novo produto\n";
        echo "2. Vender um produto\n";
        echo "3. Modificar Preço\n";
        echo "4. Verificar Estoque\n";
        echo "5. Listar o Estoque\n";
        echo "6. Adicionar Qntd Estoque\n";
        echo "7. Contagem de Estoque\n";
        echo "8. Deletar Produto\n";
        echo "9. Sair\n";
        echo "------------------------\n";
        $opcao = (int) readline("Digite a sua escolha: ");
        return $opcao;
    }

    public function iniciarMenu(): void
    {
        $estoque = new Estoque();
        $estoque->adicionarProduto(new LivroFisico('As Crônicas de Narnia', 39.90, 100, 325, 'Editora Casa'));
        $estoque->adicionarProduto(new LivroDigital('As Crônicas de Narnia', 39.90, 325, 'Casa'));
        $estoque->adicionarProduto(new LivroFisico('O Senhor dos Aneis', 59.90, 50, 550, 'Editora Rocco'));
        $estoque->adicionarProduto(new LivroDigital('O Senhor dos Aneis', 59.90, 550, 'Rocco'));
        $estoque->adicionarProduto(new JogoFisico('Assassins Creed', 139.90, 10, 'Ubisoft'));
        $estoque->adicionarProduto(new JogoDigital('Assassins Creed', 139.90, 'Ubisoft'));
        $estoque->adicionarProduto(new JogoFisico('GTA V', 289.90, 100, 'Rockstar'));
        $estoque->adicionarProduto(new JogoDigital('GTA V', 289.90, 'Rockstar'));

        while (true) {

            $opcao = $this->exibirMenu();
        
            switch ($opcao) {
                case 1:
                    echo "----------------------\n";
                    echo ">> Criar um produto <<\n";
                    $produto = (int) readline("Tipo de Produto (1 - Livro, 2 - Jogo): ");
                    switch ($produto) {
                        case 1:
                            $tipo = (int) readline("Tipo de Mídia (1 - Física, 2 - Digital): ");
                            switch ($tipo){
                                case 1:
                                    echo "Livro Mídia Física selecionado!\n";
                                    $nome = (string) readline("Digite o Título do Livro: ");
                                    $preco = (float) readline("Digite o Preço: ");
                                    $quantidade = (int) readline("Digite a Quantidade: ");
                                    $numPaginas = (int) readline("Digite o Núm. de Páginas: ");
                                    $editora = (string) readline("Digite a Editora: ");
                                    $estoque->adicionarProduto(new LivroFisico($nome, $preco, $quantidade, $numPaginas, $editora));
                                    break;
                                case 2:
                                    echo "Livro Mídia Digital selecionado!\n";
                                    $nome = (string) readline("Digite o Título do Livro: ");
                                    $preco = (float) readline("Digite o Preço: ");
                                    $numPaginas = (int) readline("Digite a quantidade de páginas: ");
                                    $editora = (string) readline("Digite a Editora: ");
                                    $estoque->adicionarProduto(new LivroDigital($nome, $preco, $numPaginas, $editora));
                                    break;
                                default:
                                    echo "-------------------------------------------\n";
                                    echo "Opção inválida. Por favor, tente novamente.\n";
                                    break;
                            }
                            break;
                        case 2:
                            $tipo = (int) readline("Tipo de Mídia (1 - Física, 2 - Digital): ");
                            switch ($tipo){
                                case 1:
                                    echo "Jogo Mídia Física selecionado!\n";
                                    $nome = (string) readline("Digite o Título do Jogo: ");
                                    $preco = (float) readline("Digite o Preço: ");
                                    $quantidade = (int) readline("Digite a Quantidade: ");
                                    $publisher = (string) readline("Digite a Editora: ");
                                    $estoque->adicionarProduto(new JogoFisico($nome, $preco, $quantidade, $publisher));
                                    break;
                                case 2:
                                    echo "Jogo Mídia Digital selecionado!\n";
                                    $nome = (string) readline("Digite o Título do Jogo: ");
                                    $preco = (float) readline("Digite o Preço: ");
                                    $publisher = (string) readline("Digite a Editora: ");
                                    $estoque->adicionarProduto(new JogoDigital($nome, $preco, $publisher));
                                    break;
                                default:
                                    echo "-------------------------------------------\n";
                                    echo "Opção inválida. Por favor, tente novamente.\n";
                                    break;
                            }
                            break;
                        default:
                            echo "-------------------------------------------\n";
                            echo "Opção inválida. Por favor, tente novamente.\n";
                            break;
                        } 
                    break;
                case 2:
                    echo "-----------------------\n";
                    echo ">> Vender um produto <<\n";
                    $estoque->venderProduto((string) readline("Digite o SKU: "), (int) readline("Digite a Quantidade: "));
                    break;
                case 3: 
                    echo "----------------------\n";
                    echo ">> Modificar Preço <<\n";
                    $estoque->modificarPreco((string) readline("Digite o SKU: "), (float) readline("Digite o Novo Preço: "));
                    break;
                case 4:
                    echo "-----------------------\n";
                    echo ">> Verificar Estoque <<\n";
                    $estoque->detalhesProduto((string) readline("Digite o SKU: "));
                    break;
                case 5:
                    echo "--------------------\n";
                    echo ">> Listar Estoque <<\n";
                    $estoque->listarEstoque();
                    break;
                case 6:
                    echo "----------------------------\n";
                    echo ">> Adicionar Qntd Estoque <<\n";
                    $estoque->adicionarEstoque((string) readline("Digite o SKU: "), (int) readline("Digite a Quantidade: "));
                    break;
                case 7: 
                    echo "-------------------------\n";
                    echo ">> Contagem de Estoque <<\n";
                    $estoque->contarEstoque();
                    break;
                case 8:
                    echo "---------------------\n";
                    echo ">> Deletar Produto <<\n";
                    $estoque->deletarProduto((string) readline("Digite o SKU: "));
                    break;
                case 9:
                    echo "------------------------\n";
                    echo "Saindo...\n";
                    exit;
                default:
                    echo "-------------------------------------------\n";
                    echo "Opção inválida. Por favor, tente novamente.\n";
                    break;
            }
        }
    }
}