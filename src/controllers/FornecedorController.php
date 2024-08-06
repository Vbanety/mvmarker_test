<?php
require_once '../config/database.php';
require_once '../src/models/Fornecedor.php';

class FornecedorController {
    private $fornecedor;

    public function __construct($pdo) {
        $this->fornecedor = new Fornecedor($pdo);
    }

    public function listar() {
        $limit = 10; // Itens por página
        $totalFornecedores = $this->fornecedor->contar();
        $totalPaginas = ceil($totalFornecedores / $limit);

        $paginaAtual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($paginaAtual < 1) $paginaAtual = 1;
        if ($paginaAtual > $totalPaginas) $paginaAtual = $totalPaginas;

        $offset = ($paginaAtual - 1) * $limit;
        $fornecedores = $this->fornecedor->listar($limit, $offset);

        require '../src/views/fornecedor/listar.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome_vendedor' => $_POST['nome_vendedor'],
                'email_vendedor' => $_POST['email_vendedor'],
                'cnpj' => $_POST['cnpj'],
                'razao_social' => $_POST['razao_social'],
                'nome_fantasia' => $_POST['nome_fantasia'],
                'telefone' => $_POST['telefone'],
                'celular_vendedor' => $_POST['celular_vendedor'],
            ];
            $this->fornecedor->criar($dados);
            header('Location: /public/?action=listar_fornecedores');
        } else {
            require '../src/views/fornecedor/cadastrar.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome_vendedor' => $_POST['nome_vendedor'],
                'email_vendedor' => $_POST['email_vendedor'],
                'cnpj' => $_POST['cnpj'],
                'razao_social' => $_POST['razao_social'],
                'nome_fantasia' => $_POST['nome_fantasia'],
                'telefone' => $_POST['telefone'],
                'celular_vendedor' => $_POST['celular_vendedor'],
            ];
            $this->fornecedor->atualizar($id, $dados);
            header('Location: /public/?action=listar_fornecedores');
        } else {
            $fornecedor = $this->fornecedor->buscarPorId($id);
            require '../src/views/fornecedor/editar.php';
        }
    }

    public function deletar($id) {
        $this->fornecedor->deletar($id);
        header('Location: /public/?action=listar_fornecedores');
    }

    public function deletarEmMassa($ids) {
        if(isset($ids)) {
            $this->fornecedor->deletarEmMassa($ids);
            header('Location: /public/index.php?action=listar_fornecedores');
        } else {
            $erro = 'Nenhum fornecedor foi selecionado';
            header('Location: /public/index.php?action=listar_fornecedores');
        }
    }
}
?>
