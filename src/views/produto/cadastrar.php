<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="?action=cadastrar_produto" class="form">
            <div class="title_register">
                <h1>Cadastrar Produto</h1>
                <a href="?action=listar_produtos">voltar</a>
            </div>
            <label>Fornecedor:</label>
            <select name="id_fornecedor" required>
                <option value="">Selecione um fornecedor</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?php echo $fornecedor['id_fornecedor']; ?>">
                        <?php echo $fornecedor['nome_fantasia']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Nome do Produto:</label>
            <input type="text" name="nome_produto" required><br>
            <label>Valor:</label>
            <input type="number" step="0.01" name="valor_produto" required><br>
            <label>Peso:</label>
            <input type="number" step="0.01" name="peso" required><br>
            <label>Qde em Estoque:</label>
            <input type="number" name="quantidade_estoque" required><br>
            <button class="btn" type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
