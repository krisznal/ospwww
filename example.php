<?php

abstract class Person {
    protected string $firstName;
    protected string $lastName;

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName(): string {
        return "{$this->firstName} {$this->lastName}";
    }
}

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

class Teacher extends Person {
    private string $subject;

    public function __construct(string $firstName, string $lastName, string $subject) {
        parent::__construct($firstName, $lastName);
        $this->subject = $subject;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function introduce(): string {
        return "Nauczyciel: {$this->getFullName()}<br>Uczy: {$this->subject}<br>";
    }
}


class Subject {
    private string $name;
    private Teacher $teacher;

    public function __construct(string $name, Teacher $teacher) {
        $this->name = $name;
        $this->teacher = $teacher;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getTeacher(): Teacher {
        return $this->teacher;
    }
}

class Grade {
    private Subject $subject;
    private float $value;
    private string $date;

    public function __construct(Subject $subject, float $value, string $date) {
        $this->subject = $subject;
        $this->value = $value;
        $this->date = $date;
    }

    public function getSubject(): Subject {
        return $this->subject;
    }

    public function getValue(): float {
        return $this->value;
    }

    public function getDate(): string {
        return $this->date;
    }
}

class SchoolClass {
    private string $name;
    private Teacher $wychowawca;
    private array $students = [];
    private array $subjects = [];

    public function __construct(string $name, Teacher $wychowawca) {
        $this->name = $name;
        $this->wychowawca = $wychowawca;
    }

    public function addStudent(Student $student) {
        $this->students[$student->getId()] = $student;
    }

    public function isStudentInTheClass(Student $student): bool {
        return isset($this->students[$student->getId()]);
    }

    public function addSubject(Subject $subject, string $dayOfWeek, string $hour) {
        $this->subjects[$dayOfWeek][$hour] = $subject;
    }

    public function printSchedule() {
        echo "<h3>Plan lekcji klasy {$this->name}</h3>";
        foreach ($this->subjects as $day => $hours) {
            echo "<strong>Dzień: $day</strong><br>";
            foreach ($hours as $hour => $subject) {
                echo "$hour - {$subject->getName()}<br>";
            }
            echo "<br>";
        }
    }
}

class GradePrinter {
    public static function print(Student $student) {
        echo "<h4>Oceny ucznia: {$student->getFullName()}</h4>";
        foreach ($student->getGrades() as $grade) {
            echo "{$grade->getSubject()->getName()} - {$grade->getValue()} ({$grade->getDate()})<br>";
        }
    }
}

class ConsoleGradePrinter {
    public static function print(Student $student) {
        echo "Oceny ucznia: {$student->getFullName()}\n";
        foreach ($student->getGrades() as $grade) {
            echo "- {$grade->getSubject()->getName()} | Ocena: {$grade->getValue()} | Data: {$grade->getDate()}\n";
        }
    }
}


$teacher1 = new Teacher('Helena', 'Kreda', 'Matematyka');
$teacher2 = new Teacher('Kazimierz', 'Tablica', 'Język polski');

$subject1 = new Subject('Matematyka', $teacher1);
$subject2 = new Subject('Język polski', $teacher2);

$classA = new SchoolClass('1A 2025', $teacher1);
$classB = new SchoolClass('1B 2025', $teacher2);

$student1 = new Student(1, 'Tomek', 'Atomek');
$student2 = new Student(2, 'Kasia', 'Krzeslo');
$student3 = new Student(3, 'Jan', 'Beton');
$student4 = new Student(4, 'Maciek', 'Piątek');
$student5 = new Student(5, 'Olek', 'Kalkulator');

$classA->addStudent($student1);
$classA->addStudent($student2);
$classA->addStudent($student5);

$classB->addStudent($student3);
$classB->addStudent($student4);

echo "<h3>Sprawdzenie uczniów w klasie 1A</h3>";
echo $classA->isStudentInTheClass($student1) ? "{$student1->getFullName()} jest w klasie<br>" : "{$student1->getFullName()} NIE jest w klasie<br>";
echo $classA->isStudentInTheClass($student3) ? "{$student3->getFullName()} jest w klasie<br>" : "{$student3->getFullName()} NIE jest w klasie<br>";

$classA->addSubject($subject1, 'Poniedziałek', '8:00');
$classA->addSubject($subject2, 'Poniedziałek', '8:55');
$classA->printSchedule();

$student1->addGrade(new Grade($subject1, 5, '2025-05-20'));
$student1->addGrade(new Grade($subject2, 4, '2025-05-21'));
$student1->addGrade(new Grade($subject1, 3.5, '2025-05-22'));

GradePrinter::print($student1);
ConsoleGradePrinter::print($student1); 
echo "Średnia z Matematyki: " . $student1->getAverageForSubject('Matematyka') . "<br>";
