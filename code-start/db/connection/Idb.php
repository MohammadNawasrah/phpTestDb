<?php
interface Idb
{
    public static function Connection($hostName, $dbName, $dbUser, $dbPassword);
    public static function closeConnection();
}
