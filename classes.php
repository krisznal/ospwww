<?php

class DatabaseConnection {
    private string $host;
    private string $username;
    private string $password;
    private string $dbName;

    private PDO $connection;

    public function __construct(string $host, string $username, string $password, string $dbName) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;

        return $this->connect();
    }

    public function connect(): PDO {

        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        } catch(PDOException $e) {

        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}

class BlogPosts
{
    private DatabaseConnection $databaseConnection;

    public function __construct(DatabaseConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function getList(): array
    {
        $query = $this->databaseConnection->getConnection()->prepare("SELECT * FROM blog_post;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost(int $id): array
    {
        $query = $this->databaseConnection->getConnection()->prepare("SELECT * FROM blog_post WHERE id = :idValue");
        $query->bindParam(':idValue', $id);

        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}


$dbConnection = new DatabaseConnection("localhost", "www", "password", "ospwww");

$blogPost = new BlogPosts($dbConnection);

$blogPost->getList();
$blogPost->getPost(1);



