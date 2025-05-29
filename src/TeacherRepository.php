<!-- CREATE TABLE teachers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    subject VARCHAR(100)
); -->
<?php
require_once 'Teacher.php';

class TeacherRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=ospwww;charset=utf8', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save(Teacher $teacher): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO teachers (first_name, last_name, subject)
            VALUES (:first_name, :last_name, :subject)
        ");
        return $stmt->execute([
            'first_name' => $teacher->getFirstName(),
            'last_name' => $teacher->getLastName(),
            'subject' => $teacher->getSubject()
        ]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM teachers");
        $teachers = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $teachers[] = new Teacher($row['first_name'], $row['last_name'], $row['subject']);
        }

        return $teachers;
    }
}