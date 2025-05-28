<?php
require_once 'teacher.php';

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