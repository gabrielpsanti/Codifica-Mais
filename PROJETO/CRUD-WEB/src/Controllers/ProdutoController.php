<?php

namespace App\Controllers;

use PDO;
use PDOException;
use Exception;

class ProdutoController 
{
    private $pdo;

    public function __construct($host, $dbname, $user, $pass)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
            exit;
        } catch (Exception $e) {
            echo "Erro genérico: " . $e->getMessage();
            exit;
        }
    }

    public function listar()
    {
        
        if(isset($_GET['str']) && !empty($_GET['str'])) {
            $produtos = self::pesquisar($_GET['str']);
        } else {
            $produtos = self::selectAll(); 
        } 
        require __DIR__ . '/../Views/listagem.php';
        exit;
    }

    public function selectMedidas()
    {
        $sql = "SELECT * FROM unidade_medida ORDER BY id ASC";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $unidadeMedidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $unidadeMedidas;
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
        }
    }

    public function selectCategorias()
    {
        $sql = "SELECT * FROM categoria ORDER BY id ASC";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categorias;
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
        }
    }

    public function selectAll()
    {
        $sql = "SELECT 
            produto.id,
            produto.nome,
            produto.sku,
            produto.valor,
            produto.quantidade,
            produto.imagem,
            categoria.id AS categoria_id,
            categoria.nome AS categoria_nome,
            unidade_medida.id AS unidade_medida_id,
            unidade_medida.nome AS unidade_nome
        FROM 
            produto
        INNER JOIN 
            categoria ON produto.categoria_id = categoria.id
        INNER JOIN 
            unidade_medida ON produto.unidade_medida_id = unidade_medida.id
        ORDER BY 
            produto.id ASC";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
        }
    }

    public function criar()
    {
        $unidadeMedidas = self::selectMedidas();
        $categorias = self::selectCategorias();
        include __DIR__ . '/../Views/formulario-cadastro.php';
        exit;
    }

    public function salvar($postData, $postFiles)
    {

        $diretorioImagem = $this->verificarArquivo($postFiles);
        
        $sql = "INSERT INTO produto (nome, sku, unidade_medida_id, valor, quantidade, categoria_id, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(1, $postData['nome']);
            $stmt->bindValue(2, $postData['sku']);
            $stmt->bindValue(3, $postData['unidade_medida_id']);
            $stmt->bindValue(4, $postData['valor']);
            $stmt->bindValue(5, $postData['quantidade']);
            $stmt->bindValue(6, $postData['categoria_id']);
            $stmt->bindValue(7, $diretorioImagem);
            $stmt->execute();

            header('Location: /');
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }

    public function editar()
    {
        $id = $_GET['id'];

        $produto = self::selectUnitario($id);
        $produto = $produto[0];

        $unidadesMedidas = self::selectMedidas();
        $categorias = self::selectCategorias();

        include __DIR__ . '/../Views/formulario-edit.php';
        exit;
    }

    public function selectUnitario($id)
    {
        $sql = "SELECT 
            produto.id,
            produto.nome,
            produto.sku,
            produto.valor,
            produto.quantidade,
            produto.imagem,
            categoria.id AS categoria_id,
            categoria.nome AS categoria_nome,
            unidade_medida.id AS unidade_medida_id,
            unidade_medida.nome AS unidade_nome
        FROM 
            produto
        INNER JOIN 
            categoria ON produto.categoria_id = categoria.id
        INNER JOIN 
            unidade_medida ON produto.unidade_medida_id = unidade_medida.id
        WHERE 
            produto.id = :id
        ORDER BY 
            produto.id ASC";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
        }
    }

    public function atualizar($id, $post)
    {

        $diretorioImagem = $this->verificarArquivo($_FILES);

        $sql = "UPDATE produto SET nome = ?, sku = ?, unidade_medida_id = ?, valor = ?, quantidade = ?, categoria_id = ?, imagem = ? WHERE id = ?";

        try {
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(1, $post['nome']);
            $stmt->bindValue(2, $post['sku']);
            $stmt->bindValue(3, $post['unidade_medida_id']);
            $stmt->bindValue(4, $post['valor']);
            $stmt->bindValue(5, $post['quantidade']);
            $stmt->bindValue(6, $post['categoria_id']);
            $stmt->bindValue(7, $diretorioImagem);
            $stmt->bindValue(8, $id);
            $stmt->execute();
            header('Location: /');
        } catch (PDOException $e) {
            echo "Erro ao atualizar dados: " . $e->getMessage();
        }
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM produto WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            header('Location: /');
        } catch (PDOException $e) {
            echo "Erro ao deletar dados: " . $e->getMessage();
        }
    }

    public function pesquisar($termo)
    {
        $termo = strtolower($termo);
        $sql = "SELECT 
            produto.id,
            produto.nome,
            produto.sku,
            produto.valor,
            produto.quantidade,
            categoria.id AS categoria_id,
            categoria.nome AS categoria_nome,
            unidade_medida.id AS unidade_medida_id,
            unidade_medida.nome AS unidade_nome
        FROM 
            produto
        INNER JOIN 
            categoria ON produto.categoria_id = categoria.id
        INNER JOIN 
            unidade_medida ON produto.unidade_medida_id = unidade_medida.id
        WHERE produto.nome LIKE :termo OR produto.sku LIKE :termo;
        ORDER BY id ASC";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':termo', "%$termo%");
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        } catch (PDOException $e) {
            echo "Erro ao buscar dados: " . $e->getMessage();
        }
    }

    public function verificarArquivo($files){
        if ($this->validarTamanhoImagem($files)){
            echo "O tamanho da imagem deve ser do tipo PNG, JPG ou JPEG e menor que 2MB";
            echo "<br><a href='/'>Voltar</a>";
            die();
        }
        if (!empty($files['imagem']['name'])){
            $caminho = $this->getDiretorioImagem($files);
            move_uploaded_file($files['imagem']['tmp_name'], $caminho);

            // Função basename retorna nome do arquivo de um certo caminho 
            return "/Storage/" . basename($caminho);
        } else {
            return "/Storage/padrao.png";
        }

    }

    public function getDiretorioImagem($files){
        return __DIR__ . "\\..\\..\\public\\Storage\\" . uniqid() . "_" . $files['imagem']['name'];
    }

    public function validarTamanhoImagem($files){
        if ($files['imagem']['size'] > 2100000 || $files['imagem']['type'] != 'image/png' || $files['imagem']['type'] != 'image/jpeg' || $files['imagem']['type'] != 'image/jpg'){
            dd($files);
            return true;
        } else {
            return false;
        }
    }
}