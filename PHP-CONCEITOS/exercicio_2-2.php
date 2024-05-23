<?php

echo "Digite nota 1: \n";
$nota1 = trim(fgets(STDIN));
echo "Digite nota 2: \n";
$nota2 = trim(fgets(STDIN));
echo "Digite nota 3: \n";
$nota3 = trim(fgets(STDIN));

$media = ($nota1 + $nota2 + $nota3)/3;
echo "A média das notas é: $media";