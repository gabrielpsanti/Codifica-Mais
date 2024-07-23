<?php

require __DIR__ . '/src/ContaBancaria.php';

// Gera um número decimal aleatório entre 10 e 100000
function gerarFloatsAleatorios() :float
{
    $num = (rand(1000, 100000) / rand(1, 100));
    return $num;
}
// Criar objetos ContaBancaria
$conta1 = new ContaBancaria('Marcos Pereira', '144.555.888-40');
$conta2 = new ContaBancaria('Joao Nunes', '123.456.789-10');
$conta3 = new ContaBancaria('Pedro Paiva', '109.876.543-21');
$conta4 = new ContaBancaria('Maria Gonçalves', '159.753.123-50');

// Realizar operações
$conta1->depositar(gerarFloatsAleatorios());
$conta1->sacar(gerarFloatsAleatorios());
$conta2->depositar(gerarFloatsAleatorios());
$conta2->sacar(gerarFloatsAleatorios());
$conta3->depositar(gerarFloatsAleatorios());
$conta3->sacar(gerarFloatsAleatorios());
$conta4->depositar(gerarFloatsAleatorios());
$conta4->sacar(gerarFloatsAleatorios());

// Verificar saldo
$conta1->verificarSaldo();
$conta2->verificarSaldo();
$conta3->verificarSaldo();
$conta4->verificarSaldo();

// Função extra que lista todas as contas
ContaBancaria::listarTodasAsContas();
