<?php
require_once 'Person.php';
require_once 'Subject.php';


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
?>