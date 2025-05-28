<?php

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