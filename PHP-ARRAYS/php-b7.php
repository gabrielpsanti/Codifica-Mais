<?php

function calcularMedia(array $notas)
{   
    
    foreach ($notas as $i) {
        $notaTotal = 0;

        foreach ($i as $n) {
            $notaTotal += $n;
        }

        $media[] = ($notaTotal/count($i));
    }

    return $media;
}

$notasAlunos = [
    [8.5, 6.0, 7.8, 9.2, 5.5], // Aluno 1
    [7.0, 8.0, 6.5, 7.5, 8.5], // Aluno 2
    [6.5, 7.5, 4.5, 5.5, 7.0], // Aluno 3
    [5.0, 4.6, 7.8, 9.0, 6.0] // Aluno 4
];

$medias = calcularMedia($notasAlunos);
$aprovados = 0;
$reprovados = 0;


foreach ($medias as $key => $notas) {
    if ($notas >= 7) {
        $aprovados += 1;
        echo "Aluno " . ($key + 1) . " aprovado com nota $notas \n";
    } else {
        $reprovados += 1;
        echo "Aluno " . ($key + 1) . " reprovado com nota $notas \n";
    }
}

echo "Ao todo, houveram $aprovados aluno(s) aprovado(s) e $reprovados aluno(s) reprovado(s).";

