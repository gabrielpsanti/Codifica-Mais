<?php 

echo "Digite um número: ";
$x = trim(fgets(STDIN));
$i = 1;

for ($i = 1; $i <= 10; $i++) {
    $resultado = $i * $x;
    echo "$x x $i = $resultado". PHP_EOL;
}
