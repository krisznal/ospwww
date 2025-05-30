<?php
require_once 'src/AbstractRepository.php';
require_once 'src/Teacher.php';

class TeacherRepository extends AbstractRepository {
    public function __construct() {
        parent::__construct('teachers');
    }

    protected function map(array $row): Teacher {
        return new Teacher($row['id'], $row['firstName'], $row['lastName'], $row['subject']);
    }

    protected function getFields(): array {
        return ['id', 'firstName', 'lastName', 'subject'];
    }
}
