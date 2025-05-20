<?php

class Student {
    public $firstName;
    public $lastName;
}

class Teacher {
    public $firstName;
    public $lastName;
}

class Subject { //przedmiot (matma, polski)
    public $name;

    public Teacher $teacher;
}


class SchoolClass { // klasa
    public $name;
    public $students;

    public Teacher $wychowawca;

    public function addStudent(int $number, Student $student)
    {

    }

    public function isStudentInTheClass(Student $student)
    {

    }

    public function addSubject(Subject $subject, $dayOfWeek, $hour) {

    }
}

$teacher = new Teacher();
$teacher->lastName = 'Last Name';

$teacher2 = new Teacher();
$teacher2->lastName = 'Last Name 2';

$subject = new Subject();
$subject->name = 'Matma';

$subject2 = new Subject();
$subject2->name = 'Polski';


$schoolClassA = new SchoolClass();
$schoolClassA->name = '1A 2025';

$schoolClassB = new SchoolClass();
$schoolClassB->name = '1B 2025';

$student1 = new Student();
$student1->firstName = 'Student 1';
$student1->lastName = 'Student 1';

$student2 = new Student();
$student2->firstName = 'Student 2';
$student2->lastName = 'Student 2';

$student3 = new Student();
$student3->firstName = 'Student 3';
$student3->lastName = 'Student 3';

$schoolClassA->addStudent(1, $student1);
$schoolClassA->addStudent(2, $student2);

$schoolClassB->addStudent(1, $student3);

if ($schoolClassA->isStudentInTheClass($student1) ) {
    ///.....
} else {

}

if ($schoolClassA->isStudentInTheClass($student3) ) {
    ///.....
} else {

}

$schoolClassA->addSubject($subject, 1, '8:00');
$schoolClassA->addSubject($subject2, 1, '8:55');