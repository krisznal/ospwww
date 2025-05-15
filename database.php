<?php
$servername = "localhost";
$username = "www";
$password = "password";
$dbName = "ospwww";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

}

function getPosts()
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM blog_post;");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getSinglePost($id)
{
    global $conn;
    $query = $conn->prepare("SELECT * FROM blog_post WHERE id = :idValue");
    $query->bindParam(':idValue', $id);

    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}



