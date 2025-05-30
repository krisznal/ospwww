<?php
require_once 'src/DatabaseConnection.php';

abstract class AbstractRepository {
    protected PDO $db;
    protected string $table;

    public function __construct(string $table) {
        $this->db = (new DatabaseConnection())->get();
        $this->table = $table;
    }

    abstract protected function map(array $row);

    abstract protected function getFields(): array;

    public function save($entity): bool {
        $fields = $this->getFields();
        $placeholders = array_map(fn($f) => ":$f", $fields);
        $assignments = array_map(fn($f) => "$f = :$f", $fields);

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $fields) . ")
                VALUES (" . implode(', ', $placeholders) . ")
                ON DUPLICATE KEY UPDATE " . implode(', ', $assignments);

        $data = [];
        foreach ($fields as $field) {
            $method = 'get' . ucfirst($field);
            $data[":$field"] = $entity->$method();
        }

        return $this->db->prepare($sql)->execute($data);
    }

    public function get(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->map($row) : null;
    }

    public function getAll(): array {
        $rows = $this->db->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
        return array_map([$this, 'map'], $rows);
    }

    public function remove($entity): bool {
        return $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?")->execute([$entity->getId()]);
    }
}
