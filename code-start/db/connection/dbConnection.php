<?php
require_once("Idb.php");
class SqlDb implements Idb
{
    private static ?SqlDb $sqlDb = null;
    private static ?PDO $connection = null;
    private static function setConnection($hostName, $dbName, $dbUser, $dbPassword)
    {
        SqlDb::$connection = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword);
    }
    private static function getConnection()
    {
        return SqlDb::$connection;
    }
    public static function closeConnection()
    {
        SqlDb::$connection = null;
        SqlDb::$sqlDb = null;
    }
    public static function Connection($hostName, $dbName, $dbUser, $dbPassword)
    {
        if (SqlDb::$sqlDb == null) {
            SqlDb::$sqlDb = new SqlDb();
            SqlDb::setConnection($hostName, $dbName, $dbUser, $dbPassword);
            return SqlDb::getConnection();
        }
        return SqlDb::getConnection();
    }
}