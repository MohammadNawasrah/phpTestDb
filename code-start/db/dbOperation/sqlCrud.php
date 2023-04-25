<?php
require_once("iCrud.php");
class SqlCrud implements Icrud
{
    public function createTable($connection, $tableName, $columnsName)
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS $tableName($columnsName);";
            $connection->exec($sql);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function insert($connection, $tableName,  $json)
    {
        $key = implode(", ", array_keys($json));
        $keyData = ":" . implode(", :", array_keys($json));
        $sql = "INSERT INTO  $tableName ($key) VALUES ($keyData)";
        $stmt = $connection->prepare($sql);
        $stmt->execute($json);
    }

    public function selectAll($connection, $tableName): array
    {
        $sql = "SELECT * FROM $tableName";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }
    public function select($connection, $tableName, $columnName, $value)
    {
        $sql = "SELECT * FROM $tableName Where $columnName = $value ";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($result);
        echo $json;
    }

    public function update($connection, $tableName, $columnName, $value, $id)
    {
        $sql = "UPDATE $tableName SET $columnName ='$value' WHERE id=$id";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }

    public function deleteBy($connection, $tableName, $columnName, $value)
    {
        $sql = "";
        if (gettype($value) == "integer") {
            $sql = "DELETE FROM $tableName WHERE $columnName=$value";
        }
        if (gettype($value) == "string") {
            $sql = "DELETE FROM $tableName WHERE $columnName='$value'";
        }

        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }

    public function deleteById($connection, $tableName, $value)
    {
        $sql = "DELETE FROM $tableName WHERE id=$value";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }
}
