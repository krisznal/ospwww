<?php
require_once 'src/AbstractRepository.php';
require_once 'src/Student.php';

class StudentRepository extends AbstractRepository {
    public function __construct() {
        parent::__construct('students');
    }

    protected function map(array $row): Student {
        return new Student($row['id'], $row['firstName'], $row['lastName']);
    }

    protected function getFields(): array {
        return ['id', 'firstName', 'lastName'];
    }
}
