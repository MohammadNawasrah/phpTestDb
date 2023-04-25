<?php
// $dbName = "ideas";
// $dbUser = "mohammad";
// $dbPassword = "123";
// $hostName = "localhost";
// $dsn = "mysql:host=$hostName;dbname=$dbName";

// $dbName = "ideas";
// $dbUser = "mohammad";
// $dbPassword = "123";
// $hostName = "localhost";
// $sqlCrud = new SqlCrud();
// $sqlCrud->createTable(SqlDb::Connection($hostName, $dbName, $dbUser, $dbPassword), "himohammad", "id INT PRIMARY KEY AUTO_INCREMENT,
// title VARCHAR(40) NOT NULL,
// TEXT TEXT NOT NULL");


$dbName = "ideas";
$dbUser = "mohammad";
$dbPassword = "123";
$hostName = "localhost";
// $sqlCrud = new SqlCrud();
// $sqlCrud->insert(SqlDb::Connection($hostName, $dbName, $dbUser, $dbPassword), "himohammad",  $arrayName = array('title' => "hello my name is mohammad", "text" => "fuckyou man"));
require_once("../code-start/db//connection/dbConnection.php");
$conn = SqlDb::Connection($hostName, $dbName, $dbUser, $dbPassword);
