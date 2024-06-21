<?php

for ($i = 1; $i <= 5; $i++) {
    echo "Digite o $i" . "º número: ";
    $array[$i] = trim(fgets(STDIN));
}

// foreach ($array as $key => $value) { // tester
//     echo $key ." | ". $value ."\n";
// }

echo "A ordem inversa dos número digitados é: \n";

for ($i = 5; $i >= 1; $i--) {
    echo $array[$i] . PHP_EOL;
}