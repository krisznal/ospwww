<?php

class ConsoleGradePrinter {
    public static function print(Student $student) {
        echo "Oceny ucznia: {$student->getFullName()}\n";
        foreach ($student->getGrades() as $grade) {
            echo "- {$grade->getSubject()->getName()} | Ocena: {$grade->getValue()} | Data: {$grade->getDate()}\n";
        }
    }
}