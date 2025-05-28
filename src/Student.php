<?php 
require_once 'Person.php';
require_once 'Grade.php';


class Student extends Person {
    private int $id;
    private array $grades = [];

    public function __construct(int $id, string $firstName, string $lastName) {
        parent::__construct($firstName, $lastName);
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }
    public function getFirstName(): string {
    return $this->firstName;
}

    public function getLastName(): string {
        return $this->lastName;
    }


    public function addGrade(Grade $grade) {
        $this->grades[] = $grade;
    }

    public function getGrades(): array {
        return $this->grades;
    }

    public function getGradesForSubject(string $subjectName): array {
        return array_filter($this->grades, fn($g) => $g->getSubject()->getName() === $subjectName);
    }

    public function getAverageForSubject(string $subjectName): float {
        $grades = $this->getGradesForSubject($subjectName);
        if (count($grades) === 0) return 0.0;
        $sum = array_sum(array_map(fn($g) => $g->getValue(), $grades));
        return round($sum / count($grades), 2);
    }

}
?>