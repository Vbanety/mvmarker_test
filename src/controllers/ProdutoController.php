<?php
require_once '../config/database.php';
require_once '../src/models/Produto.php';
require_once '../src/models/Fornecedor.php';

class ProdutoController {
    private $produto;
    private $fornecedor;

    public function __construct($pdo) {
        $this->produto = new Produto($pdo);
        $this->fornecedor = new Fornecedor($pdo);
    }

    public function listar() {
        $limit = 10; // Itens por página
        $totalProdutos = $this->produto->contar();
        $totalPaginas = ceil($totalProdutos / $limit);

        $paginaAtual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($paginaAtual < 1) $paginaAtual = 1;
        if ($paginaAtual > $totalPaginas) $paginaAtual = $totalPaginas;

        $offset = ($paginaAtual - 1) * $limit;
        $produtos = $this->produto->listar($limit, $offset);
        $fornecedores = $this->fornecedor->listarTodos();

        // Criar um mapa de fornecedores para acesso rápido
        $fornecedorMap = [];
        foreach ($fornecedores as $fornecedor) {
            $fornecedorMap[$fornecedor['id_fornecedor']] = $fornecedor['nome_fantasia'];
        }

        
        require '../src/views/produto/listar.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id_fornecedor' => $_POST['id_fornecedor'],
                'nome_produto' => $_POST['nome_produto'],
                'valor_produto' => $_POST['valor_produto'],
                'peso' => $_POST['peso'],
                'quantidade_estoque' => $_POST['quantidade_estoque'],
            ];
            $this->produto->criar($dados);
            header('Location: /public/?action=listar_produtos');
        } else {
            $fornecedores = $this->fornecedor->listarTodos();
            require '../src/views/produto/cadastrar.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id_fornecedor' => $_POST['id_fornecedor'],
                'nome_produto' => $_POST['nome_produto'],
                'valor_produto' => $_POST['valor_produto'],
                'peso' => $_POST['peso'],
                'quantidade_estoque' => $_POST['quantidade_estoque'],
            ];
            $this->produto->atualizar($id, $dados);
            header('Location: /public/?action=listar_produtos');
        } else {
            $produto = $this->produto->buscarPorId($id);
            $idFornecedor = $produto['id_fornecedor'];
            $fornecedor = $this->fornecedor->buscarPorId($idFornecedor);
            $fornecedores = $this->fornecedor->listarTodos();
            require '../src/views/produto/editar.php';
        }
    }

    public function deletar($id) {
        $this->produto->deletar($id);
        header('Location: /public/?action=listar_produtos');
    }

    public function deletarEmMassa($ids) {
        if(isset($ids)) {
            $this->produto->deletarEmMassa($ids);
            header('Location: /public/index.php?action=listar_produtos');
        } else {
            $erro = 'Nenhum produto selecionado';
            header('Location: /public/index.php?action=listar_produtos');
        }
    }

}
?>
