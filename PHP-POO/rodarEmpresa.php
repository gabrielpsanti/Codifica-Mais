<?php

require __DIR__ . '/src/Funcionario.php';

$funcionario1 = new Funcionario ('José da Silva', 'Analista de Manutenção Pleno', 6944.55);
$funcionario1->alterarCargo('Analista de Manutenção Senior');
$funcionario1->alterarSalario(10416.90);
$funcionario1->exibirDetalhes();