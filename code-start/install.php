<?php require_once("config.php") ?>
<?php

$connection = new PDO($dsn, $dbUser, $dbPassword);
//Php DataBase Object (PDO)
$sql = "CREATE TABLE IF NOT EXISTS ideasTable(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    TEXT TEXT NOT NULL
);";
$connection->exec($sql);
echo "You are connected to the database successfully";

?>