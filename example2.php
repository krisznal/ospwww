<?php
require_once 'classes.php';

// 1. przenieść klasy do osobnych plików
// 2. utworzyć tabele dla studenta
// CREATE TABLE students (
//     id INT PRIMARY KEY,
//     first_name VARCHAR(50),
//     last_name VARCHAR(50)
// );

// 3. uzupełnić repozytorium
// 4. make this file work

/* repozytorium potrzebuje bazy danych */
$studentRepository = new StudentRepository();

$student1 = new Student(1, 'Tomek', 'Atomek');
$student2 = new Student(2, 'Kasia', 'Krzeslo');
$student3 = new Student(3, 'Jan', 'Beton');
$student4 = new Student(4, 'Maciek', 'Piątek');
$student5 = new Student(5, 'Olek', 'Kalkulator');

$studentRepository->save($student1);
$studentRepository->save($student2);
$studentRepository->save($student3);
$studentRepository->save($student4);
$studentRepository->save($student5);

$studentA = $studentRepository->get(1);
$studentB = $studentRepository->get(2);
$studentC = $studentRepository->get(3);

$studentRepository->remove($student2);

echo count($studentRepository->getAll());

$teacherRepo = new TeacherRepository();

$teacher1 = new Teacher('Helena', 'Kreda', 'Matematyka');
$teacher2 = new Teacher('Kazimierz', 'Tablica', 'Polski');

$teacherRepo->save($teacher1);
$teacherRepo->save($teacher2);

$teachers = $teacherRepo->getAll();
foreach ($teachers as $teacher) {
    echo $teacher->introduce();
}

