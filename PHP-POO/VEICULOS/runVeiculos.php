<?php 

require 'autoload.php';

use Codifica\Veiculos\Model\Tipos\{Moto, Carro, Caminhao};

$moto = new Moto('Tornado', 2002, 'Azul', 250);
$carro = new Carro ('HB20', 2016, 'Vermelho', 4);
$caminhao = new Caminhao('Carreta Scania', 2005, 'Branco', 3);

$moto->getDetalhes();
$caminhao->getDetalhes();
