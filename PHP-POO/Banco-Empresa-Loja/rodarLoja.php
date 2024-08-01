<?php

require __DIR__ . '/src/Produto.php';

$produto1 = new Produto('Computador DELL Inspiron 15000N', 40.5, 20);
$produto1->alterarPreco(10500.7);
$produto1->alterarEstoque(50);
$produto1->exibirDetalhes();