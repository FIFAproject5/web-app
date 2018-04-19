<?php

require ("../config/database.php");

$connectionString = "mysql:dbname=$DB_NAME;host=$DB_HOST";

try{

    $database = new PDO($connectionString, $DB_USER, $DB_PASSWORD);

    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception) {
    die('Connection failed with error: '.$exception->getMessage());
}