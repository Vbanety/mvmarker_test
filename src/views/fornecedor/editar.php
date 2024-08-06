<!DOCTYPE html>
<html>
<head>
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="?action=editar_fornecedor&id=<?php echo $fornecedor['id_fornecedor']; ?>" class="form">
            <div class="title_register">
                <h1>Editar Fornecedor</h1>
                <a href="?action=listar_fornecedores">voltar</a>
            </div>
            <label>Nome do Vendedor:</label>
            <input type="text" name="nome_vendedor" value="<?php echo $fornecedor['nome_vendedor']; ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email_vendedor" value="<?php echo $fornecedor['email_vendedor']; ?>" required><br>
            <label>CNPJ:</label>
            <input type="text" name="cnpj" value="<?php echo $fornecedor['cnpj']; ?>" required><br>
            <label>Razão Social:</label>
            <input type="text" name="razao_social" value="<?php echo $fornecedor['razao_social']; ?>" required><br>
            <label>Nome Fantasia:</label>
            <input type="text" name="nome_fantasia" value="<?php echo $fornecedor['nome_fantasia']; ?>" required><br>
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $fornecedor['telefone']; ?>" required><br>
            <label>Celular:</label>
            <input type="text" name="celular_vendedor" value="<?php echo $fornecedor['celular_vendedor']; ?>" required><br>
            <button class="btn" type="submit">Atualizar</button>
        </form>

    </div>
</body>
</html>
