<?php

header('Content-Type: application/json');

$hostname = 'localhost:3307';
$username = 'root';
$password = '';
$db = 'portfolio';

$connection = new mysqli($hostname, $username, $password, $db);

if ($connection->connect_error) {
    exit('Connections failure : '.$connection->connect_error);
}

$sql = '
    SELECT * 
    FROM response
';
$result = $connection->query($sql);

$response = [];

if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
}

echo json_encode($response);

$connection->close();