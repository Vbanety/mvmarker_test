<?php
require_once '../config/database.php';
require_once '../src/controllers/FornecedorController.php';
require_once '../src/controllers/ProdutoController.php';


$fornecedores = new FornecedorController($pdo);
$produtos = new ProdutoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            // CASOS PARA FORNECEDORES
            case 'listar_fornecedores':
                $fornecedores->listar();
                break;
            case 'cadastrar_fornecedor':
                $fornecedores->cadastrar();
                break;
            case 'editar_fornecedor':
                $fornecedores->editar($_GET['id']);
                break;
            case 'deletar_fornecedor':
                $fornecedores->deletar($_GET['id']);
                break;

            // CASOS PARA PRODUTOS
            case 'listar_produtos':
                $produtos->listar();
                break;
            case 'cadastrar_produto':
                $produtos->cadastrar();
                break;
            case 'editar_produto':
                $produtos->editar($_GET['id']);
                break;
            case 'deletar_produto':
                $produtos->deletar($_GET['id']);
                break;
        }
    } else {
        // Página inicial ou redirecionamento padrão
        $data = json_encode($fornecedores->listar());
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            // CASOS PARA FORNECEDORES
            case 'editar_fornecedor':
                $fornecedores->editar($_GET['id']);
                break;
            case 'cadastrar_fornecedor':
                $fornecedores->cadastrar();
                break;
            case 'deletar_fornecedores':
                $fornecedores->deletarEmMassa($_REQUEST['ids']);
                break;
            // CASOS PARA PRODUTOS
            case 'editar_produto':
                $produtos->editar($_GET['id']);
                break;
            case 'cadastrar_produto':
                $produtos->cadastrar();
                break;
            case 'deletar_produtos':
                $produtos->deletarEmMassa($_REQUEST['ids']);
                break;
        }
    } else {
        // Página inicial ou redirecionamento padrão
        $data = json_encode($produtos->listar());
        exit;
    }
}
