<?php

require_once __DIR__ . "/vendor/autoload.php";

// connect to mongodb
$client = new MongoDB\Client("mongodb+srv://schooljdconanan:RCeSxWjpMzMvdVhG@cluster0.fj3uzar.mongodb.net/test");

//select a database
$db = $client->dbResto;

//create a collection
$collection = $db->colresto;

?>