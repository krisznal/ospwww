<?php

class Student {
    public string $firstName;
    public string $lastName;
    public array $grades = [];

    public function addGrade(Grade $grade) {
        $this->grades[] = $grade;
    }

    public function printGrades() {
        echo "<h4>Oceny ucznia {$this->firstName} {$this->lastName}</h4>";
        foreach ($this->grades as $grade) {
            echo "{$grade->subject->name} - {$grade->value} ({$grade->date})<br>";
        }
    }

    public function getAverageForSubject(string $subjectName): float {
        $sum = 0;
        $count = 0;
        foreach ($this->grades as $grade) {
            if ($grade->subject->name === $subjectName) {
                $sum += $grade->value;
                $count++;
            }
        }
        return $count > 0 ? round($sum / $count, 2) : 0.0;
    }
}
class Grade {
    public Subject $subject;
    public float $value;
    public string $date;

    public function __construct(Subject $subject, float $value, string $date) {
        $this->subject = $subject;
        $this->value = $value;
        $this->date = $date;
    }
}


class Teacher {
    public string $firstName = '';
    public string $lastName = '';
}

class Subject {
    public string $name;
    public Teacher $teacher;
}

class SchoolClass {
    public string $name;
    public array $students = [];
    public Teacher $wychowawca;

    public array $subjects = []; 

    public function addStudent(int $number, Student $student) {
        $this->students[$number] = $student;
    }

    public function isStudentInTheClass(Student $student): bool {
        foreach ($this->students as $s) {
            if (
                $s->firstName === $student->firstName &&
                $s->lastName === $student->lastName
            ) {
                return true;
            }
        }
        return false;
    }

    public function addSubject(Subject $subject, $dayOfWeek, $hour) {
        $this->subjects[$dayOfWeek][$hour] = $subject;
    }

    public function printSchedule() {
        echo "<h3>Plan lekcji klasy {$this->name}</h3>";
        foreach ($this->subjects as $day => $hours) {
            echo "<strong>Dzień: $day</strong><br>";
            foreach ($hours as $hour => $subject) {
                echo "$hour - {$subject->name}<br>";
            }
            echo "<br>";
        }
    }
}
$teacher = new Teacher();
$teacher->firstName = 'Helena';
$teacher->lastName = 'Kreda';

$teacher2 = new Teacher();
$teacher2->firstName = 'Kazimierz';
$teacher2->lastName = 'Tablica';

$subject = new Subject();
$subject->name = 'Matematyka';
$subject->teacher = $teacher;

$subject2 = new Subject();
$subject2->name = 'Język polski';
$subject2->teacher = $teacher2;

$schoolClassA = new SchoolClass();
$schoolClassA->name = '1A 2025';

$schoolClassB = new SchoolClass();
$schoolClassB->name = '1B 2025';

$student1 = new Student();
$student1->firstName = 'Tomek';
$student1->lastName = 'Atomek';

$student2 = new Student();
$student2->firstName = 'Kasia';
$student2->lastName = 'Krzeslo';

$student3 = new Student();
$student3->firstName = 'Jan';
$student3->lastName = 'Beton';

$student4 = new Student();
$student4->firstName = 'Maciek';
$student4->lastName = 'Piatek';

$student5 = new Student();
$student5->firstName = 'Olek';
$student5->lastName = 'Kalkulator';

$schoolClassA->addStudent(1, $student1);
$schoolClassA->addStudent(2, $student2);
$schoolClassA->addStudent(3, $student5);

$schoolClassB->addStudent(1, $student3);
$schoolClassB->addStudent(2, $student4);

echo "<h3>Sprawdzenie uczniów w klasie {$schoolClassA->name}</h3>";
if ($schoolClassA->isStudentInTheClass($student1)) {
    echo "{$student1->firstName} jest w klasie<br>";
} else {
    echo "{$student1->firstName} NIE jest w klasie<br>";
}

if ($schoolClassA->isStudentInTheClass($student3)) {
    echo "{$student3->firstName} jest w klasie<br>";
} else {
    echo "{$student3->firstName} NIE jest w klasie<br>";
}

$schoolClassA->addSubject($subject, 1, '8:00');
$schoolClassA->addSubject($subject2, 1, '8:55');

$schoolClassA->printSchedule();

$grade1 = new Grade($subject, 5, '2025-05-20');
$grade2 = new Grade($subject2, 4, '2025-05-21');
$grade3 = new Grade($subject, 3.5, '2025-05-22');

$student1->addGrade($grade1);
$student1->addGrade($grade2);
$student1->addGrade($grade3);

$student1->printGrades();
echo "Średnia z Matematyki: " . $student1->getAverageForSubject('Matematyka') . "<br>";
