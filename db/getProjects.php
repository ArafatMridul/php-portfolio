<?php

header('Content-Type: application/json');

$servername = 'localhost:3307';
$username = 'root';
$password = '';
$dbname = 'portfolio';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    exit(json_encode(['error' => 'Connection failed: '.$conn->connect_error]));
}

$sql = 'SELECT * FROM projects';
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

echo json_encode($projects);

$conn->close();