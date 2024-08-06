<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar($limit, $offset) {

        $limit = max(1, intval($limit));
        $offset = max(0, intval($offset));
        
        $stmt = $this->pdo->prepare("SELECT * FROM produtos LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM produtos");
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public function listarTodos() {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id_produto = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados) {
        $stmt = $this->pdo->prepare("INSERT INTO produtos (id_fornecedor, nome_produto, valor_produto, peso, quantidade_estoque) VALUES (:id_fornecedor, :nome_produto, :valor_produto, :peso, :quantidade_estoque)");
        return $stmt->execute($dados);
    }

    public function atualizar($id, $dados) {
        $dados['id_produto'] = $id;
        $stmt = $this->pdo->prepare("UPDATE produtos SET id_fornecedor = :id_fornecedor, nome_produto = :nome_produto, valor_produto = :valor_produto, peso = :peso, quantidade_estoque = :quantidade_estoque WHERE id_produto = :id_produto");
        return $stmt->execute($dados);
    }

    public function deletar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletarEmMassa($ids) {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto IN ($placeholders)");
        foreach ($ids as $index => $id) {
            $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
        }
        return $stmt->execute();
    }
}
?>
