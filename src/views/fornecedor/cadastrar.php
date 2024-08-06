<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Fornecedor</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="?action=cadastrar_fornecedor" class="form">
            <div class="title_register">
                <h1>Cadastrar Fornecedor</h1>
                <a href="?action=listar_fornecedores">voltar</a>
            </div>
            <label>Nome do Vendedor:</label>
            <input type="text" name="nome_vendedor" required><br>
            <label>Email:</label>
            <input type="email" name="email_vendedor" required><br>
            <label>CNPJ:</label>
            <input type="text" name="cnpj" required><br>
            <label>Razão Social:</label>
            <input type="text" name="razao_social" required><br>
            <label>Nome Fantasia:</label>
            <input type="text" name="nome_fantasia" required><br>
            <label>Telefone:</label>
            <input type="text" name="telefone" required><br>
            <label>Celular:</label>
            <input type="text" name="celular_vendedor" required><br>
            <button class="btn" type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>