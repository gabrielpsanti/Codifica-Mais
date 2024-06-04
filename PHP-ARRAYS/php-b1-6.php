<?php

// $array = []; --Não precisa declarar antes, aparentemente
for ($i = 1; $i <= 10; $i++) { // Daria para encontrar o menor valor já dentro desse for, mas daí não precisaria usar array - que aparenta ser o objetivo da lista
    echo "Digite o {$i}º número: ";
    $array[] = trim(fgets(STDIN)); 
}

$menor = $array[0];

foreach ($array as $item) {
    if ($menor > $item) {
        $menor = $item;
    }
}    

echo "O menor número entre os 10 do array é: $menor" . PHP_EOL;