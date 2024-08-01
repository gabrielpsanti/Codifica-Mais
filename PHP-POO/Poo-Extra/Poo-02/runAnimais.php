<?php


require_once "autoload.php";

use Codifica\Animais\Model\{Gato,Cachorro};
use Codifica\Animais\Animal;

enum TabelaAnimais: int
{
    case GATO = 1;
    case CACHORRO = 2;
    case SAIR = 3;

}

function fazerAnimalEmitirSom(Animal $animal) :void
{
    echo "{$animal->getNome()} emitiu um ". $animal->fazerSom();
}

echo "Escolha o tipo de animal: \n";
echo "1 - Gato\n";
echo "2 - Cachorro\n";
echo "3 - Sair\n";
$escolha = (int) readline("Opção desejada: ");

switch ($escolha) {
    case TabelaAnimais::GATO->value:
        $nome = (string) readline("Digite o nome do seu gato: ");
        $gato = new Gato($nome);
        fazerAnimalEmitirSom($gato);
        break;
    case TabelaAnimais::CACHORRO->value:
        $nome = (string) readline("Digite o nome do seu cachorro: ");
        $cachorro = new Cachorro($nome);
        fazerAnimalEmitirSom($cachorro);
        break;
    case TabelaAnimais::SAIR->value:
        echo "Saindo...\n";
        break;
    default:
        echo "Opção inválida\n";
        break;
}