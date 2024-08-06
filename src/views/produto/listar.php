<!DOCTYPE html>
<html>

<head>
    <title>Lista de Produtos</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>

<body>
    <?php require_once __DIR__ . '/../../../utils/helpers.php' ?>
    <div class="container">
    <nav>
        <ul>
            <li><a href="?action=listar_fornecedores">Fornecedores</a></li>
            <li><a href="?action=listar_produtos">Produtos</a></li>
        </ul>
    </nav>
    <div class="title">
        <h1>Lista de Produtos</h1>
        <a class="btn_add" href="?action=cadastrar_produto">Cadastrar Produto</a>
    </div>
    <form id="deleteForm" action="?action=deletar_produtos" method="post">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Fornecedor</th>
                <th>Nome do Produto</th>
                <th>Valor</th>
                <th>Peso</th>
                <th>Qde em Estoque</th>
                <th>Ações</th>
                <th><input type="checkbox" id="select_all"></th>
            </tr>
            <?php foreach ($produtos as $produto) : ?>
                
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $fornecedorMap[$produto['id_fornecedor']]; ?></td>
                    <td><?php echo $produto['nome_produto']; ?></td>
                    <td><?php echo isset($produto['valor_produto']) ? Helpers::formatarValorPtBr($produto['valor_produto']) : $produto['valor_produto']; ?></td>
                    <td><?php echo isset($produto['peso']) ? Helpers::formatarPeso($produto['peso']) : $produto['peso']; ?></td>
                    <td><?php echo $produto['quantidade_estoque']; ?></td>
                    <td>
                        <a href="?action=editar_produto&id=<?php echo $produto['id_produto']; ?>">Editar</a>
                        <a href="?action=deletar_produto&id=<?php echo $produto['id_produto']; ?>">Excluir</a>
                    </td>
                    <td><input type="checkbox" name="ids[]" value="<?php echo $produto['id_produto']; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Deletar Selecionados</button>
    </form>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
            <a href="?action=listar_produtos&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

    </div>
    <script>
        document.getElementById('select_all').onclick = function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
</body>

</html>