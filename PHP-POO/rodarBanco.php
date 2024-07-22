<?php

require __DIR__ . '/src/ContaBancaria.php';

// Criar objetos ContaBancaria
$conta1 = new ContaBancaria('Marcos Pereira', '144.555.888-40');
$conta2 = new ContaBancaria('Joao Nunes', '123.456.789-10');
$conta3 = new ContaBancaria('Pedro Paiva', '109.876.543-21');
$conta4 = new ContaBancaria('Maria Gonçalves', '159.753.123-50');

// Realizar operações
$conta3->depositar(101.44);
$conta2->depositar(1590);
$conta2->sacar(51.97);
$conta4->depositar(90000);
$conta3->sacar(11.27);
$conta3->verificarSaldo();
$conta2->verificarSaldo();

// Função extra que lista todas as contas
ContaBancaria::listarTodasAsContas();
