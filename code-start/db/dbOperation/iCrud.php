<?php
interface Icrud
{
    public function  createTable($connection, $tableName, $columnsName);
    public  function insert($connection, $tableName, $json);
    public function selectAll($connection, $tableName);
    public function select($connection, $tableName, $columnName, $value);
    public function update($connection, $tableName, $columnName, $value, $id);
    public function deleteBy($connection, $tableName, $columnName, $value);
    public function deleteById($connection, $tableName, $value);
}
