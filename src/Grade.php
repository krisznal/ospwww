<?php
require_once 'Subject.php';

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