<?php

namespace App\Controllers;

use PDO;
use PDOException;
use Exception;

class ImportController 
{
    private $pdo;

    public function __construct($host, $dbname, $user, $pass)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
            exit;
        } catch (Exception $e) {
            echo "Erro genérico: " . $e->getMessage();
            exit;
        }
    }

    public function index()
    {
        require __DIR__ . '/../Views/importar.php';
        exit;
    }

    public function saveImport($files){
        $caminhoCsv = $files['file']['tmp_name'];

        $arquivo = fopen($caminhoCsv, 'r');

        fgetcsv($arquivo);
        
        $sql = "INSERT INTO produto (nome, sku, unidade_medida_id, valor, quantidade, categoria_id, imagem) VALUES (:nome, :sku, :unidade_medida_id, :valor, :quantidade, :categoria_id, :imagem)";


        try {
            while (($data = fgetcsv($arquivo, 1000, ",")) !== FALSE) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':nome', $data[0]);
                $stmt->bindParam(':sku', $data[1]);
                $stmt->bindParam(':unidade_medida_id', $data[2]);
                $stmt->bindParam(':valor', $data[3]);
                $stmt->bindParam(':quantidade', $data[4]);
                $stmt->bindParam(':categoria_id', $data[5]);
                $stmt->bindValue(':imagem', "/Storage/padrao.png");
                $stmt->execute();
            }

            fclose($arquivo);

            header('Location: /');
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }
}