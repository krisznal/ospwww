<?php
require_once 'Student.php';

class StudentRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=ospwww;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function get(int $id): ?Student
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Student($row['id'], $row['first_name'], $row['last_name']);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM students");
        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = new Student($row['id'], $row['first_name'], $row['last_name']);
        }
        return $students;
    }

    public function save(Student $student): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO students (id, first_name, last_name) 
            VALUES (:id, :first_name, :last_name)
            ON DUPLICATE KEY UPDATE 
                first_name = VALUES(first_name), 
                last_name = VALUES(last_name)
        ");
        return $stmt->execute([
            'id' => $student->getId(),
            'first_name' => $student->getFirstName(),
            'last_name' => $student->getLastName(),
        ]);
    }

    public function remove(Student $student): bool
    {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$student->getId()]);
    }
}
