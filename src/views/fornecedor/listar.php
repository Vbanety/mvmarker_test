<!DOCTYPE html>
<html>

<head>
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">

</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="?action=listar_fornecedores">Fornecedores</a></li>
                <li><a href="?action=listar_produtos">Produtos</a></li>
            </ul>
        </nav>

        <div class="title">
            <h1>Lista de Fornecedores</h1>
            <a class="btn_add" href="?action=cadastrar_fornecedor">Cadastrar Fornecedor</a>
        </div>
        <form id="deleteForm" action="?action=deletar_fornecedores" method="post">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome do Vendedor</th>
                    <th>Email</th>
                    <th>CNPJ</th>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                    <th><input type="checkbox" id="select_all"></th>
                </tr>
                <?php foreach ($fornecedores as $fornecedor) : ?>
                    <tr>
                        <td><?php echo $fornecedor['id_fornecedor']; ?></td>
                        <td><?php echo $fornecedor['nome_vendedor']; ?></td>
                        <td><?php echo $fornecedor['email_vendedor']; ?></td>
                        <td><?php echo $fornecedor['cnpj']; ?></td>
                        <td><?php echo $fornecedor['razao_social']; ?></td>
                        <td><?php echo $fornecedor['nome_fantasia']; ?></td>
                        <td><?php echo $fornecedor['telefone']; ?></td>
                        <td><?php echo $fornecedor['celular_vendedor']; ?></td>
                        <td>
                            <a href="?action=editar_fornecedor&id=<?php echo $fornecedor['id_fornecedor']; ?>">Editar</a>
                            <a href="?action=deletar_fornecedor&id=<?php echo $fornecedor['id_fornecedor']; ?>">Excluir</a>
                        </td>
                        <td><input type="checkbox" name="ids[]" value="<?php echo $fornecedor['id_fornecedor']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit">Deletar Selecionados</button>
        </form>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                <a href="?action=listar_fornecedores&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>


        <script>
            document.getElementById('select_all').onclick = function() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                }
            }
        </script>
    </div>
</body>

</html>