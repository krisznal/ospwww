<?php

class GradePrinter {
    public static function print(Student $student) {
        echo "<h4>Oceny ucznia: {$student->getFullName()}</h4>";
        foreach ($student->getGrades() as $grade) {
            echo "{$grade->getSubject()->getName()} - {$grade->getValue()} ({$grade->getDate()})<br>";
        }
    }
}