<?php
include_once "MySQLBDDriver.php";

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
    'pass' => '123456'
];

$db = new MySQLBDDriver($config);

$db->select("SELECT * FROM `test`");
$db->insert("INSERT INTO `test` (id, city) VALUES (6, 'Mexico11'), (7, 'Mexico22')");

$db->update("UPDATE `test` SET `city` = 'MEXICO' WHERE `city` = 'Mexico11'");
$db->delete("DELETE FROM `test` WHERE `city` = 'MEXICO'");

