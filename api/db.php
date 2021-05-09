<?php

require '../vendor/autoload.php';
use ezsql\Database;

try {
    $db = Database::initialize('mysqli', ["root", "root", "vaccine_db", 'localhost']);
} catch (Exception $e) {
    die("Error connecting database");
}

$db->connect();

$db->prepareOn();



