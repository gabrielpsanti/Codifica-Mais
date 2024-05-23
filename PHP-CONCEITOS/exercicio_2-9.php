<?php

echo "Digite um número inteiro: ";
$numero = trim(fgets(STDIN));

if ($numero < 2) {
    echo "O número não é primo.";
} elseif ($numero == 2) {
    echo "O número é primo.";
} else {
    $tester = true;
    $contador = 2;
    while ($contador < $numero) {
        //echo "$contador e $numero\n"; //Caso queira acompanhar o teste
        if ($numero % $contador == 0) {
            $tester = false;
            break;
        } 
        $contador++;
    } 
    
    if ($tester == false){
        echo "O número é não primo.";
    } else {
        echo "O número é primo.";
    }
        
}
