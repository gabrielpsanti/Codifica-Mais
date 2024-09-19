<?php

namespace App;

use PDO;

class IniciarTabelas {

    public function criarTabelas(): void
    {

        $dbPath = __DIR__ . '/banco.sqlite';
        $pdo = new PDO("sqlite:$dbPath");

        $pdo->exec('CREATE TABLE IF NOT EXISTS produtos (
            id INTEGER PRIMARY KEY,
            nome TEXT,
            sku TEXT,
            unidade_medida_id INTEGER,
            valor REAL,
            quantidade INTEGER,
            categoria_id INTEGER
        );');

        $pdo->exec('CREATE TABLE IF NOT EXISTS categorias (
            id INTEGER PRIMARY KEY,
            nome TEXT
        );');


        $pdo->exec('CREATE TABLE IF NOT EXISTS unidades_medidas (
            id INTEGER PRIMARY KEY,
            nome TEXT
        );');

        $this->preencherTabelasSecundarias($pdo);

    }

    private function preencherTabelasSecundarias(PDO $pdo): void
    {

        $categorias = [
            '1' => 'Eletrônicos',
            '2' => 'Eletrodomésticos',
            '3' => 'Móveis',
            '4' => 'Decoração',
            '5' => 'Vestuário',
            '7' => 'Outros'
        ];

        foreach ($categorias as $id => $nome) {
            $pdo->exec("INSERT OR IGNORE INTO categorias (id, nome) VALUES ($id, '$nome')");
        }

        $unidadesMedidas = [
            '1' => 'Un',
            '2' => 'Kg',
            '3' => 'g',
            '4' => 'L',
            '5' => 'mm',
            '6' => 'cm',
            '7' => 'm',
            '8' => 'm²'
        ];

        foreach ($unidadesMedidas as $id => $nome) {
            $pdo->exec("INSERT OR IGNORE INTO unidades_medidas (id, nome) VALUES ($id, '$nome')");
        }
    }
}

