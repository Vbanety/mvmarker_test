<?php
class Fornecedor {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar($limit, $offset) {
        $limit = max(1, intval($limit));
        $offset = max(0, intval($offset));
        
        $stmt = $this->pdo->prepare("SELECT * FROM fornecedores LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM fornecedores");
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public function listarTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM fornecedores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM fornecedores WHERE id_fornecedor = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO fornecedores (nome_vendedor, email_vendedor, cnpj, razao_social, nome_fantasia, telefone, celular_vendedor) VALUES (:nome_vendedor, :email_vendedor, :cnpj, :razao_social, :nome_fantasia, :telefone, :celular_vendedor)");
        return $stmt->execute($dados);
    }

    public function atualizar($id, $dados) {
        $dados['id_fornecedor'] = $id;
        $stmt = $this->pdo->prepare("UPDATE fornecedores SET nome_vendedor = :nome_vendedor, email_vendedor = :email_vendedor, cnpj = :cnpj, razao_social = :razao_social, nome_fantasia = :nome_fantasia, telefone = :telefone, celular_vendedor = :celular_vendedor WHERE id_fornecedor = :id_fornecedor");
        return $stmt->execute($dados);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM fornecedores WHERE id_fornecedor = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletarEmMassa($ids) {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare("DELETE FROM fornecedores WHERE id_fornecedor IN ($placeholders)");
        foreach ($ids as $index => $id) {
            $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
        }
        return $stmt->execute();
    }
}
?>
